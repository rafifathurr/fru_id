<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use App\Models\role\Role;

use Illuminate\Http\Request;

class RoleControllers extends Controller
{

    // Index View and Scope Data
    public function index()
    {
        return view('role.index', [
            "title" => "List User Roles",
            "roles" => Role::all()
        ]);
    }

    // Create View Data
    public function create()
    {
        $data['title'] = "Add User Roles";
        $data['url'] = 'store';
        $data['disabled_'] = '';
        return view('role.create', $data);
    }

    // Store Function to Database
    public function store(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');
        $role_pay = Role::create([
            'role' => $req->role,
            'note' => $req->note,
            'created_at' => $datenow
        ]);

        return redirect()->route('role.index');
    }

    // Detail Data View by id
    public function detail($id)
    {
        $data['title'] = "Detail User Roles";
        $data['disabled_'] = 'disabled';
        $data['url'] = 'create';
        $data['roles'] = Role::where('id', $id)->first();
        return view('role.create', $data);
    }

    // Edit Data View by id
    public function edit($id)
    {
        $data['title'] = "Edit User Roles";
        $data['disabled_'] = '';
        $data['url'] = 'update';
        $data['roles'] = Role::where('id', $id)->first();
        return view('role.create', $data);
    }

    // Update Function to Database
    public function update(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');
        $role_pay = Role::where('id', $req->id)->update([
            'role' => $req->role,
            'note' => $req->note,
            'updated_at' => $datenow
        ]);

        return redirect()->route('role.index');
    }

    // Delete Data Function
    public function delete(Request $req)
    {
        $exec = Role::where('id', $req->id )->delete();

        if ($exec) {
            return redirect()->route('role.index');
        }
    }


}
