@extends('layout')

@section('title') <title>Lista de Deseos - Store</title> @endsection

@section('body')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Lista de Deseos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($wishList as $wish)
                    <div id="{{$wish->id}}">
                        <div class="col-md-4">  <br> <br>
                            <img src="{{$wish->logo}}" width="200px" height="200px" alt="">
                        </div>
                        <div class="col-md-8">
                            <p><strong>Producto: &nbsp;</strong> {{$wish->name}}</p> <br>
                            <p><strong>Descripcion: &nbsp;</strong> {{$wish->description}}</p> <br>
                            <p> <strong>Precio RD: &nbsp;</strong>{{number_format($wish->price,2)}}</p> <br>
                            <div class="row-reverse">
                                <button id="{{$wish->id}}" class="au-btn au-btn-icon au-btn--red">Eliminar de la Lista</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('footer')
        <script>
            $('.au-btn--red').click(function() {
                id = event.target.id;
                $.ajax({
                    type: "get",
                    url: "{!! route('user.removeWishList') !!}" + "/" + id
                }).done(function(data){
                    $('#'+id).remove();
                })
            });
        </script>
    @endsection