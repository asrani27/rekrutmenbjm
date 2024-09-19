<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Bidang;
use App\Models\Upload;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Contracts\Cache\Store;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Imagick\Driver;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class UserController extends Controller
{
    public function home()
    {
        $data = Auth::user()->profile;
        return view('user.home', compact('data'));
    }

    public function essay()
    {
        $data = Auth::user()->profile;
        $bidang = Bidang::get();
        return view('user.essay', compact('data', 'bidang'));
    }
    public function updateEssay(Request $req)
    {

        $data = Auth::user()->profile;
        $data->essay = $req->essay;
        $data->bidang_id = $req->bidang_id;
        $data->save();
        return redirect('/user/home')->with('success', 'Essay berhasil di update');
    }
    public function editProfile()
    {
        $data = Auth::user()->profile;

        return view('user.editprofile', compact('data'));
    }

    public function upload(Request $req)
    {
        if ($req->jenis === "foto") {
            $req->validate([
                'file' => 'required|image|mimes:jpg,jpeg|max:2048'
            ]);

            $image = $req->file('file');

            $extension = $req->file->getClientOriginalExtension();

            $filename = uniqid(Str::random(6)) . '.' . $extension;

            $image->move(public_path('storage') . '/foto', $filename);

            $imgManager = new ImageManager(new Driver());

            $thumbImage = $imgManager->read(public_path('storage') . '/foto/' . $filename);

            $thumbImage->scale(2000);

            $thumbImage->save(public_path('storage') . '/real/' . $filename);

            Storage::disk('public')->delete('foto/' . Auth::user()->profile->file_foto);

            Auth::user()->profile->update([
                'file_foto' => $filename
            ]);

            return back()->with('success', 'berhasil di upload');
        } else {

            $req->validate([
                'file' => 'required|mimes:pdf|max:2048'
            ]);


            $file = $req->file('file');
            $filename = uniqid(Str::random(6)) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('storage/pdf', $filename);


            if ($req->jenis === 'KTP') {
                Storage::disk('public')->delete('pdf/' . Auth::user()->profile->file_ktp);
                Auth::user()->profile->update([
                    'file_ktp' => $filename
                ]);
            }
            if ($req->jenis === 'IJAZAH') {
                Storage::disk('public')->delete('pdf/' . Auth::user()->profile->file_ijazah);
                Auth::user()->profile->update([
                    'file_ijazah' => $filename
                ]);
            }
            if ($req->jenis === 'SERTIFIKAT') {
                Storage::disk('public')->delete('pdf/' . Auth::user()->profile->file_sertifikat);
                Auth::user()->profile->update([
                    'file_sertifikat' => $filename
                ]);
            }
            return back()->with('success', 'berhasil di upload');
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
            $u->akademik            = $req->akademik;
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
            $u->nik             = $req->nik;
            $u->nokk            = $req->nokk;
            $u->nama_lengkap    = $req->nama_lengkap;
            $u->nama_panggilan  = $req->nama_panggilan;
            $u->kewarganegaraan = $req->kewarganegaraan;
            $u->jkel            = $req->jkel;
            $u->tanggal_lahir   = $req->tanggal_lahir;
            $u->tempat_lahir    = $req->tempat_lahir;
            $u->status_menikah  = $req->status_menikah;
            $u->telp            = $req->telp;
            $u->alamat_ktp      = $req->alamat_ktp;
            $u->kota_ktp        = $req->kota_ktp;
            $u->kodepos_ktp     = $req->kodepos_ktp;
            $u->alamat_saat_ini = $req->alamat_saat_ini;
            $u->kota_saat_ini   = $req->kota_saat_ini;
            $u->kodepos_saat_ini    = $req->kodepos_saat_ini;
            $u->pendidikan_terakhir = $req->pendidikan_terakhir;
            $u->akademik            = $req->akademik;
            $u->jurusan             = $req->jurusan;
            $u->ipk                 = $req->ipk;
            $u->pekerjaan           = $req->pekerjaan;
            $u->facebook            = $req->facebook;
            $u->instagram           = $req->instagram;
            $u->tiktok              = $req->tiktok;
            $u->save();
            return redirect('/user/home')->with('success', 'Profile Berhasil Di Update');
        }
    }
}
