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
                    Input Data  
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
                            <th width="1%">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-control" name="product_name[0]" id="product_name[0]" placeholder="Product Name" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="qty[0]" id="qty[0]" placeholder="Quantity" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="purchasing_price[0]" id="purchasing_price[0]" placeholder="Puchasing Price" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="selling_price[0]" id="selling_price[0]" placeholder="Selling Price" required>
                            </td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-sm btn-success btn-sm" id="add"><i class="fa fa-plus"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group row mt-3">
                    <label class="col-sm-10 col-form-label"></label>
                    <div class="col-sm-2">   
                        <input type="hidden" name="id" id="id" value="{{ $param != '0' ? $edit_data_detail->id : '' }}">
                        <button type="submit" name="submit" class="btn btn-success btn-sm col-sm-12">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var i = 1;
    for(i = 1; i < 5; i++) {
        $('#table tbody').append(
            `
                <tr>
                    <td>
                        <input class="form-control" name="product_name[`+i+`]" id="product_name[`+i+`]" placeholder="Product Name">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="qty[`+i+`]" id="qty[`+i+`]" placeholder="Quantity">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="purchasing_price[`+i+`]" id="purchasing_price[`+i+`]" placeholder="Purchasing Price">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="selling_price[`+i+`]" id="selling_price[`+i+`]" placeholder="Selling Price">
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger remove-row" id="add"><i class="fa fa-minus"></i></a>
                    </td>
                </tr>
            `
        );
    }
    $('#add').click(function() {
        $('#table tbody').append(
            `
                <tr>
                    <td>
                        <input class="form-control" name="product_name[`+i+`]" id="product_name[`+i+`]" placeholder="Product Name">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="qty[`+i+`]" id="qty[`+i+`]" placeholder="Quantity">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="purchasing_price[`+i+`]" id="purchasing_price[`+i+`]" placeholder="Purchasing Price">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="selling_price[`+i+`]" id="selling_price[`+i+`]" placeholder="Selling Price">
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger remove-row" id="add"><i class="fa fa-minus"></i></a>
                    </td>
                </tr>
            `
        );
        ++i;
    });
    $(document).on('click', '.remove-row', function(){
        $(this).parents('tr').remove();
    });
</script>
@endsection