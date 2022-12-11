<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use App\Models\supplier\Supplier;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use PDF;

class SupplierControllers extends Controller
{

    // Index View and Scope Data
    public function index()
    {
        return view('supplier.index', [
            "title" => "List Supplier",
            "suppliers" => Supplier::all()
        ]);
    }

    // Create View Data
    public function create()
    {
        $data['title'] = "Add Supplier";
        $data['url'] = 'store';
        $data['disabled_'] = '';
        return view('supplier.create', $data);
    }

    // Store Function to Database
    public function store(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');
        $supplier_pay = Supplier::create([
            'supplier' => $req->supplier,
            'note' => $req->note,
            'created_at' => $datenow
        ]);

        return redirect()->route('supplier.index')->with(['success' => 'Data successfully stored!']);
    }

    // Detail Data View by id
    public function detail($id)
    {
        $data['title'] = "Detail Supplier";
        $data['disabled_'] = 'disabled';
        $data['url'] = 'create';
        $data['suppliers'] = Supplier::where('id', $id)->first();
        return view('supplier.create', $data);
    }

    // Edit Data View by id
    public function edit($id)
    {
        $data['title'] = "Edit Supplier";
        $data['disabled_'] = '';
        $data['url'] = 'update';
        $data['suppliers'] = Supplier::where('id', $id)->first();
        return view('supplier.create', $data);
    }

    // Update Function to Database
    public function update(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');
        $supplier_pay = Supplier::where('id', $req->id)->update([
            'supplier' => $req->supplier,
            'note' => $req->note,
            'updated_at' => $datenow
        ]);

        return redirect()->route('supplier.index')->with(['success' => 'Data successfully updated!']);
    }

    // Delete Data Function
    public function delete(Request $req)
    {
        $exec = Supplier::where('id', $req->id )->delete();

        if ($exec) {
            Session::flash('success', 'Data successfully deleted!');
          } else {
            Session::flash('gagal', 'Error Data');
          }
    }


}
