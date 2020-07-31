@extends('layout')

@section('title') <title>Preorden - Store</title> @endsection

@section('body')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <h3> Datos personales </h3> <br>
            <p> <strong> Nombres: &nbsp;</strong>{{Sentinel::getUser()->first_name}}</p>
            <p> <strong> Apellidos: &nbsp;</strong>{{Sentinel::getUser()->last_name}}</p>
            <p> <strong> Direccion: &nbsp;</strong>{{Sentinel::getUser()->address}}</p>
        </div>
    </div>
    <hr> <br>
    @foreach ($products as $productCart)
        @php
            $quantity = DB::table('products')->where('id',$productCart->product_id)->value('quantity');
        @endphp        
        <div class="row">
            <div class="col-sm-4">
            <img src="{{$productCart->logo}}" width="250px" height="250px" alt="">
            </div>
            <div class="col-sm-8">
            <p><strong>Producto: &nbsp;</strong>  <a href="product/{{$productCart->product_id}}">{{$productCart->name}} </a></p> <br>
            <p class="condition"> <strong> Condicion: &nbsp;</strong>  {{$productCart->condition}} </p> <br>
            <p> <strong>Precio RD: &nbsp;</strong>{{number_format($productCart->price,2)}}</p> <br>
            <p> <strong>Cantidad: &nbsp;</strong>{{$productCart->quantity}}</p> <br>
            </div>
        </div> <hr>
    @endforeach
    <div class="row-reverse"> <br>
        <a href=" {{route('user.createOrder')}} " class="au-btn au-btn-icon au-btn--blue">Finalizar</a>
    </div>
</div>
@endsection