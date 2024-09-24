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


          @if ($data->status_kirim == 0 || $data->status_kirim == null)

          <dt class="col-3">STATUS</dt>
          <dd class="col-9">: <span class="badge badge-outline text-yellow">DRAF</span></dd>
          @endif
          @if ($data->status_kirim == 1)

          <dt class="col-3">STATUS</dt>
          <dd class="col-9">: <span class="badge badge-outline text-blue">DI KIRIM</span></dd>
          @endif
          @if ($data->status_kirim == 2)
              
          <dt class="col-3">STATUS</dt>
          <dd class="col-9">: <span class="badge badge-outline text-green">TERVALIDASI</span></dd>
          @endif
          @if ($data->status_kirim == 3)
              
          <dt class="col-3">STATUS</dt>
          <dd class="col-9">: <span class="badge badge-outline text-red">TIDAK VALID</span></dd>
          <dt class="col-3">KETERANGAN</dt>
          <dd class="col-9">: <span class="badge badge-outline text-black">{{$data == null ? null : $data->keterangan}}</span></dd>
          @endif
          <hr>
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

          <dt class="col-3">RINGKASAN</dt>
          <dd class="col-9">: {{$data->ringkasan == null ? '': $data->ringkasan}}</dd>

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

        <a href="/admin/ktp/{{$data->id}}" class='btn btn-outline-primary w-50' target='_blank'>PREVIEW KTP</a><br/><br/>
        <a href="/admin/ijazah/{{$data->id}}" class='btn btn-outline-primary w-50' target='_blank'>PREVIEW IJAZAH</a><br/><br/>
        <a href="/admin/sertifikat/{{$data->id}}" class='btn btn-outline-primary w-50' target='_blank'>PREVIEW SERTIFIKAT</a><br/><br/>
        
        
        @if ($data->preview_ktp == null || $data->preview_ijazah == null || $data->preview_sertifikat == null)
            
        <a href="#" class='btn btn-success disabled w-50' disabled> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg> VALIDASI</a><br/><br/>
        @else
            
        <a href="#" class='btn btn-success validasi w-50' data-id="{{$data->id}}"> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg> VALIDASI</a><br/><br/>
        @endif
        
    </div>
    
  </div>
</div>

<form method="post" action="/admin/validasi">
@csrf
<div class="modal modal-blur fade" id="modal-validasi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Validasi Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label class="form-label">Validasi</label>
              <input type="hidden" id="profile_id" name="profile_id">
              <select name="status_kirim" class="form-control" required>
                <option value="">-pilih-</option>
                <option value="2">TERVALIDASI</option>
                <option value="3">TIDAK VALID</option>
              </select>
            </div>
          </div>
          
          <div class="col-lg-12">
            <div>
              <label class="form-label">Keterangan</label>
              <textarea class="form-control" rows="3" name="keterangan"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
          Cancel
        </a>
        <button type="submit" class="btn btn-primary ms-auto">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          Simpan
        </button>
      </div>
    </div>
  </div>
</div>
</form>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>


$(document).on('click', '.validasi', function() {
    $('#profile_id').val($(this).data('id'));
    $("#modal-validasi").modal('show');
  });
</script>
@endpush