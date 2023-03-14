@extends('Admin/layout')
@section('page_title','Manage Product')
@section('container')

@php
if($id>0){
$image_required = '';
}
else{
$image_required= 'required';
}
@endphp
@if(session()->has('sku_err'))


<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
   <span class="badge badge-pill badge-primary">{{session('sku_err')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@endif
@error('attr_image.*')
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
   <span class="badge badge-pill badge-primary">{{$message}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@enderror
@error('images.*')
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
   <span class="badge badge-pill badge-primary">{{$message}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@enderror
<script src="{{url('admin_assets/ckedtitor/ckeditor.js')}}"></script>
<div class="d-flex align-item-center justify-content-between">
   <h1 class="mr10">Manage Product</h1>
   <a href="{{url('admin/product')}}" role="button">
   <button type="button" class="btn btn-primary">Back</button>
   </a>
</div>
<form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
   <div class="row m-t-30">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               @csrf
               <div class="form-group">
                  <label for="name" class="control-label mb-1">Name</label>
                  <input id="name" value="{{$name}}" name="name" type="text" class="form-control" Required>
                  <span class="help-block">
                  @error('name')
                  {{$message}}
                  @enderror
                  </span>
               </div>
               <div class="form-group">
                  <label for="slug" class="control-label mb-1">Slug</label>
                  <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" Required>
                  <span class="help-block">
                  @error('slug')
                  {{$message}}
                  @enderror
                  </span>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-8">
                        <div class="form-group">
                           <label for="image" class="control-label mb-1">Image</label>
                           <input id="image" name="image" type="file" class="form-control" {{$image_required}}>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <img style="width:159px;" src="{{asset('storage/media/'.$image)}}" class="" alt="">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label for="category_id" class="control-label mb-1">Category</label>
                           <select id="category_id" name="category_id" value="{{$category_id}}" type="text" class="form-control" Required>
                              <option value="">select category</option>
                              @foreach($category as $list)
                              @if($category_id == $list->id)
                              <option selected value="{{$list->id}}">{{$list->category_name}}</option>
                              @else
                              <option value="{{$list->id}}">{{$list->category_name}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label for="brand_id" class="control-label mb-1">Brand</label>
                           <select id="brand_id" name="brand" type="text" class="form-control" Required>
                              <option value="">select Brand</option>
                              @foreach($brands as $list)
                              @if($brand == $list->id)
                              <option selected value="{{$list->id}}">{{$list->name}}</option>
                              @else
                              <option value="{{$list->id}}">{{$list->name}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label for="model" class="control-label mb-1">Model</label>
                           <input id="model" name="model" type="text" value="{{$model}}" class="form-control" Required>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="form-group">
                  <label for="model" class="control-label mb-1">Short Desc</label>
                  <textarea rows="" cols="" id="short_desc" name="short_desc" type="text" class="form-control" Required>{{$short_desc}}</textarea>
               </div>
               <div class="form-group">
                  <label for="model" class="control-label mb-1">Desc</label>
                  <textarea rows="" cols="" id="desc" name="desc" type="text" class="form-control" Required>{{$desc}}</textarea>
               </div>
               <div class="form-group">
                  <label for="keywords" class="control-label mb-1">Keywords</label>
                  <textarea rows="" cols="" id="keywords" name="keywords" type="text" class="form-control" Required>{{$keywords}}</textarea>
               </div>
               <div class="form-group">
                  <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                  <textarea rows="" cols="" id="technical_specification" name="technical_specification" type="text" class="form-control" Required>{{$technical_specification}}</textarea>
               </div>
               <div class="form-group">
                  <label for="uses" class="control-label mb-1">Uses</label>
                  <textarea rows="" cols="" id="uses" name="uses" type="text" class="form-control" Required>{{$uses}}</textarea>
               </div>
               <div class="form-group">
                  <label for="warranty" class="control-label mb-1">Warranty</label>
                  <textarea rows="" cols="" id="warranty" name="warranty" type="text" class="form-control" Required>{{$warranty}}</textarea>
               </div>
               <div class="form-group">
                  <div class="row">
               
                     <div class="col-sm-8">
                        <div class="form-group">
                           <label for="lead_time" class="control-label mb-1">Lead time</label>
                           <input id="lead_time" name="lead_time" type="text" value="{{$lead_time}}" class="form-control">
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label for="tax_id" class="control-label mb-1">Tax</label>
                           <select id="tax_id" name="tax_id"  class="form-control" Required>
                              <option value="">select tax</option>
                              @foreach($taxes as $list)
                              @if($tax_id == $list->id)
                              <option selected value="{{$list->id}}">{{$list->tax_desc}}</option>
                              @else
                              <option value="{{$list->id}}">{{$list->tax_desc}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                     
                  </div>
               </div>

               <div class="form-group">
                  <div class="row">
               
                     <div class="col-sm-3">
                        <div class="form-group">
                           <label for="is_promo" class="control-label mb-1">is promo</label>
                          <select id="is_promo" name="is_promo" type="text" class="form-control">
                          @if($is_promo == '1')
                          <option value="1" selected>YES</option>
                          <option value="0">NO</option>
                          @else
                          <option value="1">YES</option>
                          <option value="0" selected>NO</option>
                          @endif
                          </select>
                        </div>
                     </div>
                     <div class="col-sm-3">
                       <div class="form-group">
                           <label for="is_featured" class="control-label mb-1">is featured</label>
                          <select id="is_featured" name="is_featured" type="text" class="form-control">
                          @if($is_featured == '1')
                          <option value="1" selected>YES</option>
                          <option value="0">NO</option>
                          @else
                          <option value="1">YES</option>
                          <option value="0" selected>NO</option>
                          @endif
                          </select>
                        </div>
                     </div>
                     <div class="col-sm-3">
                       <div class="form-group">
                           <label for="is_discounted" class="control-label mb-1">is discounted</label>
                          <select id="is_discounted" name="is_discounted" type="text" class="form-control">
                          @if($is_discounted == '1')
                          <option value="1" selected>YES</option>
                          <option value="0">NO</option>
                          @else
                          <option value="1">YES</option>
                          <option value="0" selected>NO</option>
                          @endif
                          </select>
                        </div>
                     </div>
                     <div class="col-sm-3">
                       <div class="form-group">
                           <label for="is_tranding" class="control-label mb-1">is tranding</label>
                          <select id="is_tranding" name="is_tranding" type="text" class="form-control">
                          @if($is_tranding == '1')
                          <option value="1" selected>YES</option>
                          <option value="0">NO</option>
                          @else
                          <option value="1">YES</option>
                          <option value="0" selected>NO</option>
                          @endif
                          </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row m-t-30">
      <h2 class="mb-2" >Product Images</h2>
      <div class="col-md-12">
      
         <div class="card">
            <div class="card-body">
               <div class="form-group">
                <div class="row"  Id="product_images_box">
                    @php
                     $loop_count_num = 1;
                     @endphp
                     @foreach($productImageArr as $key => $val)
                     @php
                     $loop_count_prev = $loop_count_num;
                     $pIArr = (array)$val;
                     @endphp
                    <input id="piid" name="piid[]" value="{{$pIArr['id']}}" type="hidden"  class="form-control">
                     <div class="col-sm-4 product_images_{{$loop_count_num++}}">
                           <div class="form-group">
                              <label for="images" class="control-label mb-1">Images</label>
                              <input id="images" name="images[]" type="file" class="form-control">
                           </div>
                              @if($pIArr['images']!='')
                              <a href="{{asset('storage/media/'.$pIArr['images'])}}" target="_blank">
                              <img style="width:70px;" height= "40px" src="{{asset('storage/media/'.$pIArr['images'])}}">
                              </a>
                              @endif  
                     </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                           @if($loop_count_num == 2)
                           <label for="images" class="control-label mb-1">&nbsp;</label>
                           <button type="button" id="add_images" onclick="add_images_more()" class="btn btn-primary btn-lg btn-block">Add</button>
                           @else
                           <label for="button" class="control-label mb-1">&nbsp;</label>
                           <a href="{{url('admin/product/product_images_delete')}}/{{$pIArr['id']}}/{{$id}}">
                           <button type="button" id="add_images" class="btn btn-danger btn-lg btn-block">Remove</button></a>
                           @endif
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
         
         <h2 class="mb-2" >Product Attributes</h2>
         <div class="col-md-12" Id="product_attr_box">
         @php
         $loop_count_num = 1;
         @endphp
         @foreach($productAttrArr as $key => $val)
         @php
         $loop_count_prev = $loop_count_num;
         $pAArr = (array)$val;
         @endphp
         <input id="paid" name="paid[]" value="{{$pAArr['id']}}" type="hidden"  class="form-control">
         <div class="card" id="product_attr_{{$loop_count_num++}}">
            <div class="card-body">
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-2">
                        <div class="form-group">
                           <label for="sku" class="control-label mb-1">SKU</label>
                           <input id="sku" name="sku[]" value="{{$pAArr['sku']}}" type="text"  class="form-control" Required>
                        </div>
                     </div>
                     <div class="col-sm-2">
                        <div class="form-group">
                           <label for="mrp" class="control-label mb-1">MRP</label>
                           <input id="mrp" name="mrp[]" value="{{$pAArr['mrp']}}" type="text"  class="form-control" Required>
                        </div>
                     </div>
                     <div class="col-sm-2">
                        <div class="form-group">
                           <label for="price" class="control-label mb-1">PRICE</label>
                           <input id="price" name="price[]" value="{{$pAArr['price']}}" type="text"  class="form-control" Required>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                           <label for="size_id" class="control-label mb-1">SIZE</label>
                           <select id="size_id" name="size_id[]" class="form-control">
                              <option value="">select</option>
                              @foreach($sizes as $list)
                              @if($pAArr['size_id']==$list->id)
                              <option selected value="{{$list->id}}">{{$list->size}}</option>
                              @else
                              <option value="{{$list->id}}">{{$list->size}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                           <label for="color_id" class="control-label mb-1">COLOR</label>
                           <select id="color_id" name="color_id[]"  class="form-control">
                              <option value="">select</option>
                              @foreach($colors as $list)
                              @if($pAArr['color_id']==$list->id)
                              <option value="{{$list->id}}" selected>{{$list->color}}</option>
                              @else
                              <option value="{{$list->id}}">{{$list->color}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-2">
                        <div class="form-group">
                           <label for="qty" class="control-label mb-1">QTY</label>
                           <input id="qty" name="qty[]" value="{{$pAArr['qty']}}" type="text"  class="form-control" Required>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label for="image" class="control-label mb-1">Image</label>
                           <input id="attr_image" name="attr_image[]" type="file" class="form-control">
                        </div>
                        @if($pAArr['attr_image']!='')
                         <img style="width:70px;" height= "40px" src="{{asset('storage/media/'.$pAArr['attr_image'])}}">
                            @endif
                        
                     </div>
                  
                     <div class="col-sm-3">
                        <div class="form-group">
                           @if($loop_count_num == 2)
                           <label for="button" class="control-label mb-1">&nbsp;</label>
                           <button type="button" id="add_attr" onclick="add_more_itme()" class="btn btn-primary btn-lg btn-block">Add more</button>
                           @else
                           <label for="button" class="control-label mb-1">&nbsp;</label>
                           <a href="{{url('admin/product/product_attr_delete')}}/{{$pAArr['id']}}/{{$id}}">
                           <button type="button" id="add_attr" class="btn btn-danger btn-lg btn-block">Remove</button></a>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="form-group col-12">
         <button id="submit-button" type="submit" class="btn btn-lg btn-info btn-block">
         submit
         </button>
      </div>
      <input type="hidden" value={{$id}} name="id">
   </div>
</form>
<script>
   var loop_count = 1;
   function add_more_itme(){
      loop_count++;
      var html = '<input id="paid" name="paid[]" type="hidden"  class="form-control"><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="form-group"><div class="row">';
   
     html += ' <div class="col-sm-2"><div class="form-group"><label for="sku" class="control-label mb-1">SKU</label><input id="sku" name="sku[]" type="text"  class="form-control" Required></div></div>';
   
     html +=  '<div class="col-sm-2"><div class="form-group"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp[]" type="text"  class="form-control" Required></div></div>';  
   
     html += ' <div class="col-sm-2"><div class="form-group"><label for="price" class="control-label mb-1">PRICE</label><input id="price" name="price[]" type="text"  class="form-control" Required></div></div>';  
     
     var size_id_html = $("#size_id").html();
     size_id_html = size_id_html.replace("selected", "");
   
     html += ' <div class="col-sm-3"><div class="form-group"><label for="size_id" class="control-label mb-1">Size</label><select id="size_id" name="size_id[]" class="form-control">'+size_id_html+'</select></div></div>';     
     
     var color_id_html = $("#color_id").html();
     color_id_html = color_id_html.replace("selected", "");
   
     html += ' <div class="col-sm-3"><div class="form-group"><label for="color_id" class="control-label mb-1">Color</label><select id="color_id" name="color_id[]" class="form-control">'+color_id_html+'</select></div></div>';    
     
     html += ' <div class="col-sm-2"><div class="form-group"><label for="qty" class="control-label mb-1">QTY</label><input id="qty" name="qty[]" type="text"  class="form-control" Required></div></div>';
   
     html += '<div class="col-sm-4"><div class="form-group"><label for="attr_image" class="control-label mb-1">Image</label><input id="attr_image" name="attr_image[]" type="file"  class="form-control" Required></div></div>';
   
     html += '<div class="col-sm-3"><div class="form-group"><label for="button" class="control-label mb-1">&nbsp;</label><button type="button" id="add_attr" onclick="remove_more_itme('+loop_count+')" class="btn btn-danger btn-lg btn-block">Remove</button></div></div>';
      
   
     html += '</div></div></div></div>';
   
     $("#product_attr_box").append(html);
   }
   
   function remove_more_itme(loop_count){
      $("#product_attr_"+loop_count).remove();
   }

   var loop_image_count = 1;
   function add_images_more(){
      loop_image_count++;
   var   html = ' <input id="piid" name="piid[]" value="{{$pIArr['id']}}" type="hidden"  class="form-control"><div class="col-sm-4 product_images_'+loop_image_count+'" id=""><div class="form-group"><label for="images" class="control-label mb-1">Image</label><input id="images" name="images[]" type="file" class="form-control" Required></div></div>';
   
     html += '<div class="col-sm-3 product_images_'+loop_image_count+'"><div class="form-group"><label for="button" class="control-label mb-1">&nbsp;</label><button type="button" id="add_attr" onclick="remove_image('+loop_image_count+')" class="btn btn-danger btn-lg btn-block">Remove</button></div></div>';
  
     $("#product_images_box").append(html);
  
   }
   function remove_image(loop_image_count){
      $(".product_images_"+loop_image_count).remove();
   }
   

  CKEDITOR.replace('short_desc');
  CKEDITOR.replace('desc');
  CKEDITOR.replace('technical_specification');
 

 
   
</script>
@endsection