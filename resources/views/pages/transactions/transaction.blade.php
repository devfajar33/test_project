@extends('webmaster.webmaster')
@section('content')
<h2 class="mt-4">Transactions</h2>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Data / Transactions</li>
</ol>
<div class="row">
    <div class="card mb-4 p-0">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-2">  
                    <i class="fas fa-table me-1"></i>
                    Data Transactions
                </div>
                <div class="col-lg-10">   
                    <a href="{{ route('add.transaction') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus me-1"></i>
                        Add new transactions
                    </a>             
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>Products Name</th>
                        <th>Service Name</th>
                        <th>Quantity</th>
                        <th>Paid Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->products}}</td>
                        <td>{{$item->services}}</td>
                        <td>{{$item->quantity_buy}}</td>
                        <td>{{$item->paid_price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection