@extends('Admin/layout')
@section('page_title','Manage Color')
@section('container')
<div class="d-flex align-item-center justify-content-between">

    <h1 class="mr10">Manage Color</h1>
    <a href="{{url('admin/color')}}" role="button">
        <button type="button" class="btn btn-primary">Back</button>
    </a>
</div>

<div class="row m-t-30">
    <div class="col-md-12">
      
        <div class="card">
            
            <div class="card-body">
                
                <form action="{{route('color.manage_color_process')}}" method="post">
                   @csrf
                    <div class="form-group">
                        <label for="color" class="control-label mb-1">Color</label>
                        <input id="color" value="{{$color}}" name="color" type="text" class="form-control" Required>
                        <span class="help-block">
                            @error('color')
                            {{$message}}
                            @enderror
                        </span>
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