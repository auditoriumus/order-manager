<?php


namespace App\Repositories\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    public static function getAllOrders()
    {
        return Order::with(['user', 'paytype'])->orderByDesc('created_at')->get();
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
        $order->table_id = isset($data['table']) ? $data['table'] : null;
        $order->table_title = isset($data['table_title']) ? $data['table_title'] : '';
        $order->description = $data['description'];
        $order->user_id = Auth::id();
        return $order->save();
    }

    public static function findOrderByTableId($tableId)
    {
        return Order::where('table_id', $tableId)
            ->where('payment_status', 0)
            ->get();
    }

    public static function updateOrderMenu($id, $value)
    {
        $order = Order::find($id);
        $order->menu = $value;
        $order->update();
    }

    public static function changeTable($id, $tableArray)
    {
        $order = Order::findOrFail($id);
        $tableId = $tableArray['id'];
        $tableTitle = $tableArray['title'];
        $order->table_id = $tableId;
        $order->table_title = $tableTitle;
        return $order->update();
    }

    public static function changeDescription($id, $description)
    {
        $order = Order::findOrFail($id);
        $order->description = $description;
        return $order->update();
    }
}
