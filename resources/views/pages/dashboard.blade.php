@extends('webmaster.webmaster')
@section('content')
<h2 class="mt-4">Dashboard</h2>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard / Data / Sample</li>
</ol>
<div class="row">
    <div class="card mb-4 p-0">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-2">  
                    <i class="fas fa-table me-1"></i>
                    Export Data
                </div>
                <div class="col-lg-10">   
                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Import
                    </a>             
                </div>
            </div>
        </div>
        <div class="row mx-4 mt-3">
            <ol class="breadcrumb mb-0">
                <li>
                    <small class="text-dark font-weight-bold">
                        Data yang berhasil di upload : 
                        @if($dataSuccess != null)
                        {{ $dataSuccess->total_baris }}
                        @endif
                    </small>
                </li>
            </ol>
            <ol class="breadcrumb mb-3">
                <li>
                    <small class="text-dark font-weight-bold">
                        Data yang gagal di upload : 
                        @if($dataFailed != null)
                            {{ $dataFailed->total_baris }}
                        @endif
                        <br>
                    </small>
                </li>
            </ol>
            <ol class="breadcrumb mb-3">
                <li>
                    <small class="text-dark font-weight-bold">
                        Link download file : 
                        @if($file != null)
                            <a href="{{ asset('assets/lib/doc/'.$file) }}" download>{{ $file }}</a>
                        @endif
                        <br>
                    </small>
                </li>
            </ol>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>PC</th>
                        <th>TRX Ref ID</th>
                        <th>Produk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->PC}}</td>
                        <td>{{$item->TRX_Ref_ID}}</td>
                        <td>{{$item->Produk}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('import') }}" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
            <div class="form-group row mt-1">
                <div class="col-sm-12">
                    <input type="file" class="form-control" name="import_" id="import_" required>
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-sm-12">   
                    <button type="submit" name="submit" class="btn btn-success btn-sm col-sm-12">SUBMIT</button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection