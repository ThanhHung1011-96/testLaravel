<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <base href="{{asset('')}}">

    <link rel="stylesheet" href="css/app.css">
    <link href="{{asset('bootstrap-fileinput/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{asset('bootstrap-fileinput/themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class=" container">
        
        <div class="dashboard mt-5 mb-3 d-flex">
            <a href="{{route('category.list')}}" class="btn btn-primary mr-2">List Category</a>
            <a href="{{route('product.list')}}" class="btn btn-primary">List Product</a>
           
            
            <a href="{{route('cart.show')}}" class="btn btn-light ml-auto" ><i class="fas fa-shopping-cart" style="font-size: 200%"><sup class="text text-danger quantity_items"></sup></i></a>
        </div>
    @yield('main')
    </div>
    
</body>
    <script src="js/app.js"></script>
    
    <script src="https://kit.fontawesome.com/8a60c16813.js" crossorigin="anonymous"></script>
    
    <script src="{{asset('bootstrap-fileinput/js/plugins/piexif.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/js/plugins/sortable.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/js/locales/fr.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/themes/fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('bootstrap-fileinput/themes/explorer-fas/theme.js')}}" type="text/javascript"></script>
    
    <script>
        $(document).ready(function(){
            cart = JSON.parse(localStorage.getItem('cart'));
            var quantity_items = countItems(cart);
            $(".quantity_items").html('');
            $(".quantity_items").prepend(quantity_items);
            console.log(typeof(quantity_items)  +" sl "+quantity_items);
        })
        function countItems(cart){
            total = 0;
            console.log(cart);
            $.each(cart, function(key, item){
                total += parseInt(item.quantity);
            })
            if(total !=0){
                return  parseInt(total);
            }else return  '';
        }
    </script>
    @yield('js')
</html>