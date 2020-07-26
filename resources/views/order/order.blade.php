@extends('layout')      

@section('title') <title>Lista de Ordenes - Store</title> @endsection

@section('body')

    <div class="container">
        <div class="row">
            @foreach ($orders as $order)
                <div class="col-sm-12">
                    <a href= "{{route('user.orderdetail',$order->id)}}">{{$order->id}}</a>
                    @foreach ($orderDetail as $detail)
                        @if ($order->id === $detail->order_id)
                            <p> {{$detail->price}} </p>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
        {{ $orders->links() }}
    </div>
    
@endsection