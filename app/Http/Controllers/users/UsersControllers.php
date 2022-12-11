<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\users\User;
use App\Models\role\Role;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use PDF;

class UsersControllers extends Controller
{

    // Index View and Scope Data
    public function index()
    {
        return view('users.index', [
            "title" => "List User",
            "users" => User::all(),
            "roles" => Role::all()
        ]);
    }

    // Create View Data
    public function create()
    {
        $data['title'] = "Add User";
        $data['url'] = 'store';
        $data['disabled_'] = '';
        $data['roles'] = Role::all();
        return view('users.create', $data);
    }

    // Store Function to Database
    public function store(Request $request)
    {
        if($request->password == $request->repassword){
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'phone' => (int)$request->phone,
                'password' => bcrypt($request->password),
                'name' => $request->name,
                'role_id' => $request->role,
                'address' => $request->address,
                'created_at' => $datenow
            ]);
        }
        return redirect()->route('users.index')->with(['success' => 'Data successfully stored!']);
    }

    // Detail Data View by id
    public function detail($id)
    {
        $data['title'] = "Detail User";
        $data['disabled_'] = 'disabled';
        $data['url'] = 'create';
        $data['users'] = User::where('id', $id)->first();
        $data['roles'] = Role::all();
        return view('users.create', $data);
    }

    // Edit Data View by id
    public function edit($id)
    {
        $data['title'] = "Edit User";
        $data['disabled_'] = '';
        $data['url'] = 'update';
        $data['users'] = User::where('id', $id)->first();
        $data['roles'] = Role::all();
        return view('users.create', $data);
    }

    // Update Function to Database
    public function update(Request $req)
    {
        if($req->password == $req->repassword){
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            $user_pay = User::where('id', $req->id)->update([
                'username' => $req->username,
                'email' => $req->email,
                'phone' => (int)$req->phone,
                'password' => bcrypt($req->password),
                'name' => $req->name,
                'role_id' => $req->role,
                'address' => $req->address,
                'updated_at' => $datenow
            ]);
        }
        return redirect()->route('supplier.index')->with(['success' => 'Data successfully updated!']);
    }

    // Delete Data Function
    public function delete(Request $req)
    {
        $exec = User::where('id', $req->id )->delete();

        if ($exec) {
            Session::flash('success', 'Data successfully deleted!');
          } else {
            Session::flash('gagal', 'Error Data');
          }
    }


}
