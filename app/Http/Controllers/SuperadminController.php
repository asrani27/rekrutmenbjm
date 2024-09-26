<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Profile;
use Illuminate\Http\Request;


use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Support\Facades\App;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class SuperadminController extends Controller
{
    public function home()
    {
        $bidang = Bidang::get();
        $data = Profile::orderBy('id', 'ASC')->get();
        return view('admin.home', compact('data', 'bidang'));
    }

    public function filter()
    {
        $bidang_id = request()->get('bidang_id');
        $status = request()->get('status');
        $bidang = Bidang::get();

        if ($bidang_id === null && $status === null) {
            $data = Profile::orderBy('id', 'ASC')->get();
        } elseif ($bidang_id != null && $status === null) {
            $data = Profile::orderBy('id', 'ASC')->where('bidang_id', $bidang_id)->get();
        } elseif ($bidang_id === null && $status != null) {
            $data = Profile::where('status_kirim', $status)->orderBy('id', 'ASC')->get();
        } elseif ($bidang_id != null && $status != null) {
            $data = Profile::orderBy('id', 'ASC')->where('bidang_id', $bidang_id)->where('status_kirim', $status)->get();
        }

        request()->flash();
        return view('admin.home', compact('data', 'bidang'));
    }
    public function detailPendaftar($id)
    {
        $data = Profile::find($id);
        return view('admin.detail', compact('data'));
    }
    public function validasi(Request $req)
    {

        $data = Profile::find($req->profile_id)->update([
            'status_kirim' => $req->status_kirim,
            'keterangan' => $req->keterangan
        ]);
        return back()->with('success', 'telah di validasi');
    }
    public function streamKTP($id)
    {
        Profile::find($id)->update(['preview_ktp' => 1]);
        $data = Profile::find($id);
        $path = storage_path('app/public/pdf/' . $data->file_ktp);

        if (!file_exists($path)) {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML('<h1>File Tidak Ada</h1>');
            return $pdf->stream();
        }
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $data->file_ktp . '"',
        ]);
    }
    public function streamIJAZAH($id)
    {
        Profile::find($id)->update(['preview_ijazah' => 1]);
        $data = Profile::find($id);
        $path = storage_path('app/public/pdf/' . $data->file_ijazah);

        if (!file_exists($path)) {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML('<h1>File Tidak Ada</h1>');
            return $pdf->stream();
        }
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $data->file_ijazah . '"',
        ]);
    }
    public function streamSERTIFIKAT($id)
    {
        Profile::find($id)->update(['preview_sertifikat' => 1]);
        $data = Profile::find($id);
        $path = storage_path('app/public/pdf/' . $data->file_sertifikat);

        if (!file_exists($path)) {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML('<h1>File Tidak Ada</h1>');
            return $pdf->stream();
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $data->file_sertifikat . '"',
        ]);
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
