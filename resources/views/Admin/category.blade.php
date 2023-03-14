@extends('Admin/layout')
@section('page_title','category')
@section('category_select','active')
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

    <h1 class="">Category</h1>
    <a href="{{url('admin/category/manage_category')}}" role="button">
    <button type="button" class="btn btn-primary">Add category</button>
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
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->category_slug}}</td>
                        <td>
                           
                            <a href=" {{url('admin/category/manage_category')}}/{{$list->id}}">
                                <button type="button"  class="btn btn-success">Edit</button>
                            </a>

                            <a href=" {{url('admin/category/delete/')}}/{{$list->id}}">
                                <button type="button"  class="btn btn-danger">Delete</button>
                            </a>

                            @if($list->status==1)
                            
                              <a href=" {{url('admin/category/status/0')}}/{{$list->id}}">
                                <button type="button"  class="btn btn-warning">Active</button>
                              </a>

                            @elseif($list->status==0)

                              <a href=" {{url('admin/category/status/1')}}/{{$list->id}}">
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