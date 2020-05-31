@extends('layout')

@section('title') <title>Carrito - Store</title> @endsection

@section('body')
    <div class="container">

        @if ($cart != null)
            @foreach ($cart as $productCart)
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
                    <label for="">Cantidad</label>
                    <select name="quantity" id="quantity">
                        @for ($i = 1; $i <= $quantity; $i++)
                            @if ($i != $productCart->quantity)
                                <option value=" {{$i}} "> {{$i}} </option>
                            @else
                                <option value=" {{$i}} " selected> {{$i}} </option>
                            @endif
                        @endfor
                    </select>
                    <div class="row-reverse">
                        <div class="float-right"><i class="fas fa-times text-danger" id="{{$productCart->id}}"></i></div>
                        <div role="alert" id="result{{$productCart->id}}"></div>
                    </div>
                </div>
            </div>
            @endforeach
            <a href=" {{route('user.preorder')}} " class="btn btn-primary" id="order">Ordenar</a>
        @endif
        <div id="message" style="display: none">
            <h3>Tu carrito esta vacio. <a href=" {{route('search')}} ">Busca</a> un producto y al agregarlo al carrito aparecera aqui</h3>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('.fa-times').click(function() {
            id = event.target.id;
            $.ajax({
                type: "get",
                url: "{!! route('user.removeCart') !!}" + "/" + id
            }).done(function(data){
                $('#'+id).remove();
            })
            if($('.product').length === 0){
                $('#order').remove();
                $('#message').show();
            }
        });
    </script>
@endsection