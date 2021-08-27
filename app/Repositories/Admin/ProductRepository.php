<?php
/**
 * laravel.admin.panel - ProductRepository.php
 *
 * Created by Admin
 * Created on: 27.08.2021 15:23
 */

namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use App\Models\Admin\Product as Model;

class ProductRepository extends CoreRepository {

    public function __construct() {
        parent::__construct();
    }

    protected function getModelClass() {
        return Model::class;
    }

    public function getLastProducts($perpage){
        $lastProducts = $this->startConditions()
            ->orderBy('id','desc')
            ->limit($perpage)
            ->select('id','title','price','img','description')
            ->paginate($perpage);
        return $lastProducts;
    }
}
