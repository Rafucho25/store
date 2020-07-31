@extends('layout')  

@section('title') <title>Detalle de la orden</title> @endsection

@section('body')
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p> Orden no. {{$orders->id}}</p>
                @foreach ($orderDetail as $detail)
                    <p> {{$detail->price}} </p>
                @endforeach
            </div>
        </div>
    </div>

@endsection