@extends('layout')

@section('title')
    <title>Busqueda - Store</title>
@endsection


@section('body')
<div class="container">
    <div class="row">
        @foreach ($list as $product)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{$product->logo}}" width="250" height="200" alt="{{$product->name}}">
                <div class="card-body">
                    <a href="product/{{$product->id}}"><h4 class="card-title mb-3">{{$product->name}}</h4></a>
                    <p class="condition">Condicion: {{$product->condition}}</p>
                    <strong>Precio: {{$product->price}} </strong>
                    <p class="card-text"> {{Str::substr($product->description, 0, 80)}}</p>
                    <div class="row-reverse">
                        <div class="col-ms-10">
                            <div class="float-right"><i class="far fa-heart text-danger" id="{{$product->id}}"></i></div>
                            <div role="alert" id="result{{$product->id}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        {{ $list->appends(array('category' => $category, 'text' => $text))->render() }}
    </div>
</div>

    @section('footer')
        <script>
            $('.fa-heart').click(function() {
                idProduct = event.target.id;
                $.ajax({
                    type: "get",
                    url: "{!! route('user.addWishList') !!}" + "/" + idProduct
                }).done(function(data){
                    
                    if(data == true){
                        $("#result"+idProduct).html('Ya tiene este producto en su lista de deseos'); 
                        $("#result"+idProduct).addClass("alert alert-danger");
                    }else{
                        $("#result"+idProduct).html('Articulo agregado correctamente'); 
                        $("#result"+idProduct).addClass("alert alert-success");
                    }
                })
            });
        </script>
    @endsection
@endsection