<?php
/**
 * laravel.admin.panel - MainRepository.php
 *
 * Created by Admin
 * Created on: 27.08.2021 13:01
 */

namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\DB;

class MainRepository extends CoreRepository {

    protected function getModelClass() {
        return Model::class;
    }

    public static function getCountOrders(){
        $countOrders = DB::table('orders')
            ->where('status','0')
            ->get()
            ->count();
        return $countOrders;
    }

    public static function getCountUsers(){
        $countUsers = DB::table('users')
            ->get()
            ->count();
        return $countUsers;
    }

    public static function getCountProducts(){
        $countProducts = Db::table('products')
            ->get()
            ->count();
        return $countProducts;
    }

    public static function getCountCategories(){
        $countCategories = Db::table('categories')
            ->get()
            ->count();
        return $countCategories;
    }

}
