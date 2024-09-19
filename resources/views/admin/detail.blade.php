@extends('layouts.master')

@push('css')
    
<style>

    iframe { 
        width: 100%;
        aspect-ratio: 16 / 9;
    }
    </style>
@endpush
@section('content')


  <div class="col-lg-2">
    @if ($data->file_foto == null)
        
    <div class="img-responsive img-responsive-1x1 rounded-3 border" style="background-image: url(/icon/person.gif)"></div>
    @else
        
    <div class="img-responsive img-responsive-1x1 rounded-3 border" style="background-image: url('/storage/foto/{{$data->file_foto}}')"></div>
    @endif
  </div>
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Profile
        </h3>
        <div class="card-actions">
          {{-- <a href="/user/home/editprofile">
            Edit Profile<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
          </a> --}}
        </div>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-3">NO KK</dt>
          <dd class="col-9">: {{$data == null ? null : $data->nokk}}</dd>

          <dt class="col-3">NIK</dt>
          <dd class="col-9">: {{$data == null ? null : $data->nik}}</dd>

          <dt class="col-3">NAMA LENGKAP</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->nama_lengkap}}</dd>

          <dt class="col-3">NAMA PANGGILAN</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->nama_panggilan}}</dd>

          <dt class="col-3">KEWARGANEGARAAN</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->kewarganegaraan}}</dd>

          <dt class="col-3">JENIS KELAMIN</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->jkel}}</dd>

          <dt class="col-3">TANGGAL LAHIR</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->tanggal_lahir}}</dd>
          
          <dt class="col-3">TEMPAT LAHIR</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->tempat_lahir}}</dd>

          <dt class="col-3">STATUS MENIKAH</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->status_menikah}}</dd>

          <dt class="col-3">E-MAIL</dt>
          <dd class="col-9">:  {{Auth::user()->email}}</dd>

          <dt class="col-3">TELP</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->telp}}</dd>

          <dt class="col-3">ALAMAT SESUAI KTP</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->alamat_ktp}}</dd>

          <dt class="col-3">KOTA SESUAI KTP</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->kota_ktp}}</dd>

          <dt class="col-3">KODEPOS SESUAI KTP</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->kodepos_ktp}}</dd>

          <dt class="col-3">ALAMAT SAAT INI</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->alamat_saat_ini}}</dd>

          <dt class="col-3">KOTA SAAT INI</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->kota_saat_ini}}</dd>

          <dt class="col-3">KODEPOS SAAT INI</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->kodepos_saat_ini}}</dd>

          <dt class="col-3">PENDIDIKAN TERAKHIR</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->pendidikan_terakhir}}</dd>

          <dt class="col-3">NAMA AKADEMIK/UNIVERSITAS</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->akademik}}</dd>

          <dt class="col-3">NAMA JURUSAN/PRODI</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->jurusan}}</dd>

          <dt class="col-3">IPK </dt>
          <dd class="col-9">:  {{$data == null ? null : $data->ipk}}</dd>

          <dt class="col-3">PEKERJAAN</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->pekerjaan}}</dd>

          <dt class="col-3">AKUN FACEBOOK</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->facebook}}</dd>

          <dt class="col-3">AKUN INSTAGRAM</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->instagram}}</dd>

          <dt class="col-3">AKUN TIKTOK</dt>
          <dd class="col-9">:  {{$data == null ? null : $data->tiktok}}</dd>
        </dl>
      </div>
    </div>
  </div>


  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Bidang Dan Essay
        </h3>
        <div class="card-actions">
          {{-- <a href="/user/home/essay">
            Pilih Bidang Dan Isi Essay<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
          </a> --}}
        </div>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-3">BIDANG</dt>
          <dd class="col-9">: {{$data->bidang == null ? '': $data->bidang->nama}}</dd>

          <dt class="col-3">ESSAY</dt>
            @if ($data->essay ==null)
                
            <dd class="col-9">:</dd>
            @else
            <dd class="col-9"> {!!$data->essay!!}</dd>
            @endif
          

          
        </dl>
      </div>
    </div>
  </div>
  
<div class="col-lg-2">
</div>
<div class="col-lg-10">
  <div class="card">
    <div class="card-body text-center">
        @if ($data->file_ktp == null)
            <div style="padding-top:10%; padding-bottom:10%"><strong>No Preview This File</strong></div>
        @else
        <a href="/admin/streampdf/{{$data->id}}" class='btn btn-outline-primary' target='_blank'>FULL PREVIEW</a><br/><br/>
            <iframe style="width: 100%; height: 100%; overflow: hidden;" frameBorder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" src="/admin/streampdf/{{$data->id}}"></iframe>
        @endif
    </div>

    {{-- <div class="table-responsive">
      <table class="table table-vcenter table-bordered table-nowrap card-table">
        <thead>
          <tr>
            <td class="w-50 text-center" colspan="4">
                <a href="/admin/berkaspendaftar/{{$data->id}}" class='btn btn-outline-primary'>LIHAT BERKAS</a>
            </td>
          </tr>
        </thead>
        
      </table>
    </div> --}}
  </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>


</script>
@endpush