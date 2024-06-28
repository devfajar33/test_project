@extends('webmaster.webmaster')
@section('content')
<h2 class="mt-4">Master Services</h2>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Master / Data / Services</li>
</ol>
<div class="row">
    <div class="card mb-4 p-0">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-2">   
                    <i class="fa fa-align-justify me-1"></i>
                    Edit Data  
                </div>
                <div class="col-lg-10"> 
                    <a href="{{ route('service') }}" class="btn btn-warning btn-sm text-white">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back
                    </a>           
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route($action) }}" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Services Name</th>
                            <th>Base Price</th>
                            <th>Selling Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-control" name="service_name" id="service_name" placeholder="Service Name" value="{{ $param != '0' ? $edit_data->name : '' }}" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="base_price" id="base_price" value="{{ $param != '0' ? $edit_data->base_price : '' }}" placeholder="Base Price" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="selling_price" id="selling_price" value="{{ $param != '0' ? $edit_data->selling_price : '' }}" placeholder="Selling Price" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group row mt-3">
                    <label class="col-sm-10 col-form-label"></label>
                    <div class="col-sm-2">   
                        <input type="hidden" name="id" id="id" value="{{ $param != '0' ? $edit_data->id : '' }}">
                        <button type="submit" name="submit" class="btn btn-success btn-sm col-sm-12">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection