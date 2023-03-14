@extends('Admin/layout')
@section('page_title','Manage Coupons')
@section('container')
<div class="d-flex align-item-center justify-content-between">

    <h1 class="mr10">Manage Coupon</h1>
    <a href="{{url('admin/coupon')}}" role="button">
        <button type="button" class="btn btn-primary">Back</button>
    </a>
</div>

<div class="row m-t-30">
    <div class="col-md-12">
      
        <div class="card">
            
            <div class="card-body">
                
                <form action="{{route('coupon.manage_coupon_process')}}" method="post">
                   @csrf
  
                <div class="form-group">
                  <div class="row">
               
                     <div class="col-sm-6">
                     <div class="form-group">
                        <label for="title" class="control-label mb-1">Title</label>
                        <input id="title" value="{{$title}}" name="title" type="text" class="form-control" Required>
                        <span class="help-block">
                            @error('title')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="form-group">
                        <label for="code" class="control-label mb-1">Code</label>
                        <input id="code" value="{{$code}}" name="code" type="text" class="form-control" Required>
                        <span class="help-block">
                        @error('code')
                            {{$message}}
                            @enderror
                        </span>
                       </div>
                     </div>
                     
                  </div>
               </div>
                <div class="form-group">
                  <div class="row">
               
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for="value" class="control-label mb-1">Value</label>
                        <input id="value" value="{{$value}}" name="value" type="text" class="form-control" Required>
                        <span class="help-block">
                        @error('value')
                            {{$message}}
                            @enderror
                        </span>
                      </div>
                     </div>
                     <div class="col-sm-6">
                     <div class="form-group">
                           <label for="type" class="control-label mb-1">Type</label>
                          <select id="type" name="type"  class="form-control">
                          @if($type == 'value')
                          <option value="value" selected>value</option>
                          <option value="per">per</option>
                          @elseif($type == 'per')
                          <option value="value">value</option>
                          <option value="per" selected>per</option>
                          @else
                          <option value="value">value</option>
                          <option value="per">per</option>
                          @endif
                          </select>
                        </div>
                     </div>
                     
                  </div>
               </div>
                <div class="form-group">
                  <div class="row">
               
                     <div class="col-sm-6">
                     <div class="form-group">
                           <label for="is_one_time" class="control-label mb-1">is one time</label>
                          <select id="is_one_time" name="is_one_time" class="form-control">
                          @if($is_one_time == '1')
                          <option value="1" selected>YES</option>
                          <option value="0">NO</option>
                          @else
                          <option value="1">YES</option>
                          <option value="0" selected>NO</option>
                          @endif
                          </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                     <div class="form-group">
                        <label for="min_order_amt" class="control-label mb-1">min order amt</label>
                        <input id="min_order_amt" type="text" value="{{$min_order_amt}}" name="min_order_amt" type="text" class="form-control" Required>
                        </div>
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