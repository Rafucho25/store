<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mail\OrderShipped;
use Mail;
use Sentinel;
use App\Model\Order;
use App\Model\Orderdetail;

class OrderController extends Controller
{

    public function preOrder(){
        $products = DB::table('shoppingcart')
        ->where('user_id', Sentinel::getUser()->id)
        ->join('products', 'products.id', 'product_id')
        ->selectRaw("shoppingcart.id as id, shoppingcart.quantity as quantity, logo, name, price, product_id, `condition`")
        ->get();
        return view('order.preorder',compact('products'));

    }

    public function create(){
        $order = new Order;
        $detail = DB::table('shoppingcart')
        ->where('user_id', Sentinel::getUser()->id)
        ->join('products', 'products.id', 'product_id')
        ->selectRaw("shoppingcart.quantity as order_quantity, product_id, products.quantity as current_quantity, price, shipping, `condition`, store_id")
        ->get();

        /*Calculo de los valores de orden */
        $subtotal = $detail->sum('price');
        $shipping =  $detail->sum('shipping');
        $amount = $subtotal + $shipping;
        $store =  $detail->first()->store_id;

        /*Insertamos la cabecera de la orden */
        $order->subtotal = $subtotal;
        $order->shipping = $shipping;
        $order->amount = $amount;
        $order->address = Sentinel::getUser()->address;
        $order->status = 'P';
        $order->user_id = Sentinel::getUser()->id;
        $order->store_id = $store;
        $order->save();

        /*Insertamos el detalle de la orden */
        foreach($detail as $item){
            $orderDetail = new Orderdetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $item->product_id;
            $orderDetail->price = $item->price;
            $orderDetail->shipping = $item->shipping;
            $orderDetail->quantity = $item->order_quantity;
            $orderDetail->condition = $item->condition;
            $orderDetail->save();
        }

        return redirect('/')->with('messageSuccess','Orden creada Satisfactoriamente');
    }

    public function listOrders(){
        $orders = DB::table('orders')
        ->where('user_id',Sentinel::getUser()->id)
        ->paginate(10);

        $orderDetail = DB::table('orderdetails')
        ->whereIn('order_id',$orders->pluck('id')->toArray())
        ->get();

        return view('order.order',compact('orders','orderDetail'));
    }

    public function orderDetail($id){
        $order = Order::find($id);

        $orderDetail = DB::table('orderdetails')
        ->where('order_id',$order->id)
        ->join('products','orderdetails.product_id','products.id')
        ->get();

        return view('order.orderdetail',compact('order','orderDetail'));
    }
    
    public function listStoreOrders(){
        $store = DB::table('stores')->where('user_id',Sentinel::getUser()->store_id)->first()->id;
        $orders = DB::table('orders')
        ->where('store_id',$store)
        ->paginate(10);

        $orderDetail = DB::table('orderdetails')
        ->whereIn('order_id',$orders->pluck('id')->toArray())
        ->get();

        return view('order.orderstore',compact('orders','orderDetail'));
    }

    public function send(){
        $order = Order::find(1);
        Mail::to('rafaeljevi@hotmail.com')->send(new OrderShipped($order));

        return redirect('/')->with('messageSuccess','Orden enviada Satisfactoriamente');
    }
}
