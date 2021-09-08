<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends BaseController {
    private $orderRepository;

    public function __construct(OrderRepository $or) {
        ///parent::__construct();
        $this->orderRepository = $or;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $perpage = 5;
        $countOrders = MainRepository::getCountOrders();
        $orders = $this->orderRepository->getAllOrders($perpage);

        return view('blog.admin.order.index', compact('countOrders', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $order = $this->orderRepository->getOneOrder($id);
        if(!$order){
            abort(404);
        }
        $orderProducts = $this->orderRepository->getOrderProducts($id);

        return view('blog.admin.order.edit',compact('order','orderProducts'));
    }

    public function change($id){
        $result = $this->orderRepository->changeOrderStatus($id);
        if($result) {
            return redirect()
                ->route('orders.edit', $id)
                ->with(['success' => 'Успешно сохраненно!']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения']);
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
