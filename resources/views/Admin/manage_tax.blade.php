@extends('Admin/layout')
@section('page_title','Manage Tax')
@section('container')
<div class="d-flex align-item-center justify-content-between">

    <h1 class="mr10">Manage Tax</h1>
    <a href="{{url('admin/tax')}}" role="button">
        <button type="button" class="btn btn-primary">Back</button>
    </a>
</div>

<div class="row m-t-30">
    <div class="col-md-12">
      
        <div class="card">
            
            <div class="card-body">
                
                <form action="{{route('tax.manage_tax_process')}}" method="post">
                   @csrf
                    <div class="form-group">
                        <label for="tax_desc" class="control-label mb-1">Tax Desc</label>
                        <input id="tax_desc" value="{{$tax_desc}}" name="tax_desc" type="text" class="form-control" Required>
               
                    </div>
                    <div class="form-group">
                        <label for="tax_value" class="control-label mb-1">Tax Value</label>
                        <input id="tax_value" value="{{$tax_value}}" name="tax_value" type="text" class="form-control" Required>
                        <span class="help-block">
                            @error('tax_value')
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