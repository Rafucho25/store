@extends('layout')

@section('body')
    <div class="container">
        @foreach ($wishList as $wish)
        <br> <br>
        <div class="row" id="{{$wish->id}}">
            <div class="col-ms-4 logo">
                <img src="{{$wish->logo}}" width="250" height="200" alt="{{$wish->name}}">
            </div>
            <div class="col-ms-8">
                <a href="product/{{$wish->product_id}}">{{$wish->name}}</a>
                <p class="condition">{{$wish->condition}}</p>
                <strong>Price: {{$wish->price}} </strong>
                <div class="row-reverse">
                    <div class="float-right"><i class="fas fa-times text-danger" id="{{$wish->id}}"></i></div>
                    <div role="alert" id="result{{$wish->id}}"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('footer')
        <script>
            $('.fa-times').click(function() {
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