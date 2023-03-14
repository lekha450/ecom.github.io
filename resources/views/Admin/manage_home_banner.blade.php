@extends('Admin/layout')
@section('page_title','Manage home banner')
@section('container')
<div class="d-flex align-item-center justify-content-between">

    <h1 class="mr10">Manage Home banner</h1>
    <a href="{{url('admin/home_banner')}}" role="button">
        <button type="button" class="btn btn-primary">Back</button>
    </a>
</div>

<div class="row m-t-30">
    <div class="col-md-12">
      
        <div class="card">
            
            <div class="card-body">
                
                <form action="{{route('home_banner.manage_home_banner_process')}}" method="post" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="category" class="control-label mb-1">Btn text</label>
                        <input id="category" value="{{$btn_txt}}" name="btn_txt" type="text" class="form-control">
                        <span class="help-block">
                         
                        </span>
                      </div>
                      <div class="col-md-4">
                            <label for="btn_link" class="control-label mb-1">btn link</label>
                            <input id="btn_link" value="{{$btn_link}}" name="btn_link" type="text" class="form-control">
                            <span class="help-block">
                           
                            </span>
                      </div>
                 
                    </div>
                    </div>
                    <div class="form-group">
                     <div class="row">
                       <div class="col-sm-8">
                        <div class="form-group">
                           <label for="image" class="control-label mb-1">Image</label>
                           <input id="image" name="image" type="file" class="form-control">
                        </div>
                       </div>
                     <div class="col-sm-4">
                        <img style="width:159px;" src="{{asset('storage/media/banner/'.$image)}}" class="" alt="">
                     </div>
                     <span class="help-block">
                            @error('image')
                                {{$message}}
                                @enderror
                            </span>
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