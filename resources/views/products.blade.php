@extends('layout')

@section('title')
    <title>{{$product->name}} - Store</title>
@endsection

@section('body')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <img src="{{$product->logo}}" width="300px" height="300px" alt="">
    </div>
    <div class="col-sm-8">
      <p><strong>Producto: &nbsp;</strong> {{$product->name}}</p> <br>
      <p><strong>Descripcion: &nbsp;</strong> {{$product->description}}</p> <br>
      <h2> <strong>Vendedor: &nbsp;</strong><a href="{{route('store',$store->id)}}">{{$store->name}}</a></h2> <br> <br>
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

@section('footer')
  <script>
      $("#quantity").blur(function(){
        if(parseInt($('#quantity').val()) > parseInt($('#available').val())){
          $('#errorQuantity').text('La cantidad a pedir no puede ser mayor a la existente');
          $('#add').prop('disabled', true);
        }else{
          $('#errorQuantity').text('');
          $('#add').prop('disabled', false);
        }
      });

      function add() {
        cantidad = $('#quantity').val();
        $.ajax({
            type: "get",
            url: "{{ route('user.addCart', $product->id) }}" + "/" + cantidad
        }).done(function(data){
            
            if(data == true){
                $("#result"+{{$product->id}}).html('Ya tiene este producto en su carrito de compra'); 
                $("#result"+{{$product->id}}).addClass("alert alert-danger");
            }else{
                $("#result"+{{$product->id}}).html('Producto agregado correctamente'); 
                $("#result"+{{$product->id}}).addClass("alert alert-success");
            }
        })
      }
  </script>
  @endsection
@endsection