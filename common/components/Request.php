<?php
/**
 * Created by PhpStorm.
 * User: �����
 * Date: 03.09.2015
 * Time: 13:35
 */

namespace common\components;

use \yii\web\Request as BaseRequest;

class Request extends BaseRequest
{
    public $web;
    public $adminUrl;

    public function getBaseUrl()
    {
        return str_replace($this->web, "", parent::getBaseUrl()) . $this->adminUrl;
    }


    /*
        If you don't have this function, the admin site will 404 if you leave off
        the trailing slash.

        E.g.:

        Wouldn't work:
        site.com/admin

        Would work:
        site.com/admin/

        Using this function, both will work.
    */
    public function resolvePathInfo()
    {
        if ($this->getUrl() === $this->adminUrl) {
            return "";
        } else {
            return parent::resolvePathInfo();
        }
    }
}