<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\users\User;

use Illuminate\Http\Request;

class UsersControllers extends Controller
{

    // Index View and Scope Data
    public function index()
    {
        return view('users.index', [
            "title" => "List User"
            // "suppliers" => Supplier::all()
        ]);
    }

    // Create View Data
    public function create()
    {
        $data['title'] = "Add User";
        $data['url'] = 'store';
        $data['disabled_'] = '';
        return view('users.create', $data);
    }

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
