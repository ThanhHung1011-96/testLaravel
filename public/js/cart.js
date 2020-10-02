$(document).ready(function(){
	//lấy cart or khởi tạo cart
	if(JSON.parse(localStorage.getItem('cart'))) {
    	cart= JSON.parse(localStorage.getItem('cart'));
    } else {
        var cart=[];
    };
    //add sự kiện add cart
	$('a').click(function(e){
			e.preventDefault();
			var product = {key:value, key1:value};
			var product = {id: $(this).attr('data-id'),
						   name: $(this).attr('data-name'), 
						   price: $(this).attr('data-price'),
						   image:$(this).attr('data-image'), 
						   quantity: 1};

			if(cart.length){ // giỏ hàng có spham
				console.log('add cart exist');
				//add sp vào giỏ hàng
				cart = addToCart(cart,product);
			} else { // giỏ hàng chưa có spham
				console.log('cart empty');
				cart.push(product) ; // add spham vào giỏ hàng
				//lưu giỏ hàng vào localstorage
				localStorage.setItem('cart', JSON.stringify(cart));
			}
		});
	});
	// add spham vào giỏ hàng
	function addToCart(cart,product){
		var index = checkProductExist(cart,product);
		console.log('found'+index);
		if (index === false){
			cart.push(product);
		} else {
			cart[index]['quantity'] +=1;
		}
		// if(index !== false){
		// 	cart.splice(index,1);
		// }
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