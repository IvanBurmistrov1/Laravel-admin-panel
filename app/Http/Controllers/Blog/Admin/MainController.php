<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Http\Request;
use App\Repositories\Admin\MainRepository;
use phpDocumentor\Reflection\Types\Parent_;

class MainController extends AdminBaseController
{
    private $orderRepository;
    private $productRepository;

    public function __construct(ProductRepository $pr,OrderRepository $or) {
        Parent::__construct();
        $this->orderRepository = $or;
        $this->productRepository = $pr;
    }


    public function index() {
        $countOrders = MainRepository::getCountOrders();
        $countUsers = MainRepository::getCountUsers();
        $countProducts = MainRepository::getCountProducts();
        $countCategories = MainRepository::getCountCategories();

        $perPage=4;

        $lastOrders = $this->orderRepository->getAllOrders(6);
        $lastProducts = $this->productRepository->getLastProducts($perPage);
        return view('blog.admin.main.index',compact('countCategories','countUsers','countOrders','countProducts','lastProducts','lastOrders'));
    }
}
