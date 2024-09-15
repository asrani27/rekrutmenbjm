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
            $n->nama = $req->nama;
            $n->nik = $req->nik;
            $n->jkel = $req->jkel;
            $n->tanggal_lahir = $req->tanggal_lahir;
            $n->telp = $req->telp;
            $n->alamat = $req->alamat;
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
