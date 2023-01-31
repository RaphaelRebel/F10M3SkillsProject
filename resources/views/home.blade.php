@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <article class="admin__producten">
                        @foreach ($products as $product)
                        <img class="single__product-img" src="{{asset('storage/'. $product->afbeelding)}}" alt="">
                           <a href="product/{{$product->id}}"> <p class="admin__producten-titel">{{$product->title}}</p></a>
                        @endforeach
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
