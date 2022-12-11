<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use App\Models\source_payment\Source;
use App\Models\product\Product;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use PDF;

class OrderControllers extends Controller
{

    // Index View and Scope Data
    public function index()
    {
        return view('order.index', [
            "title" => "List Order",
            "orders" => Order::orderBy('date', 'DESC')->get()
        ]);
    }

    // Create View Data
    public function create()
    {
        $data['title'] = "Add Order";
        $data['url'] = 'store';
        $data['disabled_'] = '';
        $data['products'] = Product::orderBy('product_name', 'asc')->get();
        $data['sources'] = Source::orderBy('id', 'asc')->get();
        return view('order.create', $data);
    }

    // get Detail Product View Data
    public function getDetailProds(Request $req)
    {
        $data["prods"] = Product::where("id", $req->id_prod)->first();
        return $data["prods"];
    }

    // Store Function to Database
    public function store(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');

        $order_pay = Order::create([
            'product_id' => $req->prods,
            'qty' => $req->qty,
            'entry_price' => $req->entry_price,
            'source_id' => $req->source_pay,
            'date' => $req->tgl,
            'note' => $req->note,
            'tax' => $req->cal_tax,
            'profit' => $req->cal_profit,
            'created_at' => $datenow
        ]);

        return redirect()->route('order.index')->with(['success' => 'Data successfully stored!']);
    }

    // Detail Data View by id
    public function detail($id)
    {
        $data['title'] = "Detail Order";
        $data['disabled_'] = 'disabled';
        $data['url'] = 'create';
        $data['orders'] = Order::where('id', $id)->first();
        $data['products'] = Product::orderBy('product_name', 'asc')->get();
        $data['sources'] = Source::orderBy('id', 'asc')->get();
        return view('order.create', $data);
    }

    // Edit Data View by id
    public function edit($id)
    {
        $data['title'] = "Edit Order";
        $data['disabled_'] = '';
        $data['url'] = 'update';
        $data['orders'] = Order::where('id', $id)->first();
        $data['products'] = Product::orderBy('product_name', 'asc')->get();
        $data['sources'] = Source::orderBy('id', 'asc')->get();
        return view('order.create', $data);
    }

    // Update Function to Database
    public function update(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');
        $order_pay = Order::where('id', $req->id)->update([
            'product_id' => $req->prods,
            'qty' => $req->qty,
            'entry_price' => $req->entry_price,
            'source_id' => $req->source_pay,
            'date' => $req->tgl,
            'note' => $req->note,
            'tax' => $req->cal_tax,
            'profit' => $req->cal_profit,
            'updated_at' => $datenow
        ]);

        return redirect()->route('order.index')->with(['success' => 'Data successfully stored!']);
    }

    // Delete Data Function
    public function delete(Request $req)
    {
        $exec = Order::where('id', $req->id )->delete();

        if ($exec) {
            Session::flash('success', 'Data successfully deleted!');
          } else {
            Session::flash('gagal', 'Error Data');
          }
    }
}
