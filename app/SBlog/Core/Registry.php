<?php
/**
 * laravel.admin.panel - Registry.php
 *
 * Created by Admin
 * Created on: 11.08.2021 23:50
 */

namespace SBlog\Core;


use SBlog\Core\TSingletone;

class Registry {

    use TSingletone;

    protected static  $properties = [];

    public function setProperty($name,$value){
        self::$properties[$name] = $value;
    }

    public function getProperty($name){
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties(){
        return self::$properties;
    }
}
