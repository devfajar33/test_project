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
                    Input Data  
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
                <div class="form-group row mt-1">
                    <label class="col-sm-2 col-form-label">Products <span class="text-danger">&nbsp;*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control category" name="products" id="products" placeholder="Products" required>
                            <option value=""> ------- </option>
                            @foreach($data_product as $item)
                            <option value="{{$item->id}}"> {{$item->name}} || Price : {{$item->selling_price}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-1">
                    <label class="col-sm-2 col-form-label">Services <span class="text-danger">&nbsp;*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control category" name="services" id="services" placeholder="Services" required>
                            <option value=""> ------- </option>
                            @foreach($data_service as $item)
                            <option value="{{$item->id}}"> {{$item->name}} || Price : {{$item->selling_price}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-1">
                    <label class="col-sm-2 col-form-label">Quantity <span class="text-danger">&nbsp;*</span></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="qty_paid" id="qty_paid" placeholder="Quantity" required>
                    </div>
                </div>
                <div class="form-group row mt-1">
                    <label class="col-sm-2 col-form-label">Paid Price <span class="text-danger">&nbsp;*</span></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="paid_price" id="paid_price" placeholder="Paid Price" required>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-sm-10 col-form-label"></label>
                    <div class="col-sm-2">   
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