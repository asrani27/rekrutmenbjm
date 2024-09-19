<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Profile;
use Illuminate\Http\Request;

use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class SuperadminController extends Controller
{
    public function home()
    {
        $data = Profile::orderBy('id', 'ASC')->get();
        return view('admin.home', compact('data'));
    }
    public function detailPendaftar($id)
    {
        $data = Profile::find($id);
        return view('admin.detail', compact('data'));
    }
    public function streamPDF($id)
    {
        try {
            $data = Profile::find($id);

            $oMerger = PDFMerger::init();
            if ($data->file_ktp != null) {
                $pathKTP = public_path('storage') . '/pdf/' . $data->file_ktp;
            } else {
                $pathKTP = null;
            }
            if ($data->file_ijazah != null) {
                $pathIJAZAH = public_path('storage') . '/pdf/' . $data->file_ijazah;
            } else {
                $pathIJAZAH = null;
            }
            if ($data->file_sertifikat != null) {
                $pathSERTIFIKAT = public_path('storage') . '/pdf/' . $data->file_sertifikat;
            } else {
                $pathSERTIFIKAT = null;
            }

            $oMerger->addPDF($pathKTP);
            $oMerger->addPDF($pathIJAZAH);
            $oMerger->addPDF($pathSERTIFIKAT, 'all');


            $oMerger->merge();
            $oMerger->save('storage/merge/' . $data->id . '.pdf');

            $pathToFile = public_path() . '/storage/merge/' . $data->id . '.pdf';

            return response()->file($pathToFile);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function berkasPendaftar($id)
    {
        $data = Profile::find($id);
        return view('admin.detail', compact('data'));
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
