@extends('layouts.master')
@section('title')
{{$titlePage}}
@endsection
@section('main')
<div class="mt-5 d-flex">
    <h2 class="">{!!$titlePage!!}</h2>
    <a href="{{route('product.create')}}" class=" ml-auto btn btn-danger"> Create Product</a>
</div>
<div class=" mt-5">
    @if ($products->count() == 0)
    <h4> <b>No Data.</b> </h4>
    @else
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th>Category Name</th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            @if (empty($product))
            <td rowspan="4"> No Data.</td>
            @else
            <tr>
                <th scope="row">{{$key +1}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td><a href="{{route('product.detail',['id'=> $product->id])}}"><img class="img-thumbnail " src="{{$product->images[0]->path}}" style="width:80px"></a></td>

                <td>{{$product->quantity}}</td>
                <td class="table-buttons row">
                    <a href="{{route('product.edit',['id' => $product->id])}}" class="btn btn-dark mr-2">Edit</a>
                    <form action="{{route('product.destroy',['id' => $product->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mr-2">Delate</button>
                    </form>
                <a href="{{route('product.detail',['id'=> $product->id])}}" class=" btn btn-primary">Mua</a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

    @endif
</div>

@endsection