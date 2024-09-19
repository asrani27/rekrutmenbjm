<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }


    public function bidang()
    {
        $data = Bidang::get();
        return view('admin.bidang.index', compact('data'));
    }
    public function add_bidang()
    {
        return view('admin.bidang.add');
    }
    public function store_bidang(Request $req)
    {
        Bidang::create($req->all());
        return redirect('/admin/bidang');
    }
    public function edit_bidang($id)
    {
        $data = Bidang::find($id);
        return view('admin.bidang.edit', compact('data'));
    }
    public function update_bidang(Request $req, $id)
    {
        Bidang::find($id)->update($req->all());
        return redirect('/admin/bidang');
    }
    public function delete_bidang($id)
    {
        $data = Bidang::find($id)->delete();
        return back();
    }
}
