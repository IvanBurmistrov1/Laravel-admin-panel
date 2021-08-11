<?php
/**
 * laravel.admin.panel - TSingletone.php
 *
 * Created by Admin
 * Created on: 11.08.2021 23:44
 */
namespace SBlog\Core;
trait TSingletone{
    private static $instance;

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}
