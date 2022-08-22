<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\OrderService;
use App\Models\OrderUpdate;
use App\Models\Service;
use App\Models\User;

class OrderController extends BaseController
{
    protected $service, $category, $order, $orderService, $orderUpdate, $user;

    public function __construct()
    {
        $this->user = new User();
        $this->service = new Service();
        $this->category = new Category();
        $this->order = new Order();
        $this->orderService = new OrderService();
        $this->orderUpdate = new OrderUpdate();
        $this->orderPayment = new OrderPayment();
    }

    public function myOrder()
    {
        $userID = session()->get('user')['user_id'];
        $orders = $this->order
            ->select('order_id, customer_id, merchant_id, total_price, status, name, orders.created_at')
            ->whereCustomer($userID)->joinMerchant()->findAll();

        $orders = array_map(function ($order) {
            $order['order_service'] = $this->orderService->where('order_id', $order['order_id'])->orderBy('created_at', 'asc')->limit(1)->first();
            $order['total_service'] = $this->orderService->where('order_id', $order['order_id'])->countAllResults();
            return $order;
        }, $orders);

        return view('orders/myOrder', [
            'orders' => $orders,
        ]);
    }

    public function orderDetail($id)
    {
        $user = session()->get('user');
        $userID = $user['user_id'];
        $order = $this->order->joinMerchant()->find($id);

        if (!$order)
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();


        if ($order['customer_id'] != $userID && $order['merchant_id'] != $userID) {
            return redirect()->to('/my-order');
        }

        $services = $this->orderService->where('order_id', $id)->orderBy('created_at')->findAll();

        $category = $this->orderService->getCategory($services[0]['order_service_id']);

        return view('orders/orderDetail', [
            'order' => $order,
            'services' => $services,
            'category' => $category,
            'customer' => $user['role'] == 'customer' ? $user : $this->user->find($order['customer_id']),
            'merchant' => $user['role'] == 'merchant' ? $user : $this->user->find($order['merchant_id']),
            'updates' => $this->orderUpdate->where('order_id', $id)->findAll(),
        ]);
    }

    public function chat($id)
    {
        $user = session()->get('user');
        $userID = $user['user_id'];
        $order = $this->order->joinMerchant()->find($id);

        if ($order['customer_id'] != $userID && $order['merchant_id'] != $userID) {
            return redirect()->to('/my-order');
        }

        $this->orderUpdate->save([
            'order_id' => $id,
            'description' => $this->request->getPost('description'),
            'sender_id' => $userID,
        ]);

        return redirect()->back();
    }

    public function doOrder($category, $slug)
    {
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'order_detail' => 'required',
            'order_image' => 'uploaded[order_image]',
        ]);
        if (!$validate) return redirect()->back()->withInput();

        $request = $this->request->getPost();

        $imageName = null;

        if ($image = $this->request->getFile('order_image')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();

                $image->move(ROOTPATH . 'public/uploads', $imageName);
            }
        }

        $service = $this->service->whereSlug($slug)->first();

        $this->order->save([
            'customer_id' => session()->get('user')['user_id'],
            'merchant_id' => $service['user_id'],
            'total_price' => $service['estimated_price'],
        ]);

        $orderID = $this->order->getInsertID();

        $this->orderService->save([
            'service_id' => $service['service_id'],
            'order_id' => $orderID,
            'title' => $service['title'],
            'description' => $service['description'],
            'price' => $service['estimated_price'],
            'image' => $service['image'],
            'order_detail' => $request['order_detail'],
            'order_image' => $imageName,
        ]);

        $this->orderUpdate->save([
            'order_id' => $orderID,
            'description' => 'Order berhasil dibuat',
            'type' => 'update',
        ]);

        return redirect()->to('my-order')->with('success', 'Berhasil melakukan order');
    }

    public function edit($id)
    {
        $user = session()->get('user');
        $userID = $user['user_id'];
        $order = $this->order->joinMerchant()->find($id);

        if ($order['customer_id'] != $userID && $order['merchant_id'] != $userID) {
            return redirect()->to('/my-order');
        }

        if ($order['status'] != 2) return redirect()->to('/orders/' . $id);

        $services = $this->orderService->where('order_id', $id)->orderBy('created_at')->findAll();

        $category = $this->orderService->getCategory($services[0]['order_service_id']);

        return view('orders/edit', [
            'order' => $order,
            'services' => $services,
            'category' => $category,
            'customer' => $user['role'] == 'customer' ? $user : $this->user->find($order['customer_id']),
            'merchant' => $user['role'] == 'merchant' ? $user : $this->user->find($order['merchant_id']),
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function addService($id)
    {
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'title' => 'required',
            'additional_description' => 'required',
            'additional_price' => 'required|integer|greater_than_equal_to[0]',
            'order_image' => 'permit_empty|uploaded[order_image]',
        ]);

        $request = $this->request->getPost();

        if (!$validate) return redirect()->back()->withInput();

        $imageName = null;

        if ($image = $this->request->getFile('order_image')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();

                $image->move(ROOTPATH . 'public/uploads', $imageName);
            }
        }

        $this->orderService->save([
            'order_id' => $id,
            'title' => $request['title'],
            'order_comment' => $request['additional_description'],
            'price' => $request['additional_price'],
            'order_image' => $imageName,
        ]);

        $order = $this->order->find($id);
        $this->order->set([
            'total_price' => $order['total_price'] + $request['additional_price'],
        ])->update($id);


        return redirect()->back()->with('success', 'Berhasil menambahkan layanan tambahan');
    }

    public function updateServices($id)
    {
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'order_comment.*' => 'required',
            'price.*' => 'required|integer|greater_than_equal_to[0]',
        ]);

        $request = $this->request->getPost();

        if (!$validate) return redirect()->back()->withInput();

        $price = 0;
        foreach ($request['order_service_id'] as $key => $order_service_id) {
            $this->orderService->where('order_service_id', $order_service_id)->set([
                'order_comment' => $request['order_comment'][$key],
                'price' => $request['price'][$key],
            ])->update();

            $price += $request['price'][$key];
        }

        $this->order->where('order_id', $id)->set([
            'total_price' => $price,
        ])->update();

        return redirect()->back()->with('success', 'Berhasil mengubah rincian layanan');
    }

    public function paymentForm($id)
    {
        $user = session()->get('user');
        $userID = $user['user_id'];
        $order = $this->order->joinMerchant()->find($id);

        if ($order['customer_id'] != $userID) {
            return redirect()->to('/my-order');
        }

        $services = $this->orderService->where('order_id', $id)->orderBy('created_at')->findAll();

        $category = $this->orderService->getCategory($services[0]['order_service_id']);

        $validation = \Config\Services::validation();

        return view('orders/payment', [
            'order' => $order,
            'services' => $services,
            'category' => $category,
            'updates' => $this->orderUpdate->where('order_id', $id)->findAll(),
            'validation' => $validation,
        ]);
    }

    public function payment($id)
    {
        $request = $this->request->getPost();

        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'payment_name' => 'required',
            'payment_number' => 'required|numeric',
            'payment_bank' => 'required',
            'payment_file' => 'uploaded[payment_file]',
        ]);
        if (!$validate) return redirect()->back()->withInput();

        $imageName = null;

        if ($image = $this->request->getFile('payment_file')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();

                $image->move(ROOTPATH . 'public/uploads', $imageName);
            }
        }

        $this->orderPayment->save([
            'order_id' => $id,
            'payment_name' => $request['payment_name'],
            'payment_number' => $request['payment_number'],
            'payment_file' => $imageName,
        ]);

        $this->order->set([
            'status' => 4,
        ])->update($id);

        return redirect()->to('my-order')->with('success', 'Berhasil melakukan pembayaran');
    }
}
