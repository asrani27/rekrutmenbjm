@extends('layouts.master')

@push('css')
    
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  
@endpush
@section('content')
  
<div class="col-12">
    <form class="card" method="POST" action="/user/home/essay" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h3 class="card-title">
              Pilih Bidang Dan Essay
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
                <div class="col-sm-12 col-md-12">
                    <div class="mb-3">
                    <label class="form-label">BIDANG</label>
                    <select class="form-control" name="bidang_id" required>
                        <option value="">-pilih-</option>
                        @foreach ($bidang as $item)
                            <option value="{{$item->id}}" {{$data->bidang_id == $item->id ? 'selected':''}}>{{$item->nama}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="mb-3">
                    <label class="form-label">ESSAY</label>
                    
                    <textarea id="summernote" name="essay">{!!$data->essay!!}</textarea>
                    </div>
                </div>
                
                </div>

        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
@endsection

@push('js')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400,
            lineHeights: [],
            callbacks: {
                onKeydown: function (e) {
                    // Mengecek jika tombol yang ditekan adalah Enter tanpa Shift
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault(); // Mencegah tindakan Enter default
                        // Menyisipkan <br> sebagai gantinya <p>
                        document.execCommand('insertLineBreak');
                    }
                }
            }
        });
    });
  </script>
@endpush