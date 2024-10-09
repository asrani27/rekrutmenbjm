@extends('layouts.master')

@section('content')
<div class="row">
  @if(session()->has('success'))
  <div class="col-lg-12">
    <div class="alert alert-important alert-success alert-dismissible" role="alert">
      <div class="d-flex">
        <div>
          <!-- Download SVG icon from http://tabler-icons.io/i/check -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
        </div>
        <div>
          {{ session()->get('success') }}
        </div>
      </div>
      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
  </div>
  @endif

  @if(session()->has('error'))
  <div class="col-lg-12">
    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
      <div class="d-flex">
        <div>
          <!-- Download SVG icon from http://tabler-icons.io/i/check -->
          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 2h-14a3 3 0 0 0 -3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3 -3v-14a3 3 0 0 0 -3 -3zm-9.387 6.21l.094 .083l2.293 2.292l2.293 -2.292a1 1 0 0 1 1.497 1.32l-.083 .094l-2.292 2.293l2.292 2.293a1 1 0 0 1 -1.32 1.497l-.094 -.083l-2.293 -2.292l-2.293 2.292a1 1 0 0 1 -1.497 -1.32l.083 -.094l2.292 -2.293l-2.292 -2.293a1 1 0 0 1 1.32 -1.497z" /></svg>
        </div>
        <div>
          {{ session()->get('error') }}
        </div>
      </div>
      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
  </div>
  @endif
</div>

  <div class="col-lg-2">
    @if ($data->file_foto == null)
        
    <div class="img-responsive img-responsive-1x1 rounded-3 border" style="background-image: url(/icon/person.gif)"></div>
    @else
        
    <div class="img-responsive img-responsive-1x1 rounded-3 border" style="background-image: url('/storage/foto/{{$data->file_foto}}')"></div>
    @endif
    <br/>

  </div>
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Profile
        </h3>
        <div class="card-actions">

          @if ($data->status_kirim == 0 || $data->status_kirim == null)
          <a href="/user/home/editprofile">
            Edit Profile<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
          </a>
          @endif
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
          <hr>
          @endif

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
          Sektor
        </h3>
        <div class="card-actions">

          @if ($data->status_kirim == 0 || $data->status_kirim == null)
          <a href="/user/home/essay">
            Pilih Sektor Dan Isi Essay<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
          </a>
          @endif
        </div>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-3">SEKTOR</dt>
          <dd class="col-9">: {{$data->sektor == null ? '': $data->sektor->nama}}</dd>

          <dt class="col-3">RINGKASAN ESAI</dt>
          <dd class="col-9">: {{$data->ringkasan == null ? '': $data->ringkasan}}</dd>

          <dt class="col-3">ESAI</dt>
            @if ($data->essay ==null)
                
            <dd class="col-9">:</dd>
            @else
            <dd class="col-9"> {!!$data->essay!!}</dd>
            @endif
          

          
        </dl>
      </div>
    </div>
  </div>
  @error('file')
      
  <div class="col-lg-12">
    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
      <div class="d-flex">
        <div>
          <!-- Download SVG icon from http://tabler-icons.io/i/check -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
        </div>
        <div>
          {{ $message }}
        </div>
      </div>
      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
  </div>
  @enderror
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter table-bordered table-nowrap card-table">
        <thead>
          <tr>
            <td class="w-50 text-center" colspan="4">
              <h2>List Berkas Yang Harus Di Upload</h2>
              <div class="text-secondary text-wrap">
                harap di perhatikan bahwa yang bertanda X belum di upload
              </div>
            </td>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-light">
            <th class="subheader">Keterangan</th>
            <th class="subheader">Format</th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td>FOTO FORMAL</td>
            <td class="text-center"><a href="/storage/foto/{{$data->file_foto}}" target="_blank">JPG</a></td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
              @if ($data->file_foto == null)
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
              @else  
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
              @endif
            </td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->

              @if ($data->status_kirim == 0 || $data->status_kirim == null)
              <button type="button" class="btn btn-md btn-outline-primary uploadfile" data-id="123" data-jenis="foto">upload</button>
              @endif
            </td>
          </tr>
          <tr>
            <td>FOTO CASUAL <br/><small>yang akan di tampilkan di instagram</small></td>
            <td class="text-center"><a href="/storage/pose/{{$data->file_pose}}" target="_blank">JPG</a></td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
              @if ($data->file_pose == null)
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
              @else  
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
              @endif
            </td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->

              @if ($data->status_kirim == 0 || $data->status_kirim == null)
              <button type="button" class="btn btn-md btn-outline-primary uploadfile" data-id="123" data-jenis="pose">upload</button>
              @endif
            </td>
          </tr>
          <tr>
            <td>KTP</td>
            <td class="text-center"><a href="/storage/ktp/{{$data->file_ktp}}" target="_blank">JPG</a></td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
            
              @if ($data->file_ktp == null)
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
              @else  
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
              @endif
            </td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->

              @if ($data->status_kirim == 0 || $data->status_kirim == null)
              <a href=# class="btn btn-md btn-outline-primary uploadfile" data-jenis="KTP">upload</a>
              @endif
            </td>
          </tr>
          <tr>
            <td>IJAZAH PENDIDIKAN TERAKHIR</td>
            <td class="text-center"><a href="/storage/pdf/{{$data->file_ijazah}}" target="_blank">PDF</a></td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
              @if ($data->file_ijazah == null)
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
              @else  
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
              @endif
            </td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->

              @if ($data->status_kirim == 0 || $data->status_kirim == null)
              <a href=# class="btn btn-md btn-outline-primary uploadpdf" data-jenis="IJAZAH">upload</a>
              @endif
            </td>
          </tr>
          <tr>
            <td>SERTIFIKAT PRESTASI (JIKA ADA)</td>
            <td class="text-center"><a href="/storage/pdf/{{$data->file_sertifikat}}" target="_blank">PDF</a></td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
            
              @if ($data->file_sertifikat == null)
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-red"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
              @else  
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
              @endif
            </td>
            <td class="text-center"><!-- Download SVG icon from http://tabler-icons.io/i/check -->

              @if ($data->status_kirim == 0 || $data->status_kirim == null)
              <a href=# class="btn btn-md btn-outline-primary uploadpdf" data-jenis="SERTIFIKAT">upload</a>
              @endif
            </td>
          </tr>
          
        </tbody>
        
      </table>
    </div>
  </div>

  <div class="modal modal-blur fade" id="modal-upload" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload Berkas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/user/home/upload" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            Max File Size Foto 2 MB (JPG)
            <input type="file" name="file" id="file" class="form-control" accept="image/jpg" required>
            <input type="hidden" name="jenis" id="jenis" class="form-control">
            <input type="hidden" name="file_id" id="file_id" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal modal-blur fade" id="modal-upload-pdf" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload Berkas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/user/home/upload" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <input type="text" name="jenis" id="jenis_pdf" class="form-control" readonly><br/>
            Max File Size 2 MB (PDF)
            <input type="file" name="file" id="filepdf" class="form-control" accept="application/pdf" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @if ($data->status_kirim == 0 || $data->status_kirim == null)
  <button class='btn btn-primary btn-lg w-100 kirimlamaran'> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg> KIRIM</button>
  @endif


  <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-danger"></div>
        <div class="modal-body text-center py-4">
          <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
          <h3>Apakah Anda Sudah Yakin Semua Data Terisi ?</h3>
          <div class="text-secondary">Setelah data terkirim, anda tidak bisa mengubah data anda kembali</div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                  Cancel
                </a>
              </div>
              <div class="col"><a href="/user/home/kirimlamaran" class="btn btn-danger w-100">
                  Ya, Kirim Sekarang!
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
  const uploadField = document.getElementById("file");

  uploadField.onchange = function() {
      if(this.files[0].size > 2097152) {
        alert("Maksimal File 2 MB!");
        this.value = "";
      }
  };
  const uploadFieldpdf = document.getElementById("filepdf");

  uploadFieldpdf.onchange = function() {
        if(this.files[0].size > 2097152) {
          alert("Maksimal File 2 MB!");
          this.value = "";
        }
    };

  $(document).on('click', '.uploadfile', function() {
    $('#file_id').val($(this).data('id'));
    $('#jenis').val($(this).data('jenis'));
    $("#modal-upload").modal('show');
  });

  $(document).on('click', '.uploadpdf', function() {
    $('#jenis_pdf').val($(this).data('jenis'));
    $("#modal-upload-pdf").modal('show');
  });

  $(document).on('click', '.kirimlamaran', function() {
    $("#modal-danger").modal('show');
  });
</script>
@endpush