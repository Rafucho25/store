@extends('layout')

@section('title') <title>Carrito - Store</title> @endsection

@section('body')
    <div class="container">
        @if(!empty($cart))
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
        @else
        <div id="message" style="display: none">
            <h3>Tu carrito esta vacio. <a href=" {{route('search')}} ">Busca</a> un producto y al agregarlo al carrito aparecera aqui</h3>
        </div>
        @endif
    </div>

    @foreach ($cart as $product)
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4">
            <img src="{{$product->logo}}" width="300px" height="300px" alt="">
          </div>
          <div class="col-sm-8">
            <p><strong>Producto: &nbsp;</strong> {{$product->name}}</p> <br>
            <p><strong>Descripcion: &nbsp;</strong> {{$product->description}}</p> <br>
            <p> <strong>Precio RD: &nbsp;</strong>{{number_format($product->price,2)}}</p> <br>
            <p><strong>Cantidad disponible:</strong> &nbsp; {{$product->quantity}}</p> <br>
            <input type="hidden" id="available" value="{{$product->quantity}}">
            <label for=""><strong>Cantidad a comprar:</strong> &nbsp;</label>
            <input type="text" name="quantity" id="quantity">
            <span id="errorQuantity"></span>
            <button class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>Agregar al carrito</button>
            <input type="button" onclick="add()" id="add" value="Agregar al carrito">
            <div role="alert" id="result{{$product->id}}"></div>
          </div>
        </div>
      </div>
    @endforeach

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