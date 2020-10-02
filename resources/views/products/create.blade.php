@extends('layouts.master')

@section('title')
    {{$titlePage}}
@endsection
@section('main')
        <div class="card mt-3 w-100">
            <div class="card-header">
                <h3> {{$titlePage}}</h3>
            </div>
            <div class="card-body">
               <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="p_name">Product Name:</label>
                        <input type="text"
                            class="form-control @error('p_name') is-invalid @enderror" name="p_name" id="p_name" placeholder="I Phone x"  value="{{old('p_name')}}">
                        @error('p_name')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group w-25">
                        <label for="p_price">Product Price:</label>
                        <input type="number"
                            class="form-control @error('p_price') is-invalid @enderror" name="p_price" id="p_price" placeholder="1000000"  value="{{old('p_price')}}">
                        @error('p_price')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group">
                       <label for="category_id">Category:</label>
                       <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" >
                           <option></option>
                         @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{(old('category_id')==$category->id)? "selected" : ""}}>{{$category->name}}</option>
                         @endforeach
                       </select>
                       @error('category_id')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group">
                       <label for="p_quantity">Quantity:</label>
                       <input type="text"
                         class="form-control w-25 @error('p_quantity') is-invalid @enderror" name="p_quantity" id="p_quantity"  value="{{old('p_quantity')}}" placeholder="30">
                         @error('p_quantity')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group w-100">
                       <label for="p_image">Image:</label>
                       <div class="form-group">
                          <div class="file-loading">
                              <input id="p_image" type="file" multiple  class="file " name="p_image[]">
                          </div>
                           @error('p_image')
                                <small class="text text-danger ml-2">{{ $message }}</small>
                              @enderror
                      </div>
                     </div>
                    
                    <button type="submit" class="btn btn-primary w-25">Create</button>
               </form>
            </div>
        </div>

@endsection
@section('js')
  <script>
    $("#p_image").fileinput(
        {
            'showUpload'  :false,
             theme        :"fas",
            'removeTitle' :'Xoa tat'
        }
      );
  </script>
@endsection