@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <div class="row">
@foreach ($medicine as $medic)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJWVrFrIZZiohjoFdy70ToXGIhtuAuFgRn5A&usqp=CAU" alt="">
                    <div class="caption">
                        <h4>{{ $medic->generic_name }}</h4>
                        <p>{{ Str::limit(strtolower($medic->description),50) }}</p>
                        <p><strong>Price: </strong> {{ $medic->price }}</p>
                        <p class="btn-holder"><a href="{{ url('add-to-cart/'.$medic->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/500x300" alt="">
                    <div class="caption">
                        <h4>Product name</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>
                        <p><strong>Price: </strong> 567.7$</p>
                        <p class="btn-holder"><a href="#" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>

            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/500x300" alt="">
                    <div class="caption">
                        <h4>Product name</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>
                        <p><strong>Price: </strong> 567.7$</p>
                        <p class="btn-holder"><a href="#" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>

            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/500x300" alt="">
                    <div class="caption">
                        <h4>Product name</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>
                        <p><strong>Price: </strong> 567.7$</p>
                        <p class="btn-holder"><a href="#" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div> --}}

        </div><!-- End row -->

    </div>

@endsection