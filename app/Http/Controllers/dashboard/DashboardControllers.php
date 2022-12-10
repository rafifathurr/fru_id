<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardControllers extends Controller
{

    // Index View and Scope Data
    public function index()
    {
        $allorder = Order::whereRaw('date >= DATE(NOW() - INTERVAL 7 DAY)')
                    ->orderBy('date', 'ASC')
                    ->select(DB::raw('DATE_FORMAT(date, "%a") as name_day'))
                    ->get();
        
        $data['title'] = "Dashboard";
        $data['orders'] = Order::all();
        $data['dayofweeks'] = Order::whereRaw('date >= DATE(NOW() - INTERVAL 7 DAY)')
                            ->orderBy('date', 'ASC')
                            ->select(DB::raw('DATE_FORMAT(date, "%a") as name_day'))
                            ->get();
        $data['countorderall'] = count(Order::all());
        $data['countorderyear'] = count(Order::whereYear('date', Carbon::now()->year)->get());
        $data['countorderlastyear'] = count(Order::whereYear('date', (Carbon::now()->year)-1)->get());
        $data['countordermonth'] = count(Order::whereMonth('date', Carbon::now()->month)->get());
        $data['countorderlastmonth'] = count(Order::whereMonth('date', Carbon::now()->month-1)->get());
        $data['countorderday'] = count(Order::whereDay('date', Carbon::now()->day)->get());
        $data['countorderlastday'] = count(Order::whereDay('date', Carbon::now()->day-1)->get());
        $data['totalincome'] = Order::whereMonth('date', Carbon::now()->month)->sum('entry_price');
        $data['totaltax'] = Order::whereMonth('date', Carbon::now()->month)->sum('tax');
        
        

        return view('dashboard', $data);
    }

    // // Create View Data
    // public function create()
    // {
    //     $data['title'] = "Add Supplier";
    //     $data['url'] = 'store';
    //     $data['disabled_'] = '';
    //     return view('supplier.create', $data);
    // }

    // // Store Function to Database
    // public function store(Request $req)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $datenow = date('Y-m-d H:i:s');
    //     $supplier_pay = Supplier::create([
    //         'supplier' => $req->supplier,
    //         'note' => $req->note,
    //         'created_at' => $datenow
    //     ]);

    //     return redirect()->route('supplier.index');
    // }

    // // Detail Data View by id
    // public function detail($id)
    // {
    //     $data['title'] = "Detail Supplier";
    //     $data['disabled_'] = 'disabled';
    //     $data['url'] = 'create';
    //     $data['suppliers'] = Supplier::where('id', $id)->first();
    //     return view('supplier.create', $data);
    // }

    // // Edit Data View by id
    // public function edit($id)
    // {
    //     $data['title'] = "Edit Supplier";
    //     $data['disabled_'] = '';
    //     $data['url'] = 'update';
    //     $data['suppliers'] = Supplier::where('id', $id)->first();
    //     return view('supplier.create', $data);
    // }

    // // Update Function to Database
    // public function update(Request $req)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $datenow = date('Y-m-d H:i:s');
    //     $supplier_pay = Supplier::where('id', $req->id)->update([
    //         'supplier' => $req->supplier,
    //         'note' => $req->note,
    //         'updated_at' => $datenow
    //     ]);

    //     return redirect()->route('supplier.index');
    // }

    // // Delete Data Function
    // public function delete(Request $req)
    // {
    //     $exec = Supplier::where('id', $req->id )->delete();

    //     if ($exec) {
    //         return redirect()->route('supplier.index');
    //     }
    // }


}
