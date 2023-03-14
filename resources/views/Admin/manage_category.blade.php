@extends('Admin/layout')
@section('page_title','Manage Category')
@section('container')
<div class="d-flex align-item-center justify-content-between">

    <h1 class="mr10">Manage Category</h1>
    <a href="{{url('admin/category')}}" role="button">
        <button type="button" class="btn btn-primary">Back</button>
    </a>
</div>

<div class="row m-t-30">
    <div class="col-md-12">
      
        <div class="card">
            
            <div class="card-body">
                
                <form action="{{route('categroy.manage_category_process')}}" method="post" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="category" class="control-label mb-1">Category</label>
                        <input id="category" value="{{$category_name}}" name="category_name" type="text" class="form-control" Required>
                        <span class="help-block">
                            @error('category_name')
                            {{$message}}
                            @enderror
                        </span>
                      </div>
                      <div class="col-md-4">
                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                            <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" Required>
                            <span class="help-block">
                            @error('category_slug')
                                {{$message}}
                                @enderror
                            </span>
                      </div>
                      <div class="col-md-4">
                           <label for="parent_categroy_id" class="control-label mb-1">Parent Category</label>
                           <select id="parent_category_id" name="parent_category_id" value="{{$parent_category_id}}" type="text" class="form-control" Required>
                              <option value="0">select category</option>
                              @foreach($category as $list)
                              @if($parent_category_id == $list->id)
                              <option selected value="{{$list->id}}">{{$list->category_name}}</option>
                              @else
                              <option value="{{$list->id}}">{{$list->category_name}}</option>
                              @endif
                              @endforeach
                           </select>
                      </div>
                     
                    </div>
                    </div>
                    <div class="form-group">
                     <div class="row">
                       <div class="col-sm-8">
                        <div class="form-group">
                           <label for="category_image" class="control-label mb-1">Image</label>
                           <input id="category_image" name="category_image" type="file" class="form-control">
                        </div>
                       </div>
                     <div class="col-sm-4">
                        <img style="width:159px;" src="{{asset('storage/media/category/'.$category_image)}}" class="" alt="">
                     </div>
                     <span class="help-block">
                            @error('category_image')
                                {{$message}}
                                @enderror
                            </span>
                  </div>
                  <div class="col-md-4">
                           <label for="is_home" class="control-label mb-1">show in home</label>
                           <input id="is_home" name="is_home" type="checkbox" {{ $is_home_selected }}>
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