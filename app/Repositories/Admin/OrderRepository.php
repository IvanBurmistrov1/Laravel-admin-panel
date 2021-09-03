<?php
/**
 * laravel.admin.panel - OrderRepository.php
 *
 * Created by Admin
 * Created on: 27.08.2021 15:31
 */

namespace App\Repositories\Admin;


use App\Models\Admin\Product;
use App\Repositories\CoreRepository;
use App\Models\Admin\Order as Model;
use Illuminate\Support\Facades\DB;

class OrderRepository extends CoreRepository {

    public function __construct() {
        parent::__construct();
    }

    public function getOneOrder(int $id) {

        $order = $this->startConditions()::withTrashed()
            ->join("users", "orders.user_id", '=', 'users.id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.*', 'users.name',
                DB::raw('ROUND (SUM(order_products.price),2) AS sum'))
            ->where('orders.id', $id)
            ->groupBy('orders.id')
            ->orderBy('orders.status')
            ->orderBy('orders.id')
            ->limit(1)
            ->first();
        return $order;
    }

    public function getOrderProducts(int $order_id) {
        $orderProducts = Product::query()->where('order_id', $order_id)
            ->get();
        return $orderProducts;
    }


    protected function getModelClass() {
        return Model::class;
    }

    public function getAllOrders($perpage) {
        $orders = $this->startConditions()
            ->join("users", "orders.user_id", '=', 'users.id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.id', 'orders.user_id', 'orders.status',
                'orders.created_at', 'orders.updated_at', 'orders.currency', 'users.name',
                DB::raw('ROUND (SUM(order_products.price),2) AS sum'))
            ->groupBy('orders.id')
            ->orderBy('orders.status')
            ->orderBy('orders.id')
            ->toBase()
            ->paginate($perpage);
        return $orders;
    }
}
