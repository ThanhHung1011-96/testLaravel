@extends('layouts.master')
@section('title')
    Cart
@endsection
@section('main')
    <h2>Cart</h2>


    <div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <thead class="">
                    <tr>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th style="width: 5%"> </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class=" bg-black">
                        <td ></td>
                        <td></td>
                        <td class="text-center"><h5><strong>Tổng </strong></h5></td>
                        <td class="text-center"><h5><strong id="total"></strong></h5></td>
                        <td></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            showCart();
            if(checkInp()){
                $(document).on('click','.add',function(){

                    $(this).parent().prev().val(+$(this).parent().prev().val() + 1);

                    quantity = $(this).parent().prev().val();

                    product_id = $(this).parent().prev().attr('data-id');

                    cart = JSON.parse(localStorage.getItem('cart'));

                    cartNew = updateProductQuantity(cart,product_id,quantity);

                    localStorage.setItem('cart', JSON.stringify(cartNew));
                    showCart();
                });
            
                $(document).on('click','.minus',function(){
                        if ($(this).parent().next().val() > 1) 
                        {
                            $(this).parent().next().val(+$(this).parent().next().val() - 1);

                            quantity = $(this).parent().next().val();

                            product_id = $(this).parent().next().attr('data-id');

                            cart = JSON.parse(localStorage.getItem('cart'));

                            cartNew = updateProductQuantity(cart,product_id,quantity);

                            localStorage.setItem('cart', JSON.stringify(cartNew));
                            showCart();
                        }
                });
            }
            $(document).on('change','.quantity',function(e){
                
                quantity = $(this).val();
                
                if(!checkInp()){
                    e.preventDefault();
                }

                product_id = $(this).attr('data-id');

                cart = JSON.parse(localStorage.getItem('cart'));

                cartNew = updateProductQuantity(cart,product_id,parseInt(quantity) );
                localStorage.setItem('cart', JSON.stringify(cartNew));
                showCart();
            });
            $(document).on('click','.delete_item',function(){
                var product_id = $(this).attr('data-id');
                
                var cart = JSON.parse(localStorage.getItem('cart'));
                cartNew = deleteItem(cart, product_id);
                localStorage.setItem('cart', JSON.stringify(cartNew));
                showCart();
            })
        });
        function showCart(){
            dataCart = JSON.parse(localStorage.getItem('cart'));

            htmlCart = '';
            
            if(dataCart.length != 0){
                total_amount = 0;
                $.each(dataCart,function(key,item){
                    total_amount += item.price*item.quantity ;
                    htmlCart +=
                    '<tr class="items_cart">'
                        +'<td class="" style="width:40%">'
                            +'<div class="media ">'
                                +'<a class="thumbnail pull-left" href="#"> <img class="media-object" src="'+item.image +'" style="width: 72px; height: 72px;"> </a>'
                                +'<div class="media-body ml-4">'
                                   +'<p class=""><a href="#">'+item.name +'</a></p>'
                                +'</div>'
                            +'</div>'
                        +'</td>'
                        +'<td class="" style="text-align: center; width: 15%">'
                            +'<div class="input-group mb-3">'
                                +'<div class="input-group-prepend">'
                                    +'<button type="button" class="input-group-text minus"><i class="fas fa-minus"></i></button>'
                                +'</div>'
                                +'<input  style="width:30px"  class="form-control text-center quantity" data-id ="'+item.id +'"  id="" value="'+item.quantity+'">'
                                +'<div class="input-group-append">'
                                    +'<button type="button" class="input-group-text add"><i class="fas fa-plus"></i></button>'
                                +'</div>'
                            +'</div>'
                        +'</td>'
                        + '<td class=" text-center"><strong>'+formatCurrency(item.price)+'</strong></td>'
                        +'<td class=" text-center"><strong>'+formatCurrency((item.price*item.quantity).toString())+'</strong></td>'
                        +'<td class="text-center" style="width: 5%">'
                            +'<button type="button" class="btn btn-light delete_item" data-id ="'+item.id +'">'
                                +'<i class="fas fa-trash-alt" style="font-size: 150%; "></i>'
                            +'</button>'
                        +'</td>'
                    +'</tr>';
                })
            }else{
                htmlCart = '<td colspan="5"><h4>No Data</h4>'
                                +'<a href ="{{route("product.list")}}"  class="btn btn-primary">'
                                    +'Back to Home'
                                +'</a>';
                            +'</td>'
                total_amount = 0;
            } 

            var quantity_items = countItems(dataCart);
            $(".quantity_items").html('');
            $(".quantity_items").prepend(quantity_items);

            $("#total").html('');
            $("#total").prepend(formatCurrency(total_amount.toString()));

            $('.items_cart').html('');
            $('tbody').prepend(htmlCart);
        }
    //kiểm tra spham đã được add vào giỏ hàng chưa
	function checkProductExist(cart,product_id){
		console.log('cart length '+cart.length);
		for (var i = 0; i < cart.length; i++) {
			console.log('id prd '+cart[i]['id']);
			if (cart[i]['id'] == product_id){
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
        // alert( typeof(number));
	    var n   = number.split('').reverse().join("");
        var n2  = n.replace(/\d\d\d(?!$)/g, "$&.");    
        var n3  = n2.split('').reverse().join('');
        return  n3+"<sup>đ</sup>";
        // alert(typeof(n2.split('').reverse().join('')));
    }
    function updateProductQuantity(cart,product_id,quantity){
        var index = checkProductExist(cart,product_id);
        cart[index]['quantity'] = quantity;
        return cart;
    }
    function deleteItem(cart, product_id){
        var index = checkProductExist(cart,product_id);
        cart.splice(index,1)
        return cart;
    }
    function checkInp()
    {
    var x = $('.quantity').val();
        if (isNaN(x)) 
        {
            alert("Must input numbers");
            return false;
        }
    return true;
    }
    </script>
@endsection