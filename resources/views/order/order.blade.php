@extends('layout')      

@section('title') <title>Lista de Ordenes - Store</title> @endsection

@section('body')
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Orden No.</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="tr-shadow">
                        <td>{{$order->id}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->amount}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{route('user.orderdetail',$order->id)}}" class="au-btn au-btn-icon au-btn--blue">Ver Detalles</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection