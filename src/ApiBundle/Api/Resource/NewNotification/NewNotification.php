<?php

namespace ApiBundle\Api\Resource\NewNotification;

use ApiBundle\Api\Annotation\ApiConf;
use ApiBundle\Api\ApiRequest;
use AppBundle\Common\ArrayToolkit;
use ApiBundle\Api\Exception\ErrorCode;
use ApiBundle\Api\Resource\AbstractResource;

class NewNotification extends AbstractResource
{
    /**
     * @ApiConf(isRequiredAuth=false)
     */
    public function search(ApiRequest $request)
    {
        $user = $this->getCurrentUser();
        $newNotification = $this->getNotificationService()->searchNotifications(
            array('userId' => $user->id, 'isRead' => 0),
            array('createdTime' => 'DESC'),
            0,
            5
        );
        return $newNotification;
    }

    protected function getNotificationService()
    {
        return $this->service('User:NotificationService');
    }

    protected function getUserService()
    {
        return $this->service('User:UserService');
    }
}