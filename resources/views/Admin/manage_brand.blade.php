@extends('Admin/layout')
@section('page_title','Manage Brand')
@section('container')


@error('image')
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
   <span class="badge badge-pill badge-primary">{{$message}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@enderror

<div class="d-flex align-item-center justify-content-between">

    <h1 class="mr10">Manage brand</h1>
    <a href="{{url('admin/brand')}}" role="button">
        <button type="button" class="btn btn-primary">Back</button>
    </a>
</div>

<div class="row m-t-30">
    <div class="col-md-12">
      
        <div class="card">
            
            <div class="card-body">
                
                <form action="{{route('brand.manage_brand_process')}}" method="post" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="color" class="control-label mb-1">Name</label>
                        <input id="color" value="{{$name}}" name="name" type="text" class="form-control">
                        <span class="help-block">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                <label for="brand" class="control-label mb-1">Image</label>
                                <input id="brand_img" name="image" type="file" class="form-control">
                                </div>
                                 <img style="width:159px;" src="{{asset('storage/media/brand/'.$image)}}" class="" alt="">
                                 
                            </div>
                            <div class="col-md-4">
                           <label for="is_home" class="control-label mb-1">show in home</label>
                           <input id="is_home" name="is_home" type="checkbox" {{ $is_home_selected }}>
                      </div>
                        </div>
               </div>
   
                    <div>
                        <button id="submit-button" type="submit" class="btn btn-lg btn-info btn-block">
                          submit
                        </button>
                    </div>
                    
                      <input type="hidden" value={{$id}} name="id">
                    
                </form>
            </div>
        </div>
    </div>


</div>


@endsection