<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
    }

    public function checkout()
    {
        if(\Cart::isEmpty()) {
            return redirect('carts');
        }

        $items = \Cart::getContent();
        $this->data['items'] = $items;

        
        $this->data['user'] = \Auth::user();

        return $this->load_theme('orders.checkout', $this->data);
    }

    public function doCheckout(OrderRequest $request)
    {
        $params = $request->except('_token');

        $order = \DB::transaction(function() use ($params) {
            $baseTotalPrice = \Cart::getSubTotal();
            $grantTotal = ($baseTotalPrice);

            $orderDate = date('Y-m-d H:i:s');

            $orderParams = [
                'user_id' => \Auth::user()->id,
                    'code' => Order::generateCode(),
                    'status' => Order::CREATED,
                    'order_date' => $orderDate,
                    'base_total_price' => $baseTotalPrice,
                    'node' => $params['note'],
                    'customer_first_name' => $params['first_name'],
                    'customer_last_name' => $params['last_name'],
                    'customer_address1' => $params['address1'],
                    'customer_address2' => $params['address2'],
                    'customer_phone' => $params['phone'],
                    'customer_email' => $params['email'],
            ];

            $order = Order::create($orderParams);
            $cartItems = \Cart::getContent();

            if  ($order && $cartItems) {
                foreach($cartItems as $item) {
                    $itemBaseTotal = $item->quantity * $item->price;
                    $itemSubTotal = $itemBaseTotal;

                    $service = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;

                    $orderItemParams = [
                            'order_id' => $order->id,
                            'service_id' => $item->associatedModel->id,
                            'qty' => $item->quantity,
                            'base_price' => $item->price,
                            'base_total' => $itemBaseTotal,
                            'sub_total' => $itemSubTotal,
                            'sku' => $item->associatedModel->sku,
                            'type' => $service->type,
                            'name' => $item->name,
                        ];

                        $orderItem = OrderItem::create($orderItemParams);
                }
            }

            return $order;
        });

        if ($order) {
            \Cart::clear();

            \Session::flash('success', 'Thank you. Your order has been received!');
            return redirect('orders/received/'. $order->id);
        }

         return redirect('orders/checkout');
    }

    public function received($orderId)
    {
        $this->data['order'] = Order::where('id', $orderId)
            ->where('user_id', \Auth::user()->id)
            ->firstOrFail();

        return $this->load_theme('orders/received', $this->data);
    }
}
