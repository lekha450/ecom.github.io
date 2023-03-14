@extends('Admin/layout')
@section('page_title','product')
@section('product_select','active')
@section('container')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
		<span class="badge badge-pill badge-primary">{{session('message')}}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
</div>
@endif
<div class="d-flex align-item-center justify-content-between">

    <h1 class="">Product</h1>
    
    <a href="{{url('admin/product/manage_product')}}" role="button">
    <button type="button" class="btn btn-primary">Add Product</button>
    </a>
</div>

<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <!-- <th>category_id</th> -->
                        <th>name</th>
                        <th>slug</th>
                         <th>Image</th>
                       <!-- <th>model</th>
                        <th>short_desc</th>
                        <th>desc</th>
                        <th>keywords</th>
                        <th>technical_specification</th>
                        <th>uses</th>
                        <th>warranty</th> -->
                        <th>Action</th> 
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->slug}}</td>
                         <td>
                            @if($list->image!='')
                            <img style="width:70px;" height= "40px" src="{{asset('storage/media/'.$list->image)}}" 
                            class="" alt="hello">
                            @endif
                        </td>
                        <!--<td>{{$list->model}}</td>
                        <td>{{$list->short_desc}}</td>
                        <td>{{$list->desc}}</td>
                        <td>{{$list->keywords}}</td>
                        <td>{{$list->technical_specification}}</td>
                        <td>{{$list->uses}}</td>
                        <td>{{$list->warranty}}</td> -->
                        <td>
                           
                            <a href="{{url('admin/product/manage_product')}}/{{$list->id}}">
                                <button type="button"  class="btn btn-success">Edit</button>
                            </a>

                            <a href="{{url('admin/product/delete/')}}/{{$list->id}}">
                                <button type="button"  class="btn btn-danger">Delete</button>
                            </a>

                            @if($list->status==1)
                            
                              <a href=" {{url('admin/product/status/0')}}/{{$list->id}}">
                                <button type="button"  class="btn btn-warning">Active</button>
                              </a>

                            @elseif($list->status==0)

                              <a href=" {{url('admin/product/status/1')}}/{{$list->id}}">
                                <button type="button"  class="btn btn-primary">Dectivate</button>
                              </a>

                            @endif

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