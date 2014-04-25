<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20140424170812 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->addSql("
            DROP TABLE IF EXISTS `ad_banner`;
            CREATE TABLE IF NOT EXISTS `ad_banner` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `title` varchar(255) NOT NULL COMMENT '描述',              
             
              `targetUrl` varchar(1024) DEFAULT '' COMMENT '作用的URL',
              `showUrl` varchar(1024) DEFAULT '' COMMENT '显示的URL',
              
              `showMode` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '显示方式:弹窗 头顶',
              `showWhen` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '显示时机:0进入显示 1退出显示',
              `showWait` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '循环等待时间:0不循环显示',
              `scope` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '全部 仅注册用户 仅游客',
              `status` enum('published','unpublished','trash') NOT NULL DEFAULT 'unpublished' COMMENT '状态',
              `hits` int(10) unsigned NOT NULL DEFAULT '0',
              `userId` int(10) unsigned NOT NULL DEFAULT '0',
              `createdTime` int(10) unsigned NOT NULL DEFAULT '0',
              `updatedTime` int(10) unsigned NOT NULL DEFAULT '0',
              `publishedTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        ");



    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs

    }
}
