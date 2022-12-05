<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use App\Models\category\Category;
use App\Models\supplier\Supplier;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

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
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('product.create', $data);
    }

    // Store Function to Database
    public function store(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');

        // $destination = 'uploads/Persuratan/sprin\\';
        // if ($req->hasFile('lampiran')) {
        // $file = $req->file('lampiran');
        // $nama_file = time() . '_SPRIN' . '_' . str_replace(' ', '_', $req->file('lampiran')->getClientOriginalName());
        // Storage::disk('uploads')->putFileAs($destination, $file, $nama_file);
        // } else {
        // $nama_file = null;
        // }

        $role_pay = Product::create([
            'name_product' => $req->name,
            'status' => $req->status,
            'stock' => $req->stock,
            'base_price' => $req->base_price,
            'selling_price' => $req->selling_price,
            'desc' => $req->desc,
            'category_id' => $req->category,
            'supplier_id' => $req->supplier_id,
            'created_at' => $datenow
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data successfully stored!']);
    }

    // Detail Data View by id
    public function detail($id)
    {
        $data['title'] = "Detail Products";
        $data['disabled_'] = 'disabled';
        $data['url'] = 'create';
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('product.create', $data);
    }

    // // Edit Data View by id
    // public function edit($id)
    // {
    //     $data['title'] = "Edit User Roles";
    //     $data['disabled_'] = '';
    //     $data['url'] = 'update';
    //     $data['roles'] = Role::where('id', $id)->first();
    //     return view('role.create', $data);
    // }

    // // Update Function to Database
    // public function update(Request $req)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $datenow = date('Y-m-d H:i:s');
    //     $role_pay = Role::where('id', $req->id)->update([
    //         'role' => $req->role,
    //         'note' => $req->note,
    //         'updated_at' => $datenow
    //     ]);

    //     return redirect()->route('role.index');
    // }

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
