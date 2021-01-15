<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\ShipOrder;
use Illuminate\Http\Request;

/**
 * Class ShipOrderController
 * @package App\Http\Controllers\Api
 */
class ShipOrderController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $list = ShipOrder::with('person')->get();

        return response()->json(['orders' => $list]);
    }

    /**
     * @param ShipOrder $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function find(ShipOrder $order)
    {
        $order->person = Person::find($order->person);
        $order->shipTo;
        $order->items;

        return response()->json(['order' => $order]);
    }
}
