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
               <form action="{{route('category.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="c_name">Category Name:</label>
                        <input type="text"
                            class="form-control" name="c_name" id="c_name" placeholder="Điện thoại">
                        @error('c_name')
                        <small class="text text-danger ml-2">{{ $message }}</small>
                        @enderror
                     </div>
                    <button type="submit" class="btn btn-primary w-25">Create</button>
               </form>
            </div>
        </div>

@endsection