@extends('layouts.master')
@section('title')
{{$titlePage}}
@endsection
@section('main')
<div class="mt-5 d-flex">
    <h2 class="">List Category</h2>
    <a href="{{route('category.create')}}" class=" ml-auto btn btn-danger"> Create Category</a>
</div>
<div class=" mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
            <tr>
                <th scope="row">{{$key +1}}</th>
                <td><a href="{{route('product.list',['id'=>$category->id])}}" class=" badge badge-primary mr-3"  ><i class="fas fa-eye"></i> </a><a href="" class="category" data-id="{{$category->id}}">{{$category->name}}</a> </td>
                <td>
                    <a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-dark ">Edit</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div id="list_product">

    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.category').on('click',function(e){
                e.preventDefault();
                category_id = $(this).attr('data-id');
                // alert(123);
                $.ajax({
                    type: 'GET',
                    url : "api/category/"+category_id+"/products",
                    success: function(result){
                        console.log(result);
                        html = '<table class="table ">'
                                        +'<thead>'
                                            +'<tr>'
                                                +'<th scope="col">#</th>'
                                                +'<th scope="col">Name</th>'
                                                +'<th scope="col">Category Name</th>'
                                                +'<th>Price</th>'
                                                +'<th scope="col">Quantity</th>'
                                                // +'<th>Action</th>'
                                            +'</tr>'
                                        +'</thead>'
                                        +'<tbody>';
                        $.each(result, function(key, item){
                                        html += 
                                            '<tr>'
                                                +'<th scope="row">'+ ++key +'</th>'
                                                +'<td>'+ item.name+'</td>'
                                                +'<td>'+ item.category.name+'</td>'
                                                +'<td>'+ item.price+'</td>'
                                                +'<td>'+ item.quantity+'</td>'
                                            +'</tr>'
                        });
                                html += '</tbody>'
                                +'</table>';

                        $("#list_product").html('');
                        $("#list_product").append(html);
                    },

                    error: function(data){
                        console.log(data);
                    }
                })
            })
        });
    </script>
@endsection
{{-- // '<td class="table-buttons row">'
                                                //     // // '<a href="{{route("product.edit",["id" => $product->id])}}" class="btn btn-dark mr-2">Edit</a>'
                                                //     // '<form action="{{route("product.destroy",["id" => $product->id])}}" method="post">'
                                                //     //     '@csrf'
                                                //     //     '@method("DELETE")'
                                                //     //     '<button type="submit" class="btn btn-danger">Delate</button>'
                                                //     // '</form>'
                                                // '<a href="{{route("product.detail",["id"=> $product->id])}}" class=" btn btn-primary">Mua</a>'
                                                // '</td>' --}}