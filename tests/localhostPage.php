<?php
/**
 * Created by PhpStorm.
 * User: U
 * Date: 08/31/2017
 * Time: 11:29 AM
 */

class localhostPage extends PHPUnit_Extensions_Selenium2TestCase{
    public static $MetaTitleSelector = 'meta [title]';
    public static $MetaDescriptionSelectors= 'meta [description]';

    public function getMetaTitle(){
        $this->elemet($this->using($this->MetaTitleSelector))->text();
    }

    public function getMetaDescription(){
        $this->elemet($this->using($this->MetaDescriptionSelectors))->text();
    }

}