<?php
namespace Topxia\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Topxia\WebBundle\Controller\BaseController;

class ThemeController extends BaseController
{
    public function indexAction(Request $request)
    {
        $themeConfig = $this->getThemeService()->getCurrentThemeConfirmConfig();
        return $this->render('TopxiaWebBundle:Default:index.html.twig', array(
            'themeConfig'    => $themeConfig['confirmConfig'],
            'allConfig'      => $themeConfig['allConfig'],
            'isIndex'        => true,
            'consultDisplay' => true
        ));
    }

    public function pendantAction($config = null)
    {
        if (isset($config['code'])) {
            if (!empty($config['sortName']) && $config['code'] == 'category-course') {
                if ($config['sortName'] == 'recommended') {
                    $config['code'] = 'recommend-course';
                }
            }

            $category = array();

            if (!empty($config["categoryId"])) {
                $category = $this->getCategoryService()->getCategory($config["categoryId"]);
            }

            return $this->render("GracefulThemeBundle:Default:{$config['code']}.html.twig", array(
                'category' => $category,
                'config'   => $config
            ));
        }
    }

    public function getCurrentConfigColorAction($isEditColor = false)
    {
        $config = $this->getThemeService()->getCurrentThemeConfig();

        if (!$isEditColor) {
            $color = $config['confirmConfig']['color'];
        } else {
            $color = $config['config']['color'];
        }

        return $this->render("GracefulThemeBundle:Default:color.html.twig", array(
            'color' => $color
        ));
    }

    public function getCurrentConfigBottomAction($isIndex = null)
    {
        $config = $this->getThemeService()->getCurrentThemeConfig();

        if ($isIndex) {
            $config = $config['confirmConfig']['bottom'];
        } else {
            $config = $config['config']['bottom'];
        }

        return $this->render("GracefulThemeBundle:Default:{$config}-bottom.html.twig");
    }

    private function getThemeService()
    {
        return $this->getServiceKernel()->createService('Theme.ThemeService');
    }

    private function getCategoryService()
    {
        return $this->getServiceKernel()->createService('Taxonomy.CategoryService');
    }
}
