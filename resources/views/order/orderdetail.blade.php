@extends('layout')

@section('title') <title>Detalle de la orden - Store</title> @endsection

@section('body')

<div class="container-fluid">
    <center><h3>Detalles de la orden No. : {{$order->id}} </h3></center>  <hr>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <h3> Datos personales </h3> <br>
            <p> <strong> Nombres: &nbsp;</strong>{{Sentinel::getUser()->first_name}}</p>
            <p> <strong> Apellidos: &nbsp;</strong>{{Sentinel::getUser()->last_name}}</p>
            <p> <strong> Direccion: &nbsp;</strong>{{Sentinel::getUser()->address}}</p>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <h3> Datos de la Orden </h3> <br>
            <p> <strong> Fecha: &nbsp;</strong>{{$order->created_at}}</p>
            <p> <strong> Envio: &nbsp;</strong>{{$order->shipping}}</p>
            <p> <strong> Total: &nbsp;</strong>{{$order->amount}}</p>
        </div>
    </div>
    <hr> <br>
    @foreach ($orderDetail as $detail)
        @php
            $quantity = DB::table('products')->where('id',$detail->product_id)->value('quantity');
        @endphp        
        <div class="row">
            <div class="col-sm-4">
            <img src="{{$detail->logo}}" width="250px" height="250px" alt="">
            </div>
            <div class="col-sm-8">
            <p><strong>Producto: &nbsp;</strong>  <a href="product/{{$detail->product_id}}">{{$detail->name}} </a></p> <br>
            <p class="condition"> <strong> Condicion: &nbsp;</strong>  {{$detail->condition}} </p> <br>
            <p> <strong>Precio RD: &nbsp;</strong>{{number_format($detail->price,2)}}</p> <br>
            <p> <strong>Cantidad: &nbsp;</strong>{{$detail->quantity}}</p> <br>
            </div>
        </div> <hr>
    @endforeach
</div>
@endsection