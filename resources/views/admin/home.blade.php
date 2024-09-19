@extends('layouts.master')

@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h2 class="page-title">
          Data Pendaftar Staf Khususu
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
      
        
      </div>
    </div>
  </div>
</div>
<div class="row">

  @if(session()->has('success'))
  <div class="col-lg-12">
    <div class="alert alert-important alert-success alert-dismissible" role="alert">
      <div class="d-flex">
        <div>
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
</div>

  <div class="col-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Bidang Yang Di Pilih</th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>
                <div class="d-flex py-1 align-items-center">
                  <span class="avatar me-2" style="background-image: url(./static/avatars/006m.jpg)"></span>
                  <div class="flex-fill">
                    <div class="font-weight-medium">Lorry Mion</div>
                    <div class="text-secondary"><a href="#" class="text-reset">lmiona@livejournal.com</a></div>
                  </div>
                </div>
              </td>
              <td>
                <div>Automation Specialist IV</div>
                <div class="text-secondary">Accounting</div>
              </td>
              <td>
                <a href="#" class="btn btn-outline-primary">Detail</a>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
        
  
@endsection

@push('js')

@endpush