<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use App\Models\Market\Order;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function newOrders()
    {

        $today = Carbon::now();
        $twoDaysBeforeToday = $today->addDays(-2);

        $orders = Order::where('created_at','>',$twoDaysBeforeToday)->get();

        return view('admin.market.order.index',  compact('orders'));
    }

    public function sending()
    {

        $orders = Order::where('delivery_status',1)->get();

        return view('admin.market.order.index', compact('orders'));
    }

    public function unpaid()
    {

        $orders = Order::where('payment_status',1)->get();

        return view('admin.market.order.index', compact('orders'));
    }

    public function canceled()
    {

        $orders = Order::where('order_status',3)->get();

        return view('admin.market.order.index', compact('orders'));
    }

    public function returned()
    {

        $orders = Order::where('order_status',4)->get();

        return view('admin.market.order.index', compact('orders'));

    }

    public function all()
    {


        $orders = Order::all();
        return view('admin.market.order.index',  compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.market.order.show', compact('order'));
    }

    public function changeSendStatus(Order $order)
    {

        switch ($order->delivery_status)
        {
            case 0 :
                $order->delivery_status = 1;
                break;
            case 1 :
                $order->delivery_status = 2;
                break;
            case 2 :
                $order->delivery_status = 3;
                break;
            default:
                $order->delivery_status = 0;

        }
        $order->save();
        return Redirect::back();
    }

    public function changeOrderStatus(Order $order)
    {

        switch ($order->order_status)
        {
            case 0 :
                $order->order_status = 1;
                break;
            case 1 :
                $order->order_status = 2;
                break;
            case 2 :
                $order->order_status = 3;
                break;
            case 3 :
                $order->order_status = 4;
                break;
            default:
                $order->order_status = 0;

        }
        $order->save();
        return Redirect::back();
    }

    public function cancelOrder(Order $order)
    {
        $order->order_status = 3;
        $order->save();
        return Redirect::back();
    }

    public function detail(Order $order)
    {
        return view('admin.market.order.detail', compact('order'));
    }
}
