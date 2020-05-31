@extends('layout')

@section('title')
    <title>{{$product->name}} - Store</title>
@endsection

@section('body')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <div id="images" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach ($images as $image)
          <div class="carousel-item active">
            <img src=" {{$image->path}} " class="d-block w-100" alt="...">
          </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#images" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#images" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="col-sm-8">
      <p>{{$product->name}}</p>
      <p>{{$product->description}}</p>
      <h2><a href="{{route('store',$store->id)}}">{{$store->name}}</a></h2>
      <p>{{$product->price}}</p>
      <p>Cantidad disponible: {{$product->quantity}}</p>
      <input type="hidden" id="available" value="{{$product->quantity}}">
      <label for="">Cantidad a comprar:</label>
      <input type="text" name="quantity" id="quantity">
      <span id="errorQuantity"></span>
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