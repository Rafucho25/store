@extends('layout')

@section('tittle')
    <title>Busqueda</title>
@endsection

@section('header')
    <link rel="stylesheet" href="css/search.css">
@endsection

@section('body')
<div class="container">
    @foreach ($list as $product)
    <br> <br>
    <div class="row">
        <div class="col-ms-4 logo">
            <img src="{{$product->logo}}" width="250" height="200" alt="{{$product->name}}">
        </div>
        <div class="col-ms-8">
            <a href="product/{{$product->id}}">{{$product->name}}</a>
            <p class="condition">{{$product->condition}}</p>
            <strong>Price: {{$product->price}} </strong>
            <div class="row-reverse">
                <div class="col-ms-10">
                    <div class="float-right"><i class="far fa-heart text-danger" id="{{$product->id}}"></i></div>
                    <div role="alert" id="result{{$product->id}}"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
                    url: "{!! route('addwishlist') !!}" + "/" + idProduct
                }).done(function(){
                    
                    $("#result"+idProduct).html('Articulo agregado correctamente'); 
                    $("#result"+idProduct).addClass("alert alert-success");
                
                })
            });
        </script>
    @endsection
@endsection