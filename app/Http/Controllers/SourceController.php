<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Source;

use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index()
    {
        return view('payment_list', [
            "title" => "List Source Payment",
            "sources" => Source::all()
        ]);
    }

    // public function scopeData(Request $req)
    // {
    //     // $id_user = Auth::user()->id;
    //     // if (Auth::user()->group->group_user == 'ASINTEL MABES TNI' || Auth::user()->group->group_user == 'ADMIN ASINTEL MABES TNI') {
    //     // cek id_user pembuat, pastikan hanya user-user yang id_master_group = 1 // ASINTEL MABES TNI
    //     $source_pay = Source::orderBy('id', 'desc')->get();
    //     // } else {
    //     // $rkkl = RKKLModel::where('id_user', $id_user)->orderBy('id', 'desc')->get();
    //     // }


    //     return Datatables::of($source_pay)
    //         ->addIndexColumn()
    //         ->addColumn('tgl', function ($data) {
    //             $tgl = "";
    //             if ($data->tgl != null) {
    //                 $tgl = getTanggalIndo($data->tgl);
    //             }
    //             return $tgl;
    //         })
    //         ->addColumn('nomor', function ($data) {
    //             return '<div align="left">' . $data->nomor . '</div>';
    //         })
    //         ->addColumn('pengirim', function ($data) {
    //             $user = '';
    //             if ($data->id_user) {
    //                 $user = User::where('id', $data->id_user)->first()->name;
    //             }
    //             return $user;
    //         })
    //         ->addColumn('action', function ($data) {
    //             if ($data->dokumen !== null) {
    //                 return '<center>
    //                     <a href="' . route('paban_1.rkkl.ubah', $data->id) . '" class="btn btn-default btn-sm" title="Ubah"><i class="fa fa-edit text-warning"></i></a>
    //                     <a href="' . route('paban_1.rkkl.detail', $data->id) . '" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye text-warning"></i></a>
    //                     <button class="btn btn-sm btn-default" onclick="destroy(\'' . $data->id . '\')" title="Hapus"><i class="fa fa-trash text-danger"></i></button>
    //                     <a href="' . url('/') . '/uploads/Paban 1/RKKL/' . $data->dokumen . '" target="_blank" class="btn btn-default btn-sm" title="Lampiran"><i class="fa fa-paperclip text-primary" aria-hidden="true"></i></a>
    //                 </center>';
    //             } else {
    //                 return '<center>
    //                     <a href="' . route('paban_1.rkkl.ubah', $data->id) . '" class="btn btn-default btn-sm" title="Ubah"><i class="fa fa-edit text-warning"></i></a>
    //                     <a href="' . route('paban_1.rkkl.detail', $data->id) . '" class="btn btn-default btn-sm" title="detail"><i class="fa fa-eye text-warning"></i></a>
    //                     <button class="btn btn-sm btn-default" onclick="destroy(\'' . $data->id . '\')" title="Hapus"><i class="fa fa-trash text-danger"></i></button>
    //                   </center>';
    //             }
    //         })
    //         ->rawColumns(['action', 'nomor'])
    //         ->make(true);
    // }

    public function create()
    {
        return view('add_source_payment', [
            "title" => "Add Source Payment"
        ]);
    }

    public function store(Request $req)
    {
        // date_default_timezone_set("Asia/Bangkok");
        // $datenow = date('Y-m-d H:i:s');
        // $id_user = Auth::user()->id;

        // $destination = 'uploads/Paban 1/RKKL\\';
        // if ($req->hasFile('dokumen')) {
        //     $file = $req->file('dokumen');
        //     $nama_file = time() . '_RKKL' . '_' . str_replace(' ', '_', $req->file('dokumen')->getClientOriginalName());
        //     Storage::disk('uploads')->putFileAs($destination, $file, $nama_file);
        // } else {
        //     $nama_file = null;
        // }

        $source_pay = Source::create([  
            'source' => $req->sumber,
            'note' => $req->note,
        ]);
        // $this->setLogOwner($req, "Save Data Source Payment: " . $req->sumber);

        return view('payment_list', [
            "title" => "List Source Payment",
            "sources" => Source::all()
        ]);
    }

}
