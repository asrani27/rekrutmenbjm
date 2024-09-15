@extends('layouts.master')

@section('content')
  
<div class="col-12">
    <form class="card" method="POST" action="/user/home/editprofile" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h3 class="card-title">
              Profile
            </h3>
            <div class="card-actions">
              <a href="/user/home">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-left-lines"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 15v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h3v6h-3z" /><path d="M21 15v-6" /><path d="M18 15v-6" /></svg>
                Back To Home<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
              </a>
            </div>
        </div>

        <div class="card-body">
                <div class="row row-cards">
                <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="NIK" value="{{$data == null ? null : $data->nik}}" required maxlength="16" minlength="16">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$data == null ? null : $data->nama}}" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jkel" required>
                            <option value="">-pilih-</option>
                            <option value="L" {{($data == null ? null : $data->jkel) == 'L' ? 'selected':'' }}>Pria</option>
                            <option value="P" {{($data == null ? null : $data->jkel) == 'P' ? 'selected':'' }}>Wanita</option>
                        </option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal" value="{{$data == null ? null : $data->tanggal_lahir}}" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-12">
                    <div class="mb-3">
                    <label class="form-label">Telp</label>
                    <input type="text" class="form-control" name="telp" placeholder="Telp" value="{{$data == null ? null : $data->telp}}" required>
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" class="form-control" name="file" placeholder="file">
                    </div>
                </div> --}}
                
                <div class="col-md-12">
                    <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{$data == null ? null : $data->alamat}}" required>
                    </div>
                </div>
                </div>

        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </form>
  </div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@endpush