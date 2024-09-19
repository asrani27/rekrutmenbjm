<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Profile;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class UserController extends Controller
{
    public function home()
    {
        $data = Auth::user()->profile;
        return view('user.home', compact('data'));
    }

    public function editProfile()
    {
        $data = Auth::user()->profile;

        return view('user.editprofile', compact('data'));
    }

    public function upload(Request $req)
    {
        if ($req->jenis == "foto") {
            $extension = $req->file->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;

            $image = $req->file('file');

            $realPath = public_path('storage') . '/foto/real';
            $compressPath = public_path('storage');

            $img = Image::make($image->path());

            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save($compressPath . '/' . $filename);

            Storage::disk('public')->move($filename, '/foto/compress/' . $filename);
            $image->move($realPath, $filename);
            return back();
        } else {
        }
    }
    public function updateProfile(Request $req)
    {
        $data = Auth::user()->profile;

        if ($data == null) {
            //create data
            $n = new Profile();
            $n->nik             = $req->nik;
            $n->nokk            = $req->nokk;
            $n->nama_lengkap    = $req->nama_lengkap;
            $n->nama_panggilan  = $req->nama_panggilan;
            $n->kewarganegaraan = $req->kewarganegaraan;
            $n->jkel            = $req->jkel;
            $n->tanggal_lahir   = $req->tanggal_lahir;
            $n->tempat_lahir    = $req->tempat_lahir;
            $n->status_menikah  = $req->status_menikah;
            $n->telp            = $req->telp;
            $n->alamat_ktp      = $req->alamat_ktp;
            $n->kota_ktp        = $req->kota_ktp;
            $n->kodepos_ktp     = $req->kodepos_ktp;
            $n->alamat_saat_ini = $req->alamat_saat_ini;
            $n->kota_saat_ini   = $req->kota_saat_ini;
            $n->kodepos_saat_ini    = $req->kodepos_saat_ini;
            $n->pendidikan_terakhir = $req->pendidikan_terakhir;
            $n->jurusan             = $req->jurusan;
            $n->ipk                 = $req->ipk;
            $n->pekerjaan           = $req->pekerjaan;
            $n->facebook            = $req->facebook;
            $n->instagram           = $req->instagram;
            $n->tiktok              = $req->tiktok;
            $n->save();

            $auth = Auth::user();
            $auth->profile_id = $n->id;
            $auth->save();

            return redirect('/user/home')->with('success', 'Profile Berhasil Di Update');
        } else {
            //update
            $u = $data;
            $u->nama = $req->nama;
            $u->nik = $req->nik;
            $u->jkel = $req->jkel;
            $u->tanggal_lahir = $req->tanggal_lahir;
            $u->telp = $req->telp;
            $u->alamat = $req->alamat;
            $u->save();
            return redirect('/user/home')->with('success', 'Profile Berhasil Di Update');
        }
    }
}
