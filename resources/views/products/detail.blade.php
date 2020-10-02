@extends('layouts.master')

@section('title')
    {{$titlePage}}
@endsection
@section('main')
        
        <div class="card mt-3 w-50">
            <div class="card-header">
                <h3> {{$titlePage}}</h3>
            </div>
            <div class="card-body">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <p>{{$product->name}}</p>
                    </div>
                    <img class="card-img-top img-thumbnail mt-2 mb-3" src="{{$product->images[0]->path}}" alt="" style="width:200px">
                    <div class="card-body">
                        <p>Giá: {{ number_format($product->price,0,",",".")}}<sup>đ</sup></p>
                        <a href="#" id="btn-buy" class="btn btn-primary" data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-image="{{$product->images[0]->path}}">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
	//lấy cart or khởi tạo cart
	if(JSON.parse(localStorage.getItem('cart'))) {
    	cart= JSON.parse(localStorage.getItem('cart'));
    } else {
        var cart=[];
    };
    //add sự kiện add cart
	$('#btn-buy').click(function(e){
            e.preventDefault();
			var product = {id: $(this).attr('data-id'),
						   name: $(this).attr('data-name'), 
						   price: $(this).attr('data-price'),
						   image:$(this).attr('data-image'), 
						   quantity: 1};

			if(cart.length){ // giỏ hàng có spham
				console.log('add cart exist');
				//add sp vào giỏ hàng
				cart = addToCart(cart,product);
				localStorage.setItem('cart', JSON.stringify(cart));
			} else { // giỏ hàng chưa có spham
				console.log('cart empty');
				cart.push(product) ; // add spham vào giỏ hàng
				//lưu giỏ hàng vào localstorage
				localStorage.setItem('cart', JSON.stringify(cart));
			}
			window.location="http://127.0.0.1:8000/cart";
		});
		
	// window.location="http://127.0.0.1:8000/cart";
	});
	// add spham vào giỏ hàng
	function addToCart(cart,product){
		var index = checkProductExist(cart,product);
		console.log('found '+index);
		if (index === false){
			cart.push(product);
		} else {
			cart[index]['quantity']++;
		}
		return cart;
	}

	//kiểm tra spham đã được add vào giỏ hàng chưa
	function checkProductExist(cart,product){
		console.log('cart length'+cart.length);
		for (var i = 0; i < cart.length; i++) {
			console.log('id prd'+cart[i]['id']);
			if (cart[i]['id'] == product.id){
				console.log('vtri');
				return i;
			} else {
				continue;
			}
		};
		return false;
	}

	/*Format currency*/
	function formatCurrency(number){
	    var n = number.split('').reverse().join("");
	    var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
	    return  n2.split('').reverse().join('');
	}
    </script>
@endsection
