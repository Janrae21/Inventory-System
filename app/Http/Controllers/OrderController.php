<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductStatusExport;
use App\Models\Order;
use App\Models\PackagingMonitoringModel;
use App\Models\PartsOfEloadingModel;
use App\Models\physical_Store_Computer_StocksMonitoring;
use App\Models\PisoWifi_parts_accessories;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // $orders = Order::with('customer')->paginate(10);
        $customers = Customers::paginate(10);

        return view('CustomerList', compact('customers'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product_type = '';

        if ($data['product_type'] === 'pisowifi_parts') {
            $product_type = new PisoWifi_parts_accessories;
        } elseif ($data['product_type'] === 'eloading') {
            $product_type = new PartsOfEloadingModel;
        } elseif ($data['product_type'] === 'packaging') {
            $product_type = new PackagingMonitoringModel;
        } else {
            $product_type = new physical_Store_Computer_StocksMonitoring;
        }

        $product = $product_type::where('id', $data['product_id'])->first();

        $product->RemainingStocks = $product->RemainingStocks - $data['quantity_sold'];
        $product->save();

        unset($data['product_id']);
        unset($data['product_type']);

        $data['shipment_status'] = 'Pending';

        Order::create($data);

        return redirect()->back()->with('Message-Success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function export() 
    {   return Excel::download(new CustomerExport, 'CustomerData.xlsx');
    
    }    
    
}
