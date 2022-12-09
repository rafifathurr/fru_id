<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use App\Models\category\Category;
use App\Models\supplier\Supplier;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use PDF;

class ProductControllers extends Controller
{

    // Index View and Scope Data
    public function index()
    {
        return view('product.index', [
            "title" => "List Products",
            "products" => Product::all()
        ]);
    }

    // Create View Data
    public function create()
    {
        $data['title'] = "Add Products";
        $data['url'] = 'store';
        $data['disabled_'] = '';
        $data['categories'] = Category::orderBy('category', 'asc')->get();
        $data['suppliers'] = Supplier::all();
        return view('product.create', $data);
    }

    // Store Function to Database
    public function store(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');

        $product_pay = Product::create([
            'product_name' => $req->name,
            'code' => $req->code,
            'status' => $req->status,
            'stock' => $req->stock,
            'base_price' => $req->base_price,
            'selling_price' => $req->selling_price,
            'desc' => $req->desc,
            'category_id' => $req->category,
            'supplier_id' => $req->supplier,
            'created_at' => $datenow
        ]);

        $destination='Uploads/Product/'.$product_pay->id.'/uploads\\';
        if ($req->hasFile('uploads')) {
            $file = $req->file('uploads');
            $name_file = time().'_'.$req->file('uploads')->getClientOriginalName();
            Storage::disk('Uploads')->putFileAs($destination,$file,$name_file);
            Product::where('id', $product_pay->id)->update(['upload' => $name_file]);
          }

        return redirect()->route('product.index')->with(['success' => 'Data successfully stored!']);
    }

    // Detail Data View by id
    public function detail($id)
    {
        $data['title'] = "Detail Products";
        $data['disabled_'] = 'disabled';
        $data['url'] = 'create';
        $data['products'] = Product::where('id', $id)->first();
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('product.create', $data);
    }

    // Edit Data View by id
    public function edit($id)
    {
        $data['title'] = "Edit Products";
        $data['disabled_'] = '';
        $data['url'] = 'update';
        $data['products'] = Product::where('id', $id)->first();
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('product.create', $data);
    }

    // Update Function to Database
    public function update(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');
        $product_pay = Product::where('id', $req->id)->update([
            'product_name' => $req->name,
            'code' => $req->code,
            'status' => $req->status,
            'stock' => $req->stock,
            'base_price' => $req->base_price,
            'selling_price' => $req->selling_price,
            'desc' => $req->desc,
            'category_id' => $req->category,
            'supplier_id' => $req->supplier,
            'updated_at' => $datenow
        ]);

        $destination='Uploads/Product/'.$req->id.'/uploads\\';
        if ($req->hasFile('uploads')) {
            $file = $req->file('uploads');
            $name_file = time().'_'.$req->file('uploads')->getClientOriginalName();
            Storage::disk('Uploads')->putFileAs($destination,$file,$name_file);
            Product::where('id', $req->id)->update(['upload' => $name_file]);
          }

        return redirect()->route('product.index')->with(['success' => 'Data successfully stored!']);
    }

    // Delete Data Function
    public function delete(Request $req)
    {
        $exec = Product::where('id', $req->id )->delete();

        if ($exec) {
            Session::flash('success', 'Data successfully deleted!');
          } else {
            Session::flash('gagal', 'Error Data');
          }
    }
}
