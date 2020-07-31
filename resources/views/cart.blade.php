@extends('layout')

@section('title') <title>Carrito - Store</title> @endsection

@section('body')
    <div class="container">
        @if(!empty($cart))
            @foreach ($cart as $productCart)
            @php
                $quantity = DB::table('products')->where('id',$productCart->product_id)->value('quantity');
            @endphp
            

            <div class="container-fluid">
                <div class="row" id="{{$productCart->id}}">
                  <div class="col-sm-4">
                    <img src="{{$productCart->logo}}" width="300px" height="300px" alt="">
                  </div>
                  <div class="col-sm-8">
                    <p><strong>Producto: &nbsp;</strong> {{$productCart->name}}</p> <br>
                    <p class="condition"> <strong> Condicion: &nbsp;</strong>  {{$productCart->condition}} </p> <br>
                    <p> <strong>Precio RD: &nbsp;</strong>{{number_format($productCart->price,2)}}</p> <br>
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
                        <button id="{{$productCart->id}}" class="au-btn au-btn-icon au-btn--red">Eliminar del Carrito</button>
                        <div role="alert" id="result{{$productCart->id}}"></div>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
            <div class="row-reverse"> <br>
                <a href=" {{route('user.preorder')}} " id="order" class="au-btn au-btn-icon au-btn--blue">Ordenar</a>
            </div>
        @else
        <div id="message" style="display: none">
            <h3>Tu carrito esta vacio. <a href=" {{route('search')}} ">Busca</a> un producto y al agregarlo al carrito aparecera aqui</h3>
        </div>
        @endif
    </div>

@endsection

@section('footer')
    <script>
        $('.au-btn--red').click(function() {
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