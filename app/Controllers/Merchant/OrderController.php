<?php

namespace App\Controllers\Merchant;

use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\OrderUpdate;

class OrderController extends BaseController
{
    protected $order, $orderService, $orderUpdate;

    public function __construct()
    {
        $this->order = new Order();
        $this->orderService = new OrderService();
        $this->orderUpdate = new OrderUpdate();
    }

    public function index()
    {
        $userID = session()->get('user')['user_id'];
        $orders = $this->order
            ->whereMerchant($userID)->joinCustomer()->orderBy('orders.created_at', 'desc')->findAll();

        $orders = array_map(function ($order) {
            $order['order_service'] = $this->orderService->where('order_id', $order['order_id'])->orderBy('created_at', 'asc')->limit(1)->first();
            $order['total_service'] = $this->orderService->where('order_id', $order['order_id'])->countAllResults();
            $order['category'] = $this->orderService->getCategory($order['order_service']['order_service_id']);
            return $order;
        }, $orders);

        return view('merchant/orders/index', [
            'orders' => $orders,
        ]);
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function process($id)
    {
        $status = $this->request->getPost('status') == 'accept' ? 2 : 0;

        $orderService = $this->orderService->where('order_id', $id)->orderBy('created_at', 'asc')->limit(1)->first();

        $message = '';

        if ($status == 2) $message .= 'Transaki diproses';
        else $message .= 'Transaki ditolak';

        $comment = $this->request->getPost('order_comment');

        if ($comment) {
            $this->orderService->save([
                'order_service_id' => $orderService['order_service_id'],
                'order_comment' => $comment,
            ]);

            $message .= ' [' . $comment . ']';
        }

        $this->orderUpdate->save([
            'order_id' => $id,
            'description' => $message,
            'type' => 'update',
        ]);

        $this->order->save([
            'order_id' => $id,
            'status' => $status,
        ]);

        return redirect()->to('/merchant/orders')->with('success', 'Berhasil ' . ($status == 2 ? 'Memproses' : 'Menolak') . ' Pesanan');
    }

    public function finish($id)
    {
        $this->orderUpdate->save([
            'order_id' => $id,
            'description' => 'Pesanan selesai. Menunggu Pembayaran',
            'type' => 'update',
        ]);

        $this->order->save([
            'order_id' => $id,
            'status' => 3,
        ]);

        return redirect()->to('/merchant/orders')->with('success', 'Berhasil Menyelesaikan Pesanan');

    }
}
