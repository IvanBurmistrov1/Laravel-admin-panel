<?php
/**
 * laravel.admin.panel - BlogApp.php
 *
 * Created by Admin
 * Created on: 11.08.2021 23:54
 */

namespace SBlog\Core;


class BlogApp {

    public static $app;

    public static function get_instance() {
        self::$app = Registry::instance();
        self::getParams();
        return self::$app;
    }

    protected static function getParams() {
        $params = require CONF . "/params.php";
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }
}
