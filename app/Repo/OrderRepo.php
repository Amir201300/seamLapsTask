<?php

namespace App\Repo;

use App\Models\Order;
use App\Models\OrderMenu;
use Illuminate\Http\Request;
use Validator,Auth,Artisan,Hash,File,Crypt;

class OrderRepo
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @param $request
     * @return Order
     */
    public function save_order($request){
        $order=new Order();
        $order->type=$request->type;
        $order->customer_name=$request->customer_name;
        $order->customer_phone=$request->customer_phone;
        $order->save();
        $this->save_menu($order->id,$request);
        if($order->type==1)
            $this->dine_data($order);
        if($order->type==2)
            $this->delivery_fees($order);
        $this->cal_price_order($order);
        return $order;

    }

    /**
     * @param $order_id
     * @param $request
     */
    private function save_menu($order_id,$request){
        foreach ($request->menu as $menu_id){
            $orderMenu=new OrderMenu();
            $orderMenu->order_id=$order_id;
            $orderMenu->menu_id=$menu_id;
            $orderMenu->save();
        }
    }

    /**
     * @param $order
     */
    private function delivery_fees($order){
        $order->delivery_fees=100;
        $order->save();
    }

    /**
     * @param $order
     */
    private function dine_data($order){
        $order->table_number=mt_rand(9,99);
        $order->waiter_name="waiter_name";
        $order->service_charge=10;
        $order->save();
    }

    /**
     * @param $order
     */
    public function cal_price_order($order){
        $order->total_price=$order->menu->sum('price') + $order->delivery_fees + $order->service_charge;
        $order->save();
    }

}
