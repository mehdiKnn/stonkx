<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OrderProduct;


class AdminOrderProductController extends Controller
{

    public function delete($id, OrderProduct $order){
        $current = $order->find($id);
        if ($current) {
            $current->delete();
        }
        return redirect()->route('admin.order.index');
    }
}
