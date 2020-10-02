@extends('layouts.master')
@section('title')
    {{$titlePage}}
@endsection
@section('main')
        <div class="card mt-3">
            <div class="card-header">
                <h3>{{$titlePage}}</h3>
            </div>
            <div class="card-body">
               <form action="{{route('category.update',["id"=>$category->id])}}" method="post" >
                @csrf
               @method('PUT')
                    <div class="form-group">
                        <label for="c_name">Category Name:</label>
                        <input type="text"
                        class="form-control" name="c_name" id="c_name" placeholder="Điện thoại" 
                            @if (old('c_name'))
                                value="{{old('c_name')}}"
                            @else
                                value="{{$category->name}}"
                            @endif
                        >
                        @error('c_name')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                        <input type="hidden" name="c_id" value="{{$category->id}}">
                     </div>
                    <button type="submit" class="btn btn-primary w-25">Save</button>
               </form>
            </div>
        </div>
@endsection