@extends('layouts.master')
@section('title')
    {{$titlePage}}
@endsection
@section('main')
        <div class="card mt-3 ">
            <div class="card-header">
                <h3> {{$titlePage}}</h3>
            </div>
            <div class="card-body">
               <form action="{{route('product.update',["id"=>$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                    @method("put")
                    <input type="hidden" name="p_id" value="{{$product->id}}">
                    <div class="form-group">
                        <label for="p_name">Product Name:</label>
                        <input type="text"
                            class="form-control" name="p_name" id="p_name" placeholder="I Phone x" @if (old('p_name'))
                                value="{{old('p_name')}}"
                            @else
                                value="{{$product->name}}"
                            @endif>
                        @error('p_name')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group w-25">
                        <label for="p_price">Product Price:</label>
                        <input type="text"
                            class="form-control" name="p_price" id="p_price" placeholder="" @if (old('p_price'))
                                value="{{old('p_price')}}"
                            @else
                                value="{{$product->price}}"
                            @endif>
                        @error('p_price')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group">
                       <label for="category_id">Category:</label>
                       <select class="form-control" name="category_id" id="category_id">
                           <option></option>
                         @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{($category->id == $product->category_id)?"selected" : ""}} >{{$category->name}}</option>
                         @endforeach
                       </select>
                       @error('category_id')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group">
                       <label for="p_quantity">Quantity:</label>
                       <input type="text"
                         class="form-control w-25" name="p_quantity" id="p_quantity"  placeholder="30" value="{{$product->quantity}}">
                         @error('p_quantity')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group">
                        <div class="images-existed mt-2">
                            <div class=" d-flex">
                                <h4>The Images exist:</h4>
                            </div>
                            <div class="card container">
                                <div class="row">
                                @if ($product->images)
                                    @foreach ($product->images as $image)
                                        <div class="card m-2" style="width: 12rem;">
                                            <div class="card-body">
                                                <img class="card-img-top" src="{{$image->path}}" alt="Card image cap"style="width:;">
                                            </div>
                                            <div class="card-footer d-flex">
                                                <button class="btn btn-secondary ml-auto delete_img" data-image-id="{{$image->id}}" id="delete_img" type="button"><i class=" fas fa-trash-alt"></i></button>
                                            </div>
                                            <input type="hidden" value="{{$image->id}}" name="images_no_delete[]">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            </div>
                            <h4 class="mt-2"> Show/Hide form add images: <button  type="button"  class="btn btn-primary" id="add_images"> <i class="fas fa-plus-circle"></i></button></h4>
                            <div class="form_add_images ">
                                <input type="file" class="form-control " name="p_images_new[]" multiple class="file" id="p_images_new">
                            </div>
                        </div>
                     </div>
                    <button type="submit" class="btn btn-primary w-25">Edit</button>
               </form>
            </div>
        </div>

@endsection
@section('js')
  <script>
    $(document).ready(function(){
        $("#p_images_new").fileinput({
                'showUpload'  :false,
                theme        :"fas",
                // 'removeTitle' :'Xoa tat'
            }
        );
        $(".delete_img").click(function(){
            // d = $(this).attr('data-image-id');
            $(this).parent().parent().remove();
        });
        $("#add_images").click(function(){
            $(".form_add_images").toggle(500);
        })
    })
  </script>
@endsection