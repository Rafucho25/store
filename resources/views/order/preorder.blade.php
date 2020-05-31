@extends('layout')

@section('title') <title>Preorden - Store</title> @endsection

@section('body')

    <h3>Datos personales</h3>
    <p> Nombres: {{Sentinel::getUser()->first_name}}</p>
    <p> Apellidos: {{Sentinel::getUser()->last_name}}</p>
    <p> Direccion: {{Sentinel::getUser()->address}}</p>
    
    @foreach ($products as $productCart)
        @php
            $quantity = DB::table('products')->where('id',$productCart->product_id)->value('quantity');
        @endphp
        <br> <br>
        <div class="row product" id="{{$productCart->id}}">
            <div class="col-ms-4 logo">
                <img src="{{$productCart->logo}}" width="250" height="200" alt="{{$productCart->name}}">
            </div>
            <div class="col-ms-6">
                <a href="productCart/{{$productCart->product_id}}">{{$productCart->name}}</a>
                <p class="condition">{{$productCart->condition}}</p>
                <strong>Price: {{$productCart->price}} </strong>
                    <p>Cantidad: {{$productCart->quantity}}</p>
            </div>
        </div>
    @endforeach

    <a href=" {{route('user.createOrder')}} " class="btn btn-primary">Finalizar</a>
@endsection