@extends('webmaster.webmaster')
@section('content')
<h2 class="mt-4">Master Products</h2>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Master / Data / Products</li>
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
                    <a href="{{ route('product') }}" class="btn btn-warning btn-sm text-white">
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
                            <th>Products Name</th>
                            <th>Qty</th>
                            <th>Purchasing Price</th>
                            <th>Selling Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-control" name="product_name" id="product_name" placeholder="Product Name" value="{{ $param != '0' ? $edit_data->name : '' }}" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="qty" id="qty" value="{{ $param != '0' ? $edit_data->quantity : '' }}" placeholder="Quantity" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="purchasing_price" id="purchasing_price" value="{{ $param != '0' ? $edit_data->purchasing_price : '' }}" placeholder="Purchasing Price" required>
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