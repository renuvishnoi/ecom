@extends('admin.layout')
@section('page_title','product')
@section('product_select','active')
@section('container')'
<h1 class="mb10">product</h1>
@if(session()->has('message'))
<div class="alert alert-success" role="alert">
{{session('message')}}
</div>
@endif
<a href="product/manage_product">
<button type="button" class="btn btn-success">Add product</button>
</a>
 <div class="row m-t-30">
                            <div class="col-md-12">

                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>product</th>
                                               
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr>
                                                <td>{{ $list->id}}</td>
                                                <td>{{ $list->product}}</td>
                                                
                                                <td >
                                                    @if($list->status==1)
                                                    <a href="{{ url('admin/product/status/0') }}/{{$list->id }}"><button type="button" class="btn btn-primary">Active</button></a>
                                                    @elseif($list->status==0)
                                                    <a href="{{ url('admin/product/status/1') }}/{{$list->id }}"><button type="button" class="btn btn-warning">Deactive</button></a>
                                                    @endif

                                                    <a href="{{ url('admin/product/delete') }}/{{$list->id }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                <a href="{{ url('admin/product/manage_product') }}/{{$list->id }}"><button type="button" class="btn btn-success">Edit</button></a>
                                                </td>
                                                
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
@endsection