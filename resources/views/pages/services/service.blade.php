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
                    <i class="fas fa-table me-1"></i>
                    Data Services
                </div>
                <div class="col-lg-10">   
                    <a href="{{ route('add.service') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus me-1"></i>
                        Add new Services
                    </a>             
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>Services Name</th>
                        <th>Base Price</th>
                        <th>Selling Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->base_price}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>
                            <a href="{{ route('edit.service', $item->id) }}" name="edit" class="btn btn-warning btn-sm text-white"><i class="icon fa fa-edit"></i></a>
                            <a href="{{ route('delete.service', $item->id) }}" name="name" class="btn btn-sm btn-danger"><i class="icon fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection