@extends('layout')

@section('title') <title> {{$store->name}} - Store</title> @endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <img src="{{$store->logo}}" width="250px" height="250px" alt=""><br>
            </div>
            <div class="col-sm-8">
                <center><h3>Tienda : {{$store->name}} </h3></center>  <hr>
                <center><h3> {{$store->description}} </h3> <br></center>
            </div>
        </div>
        <hr> <br>
        <center><h3>Lista de Productos: </h3></center>  <hr>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{$product->logo}}" width="250" height="200" alt="{{$product->name}}">
                    <div class="card-body">
                        <a href="product/{{$product->id}}"><h4 class="card-title mb-3">{{$product->name}}</h4></a>
                        <p class="condition">Condicion: {{$product->condition}}</p>
                        <strong>Precio: {{$product->price}} </strong>
                        <p class="card-text"> {{Str::substr($product->description, 0, 80)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{ $products->links() }}
        </div>
        <hr> <br>
    </div>
@endsection