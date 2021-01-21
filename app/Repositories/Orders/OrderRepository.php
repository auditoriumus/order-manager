<?php


namespace App\Repositories\Orders;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    public static function getAllOrders()
    {
        return Order::with(['user', 'table', 'paytype'])->orderByDesc('created_at')->get();
    }

    public static function findOrderById($id)
    {
        return Order::findOrFail($id);
    }

    public static function setTotalprice(Order $order, int $price)
    {
        $order->total = $price;
        return $order->save();
    }

    public static function deleteOrderById($id)
    {
        return Order::destroy($id);
    }

    public static function createNewOrder($data)
    {

        $order = new Order();
        $order->table_id = $data['table'];
        $order->description = $data['description'];
        $order->user_id = Auth::id();
        return $order->save();
    }
}
