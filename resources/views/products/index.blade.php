@extends('layouts.app')
@section('content')
        <div class="row">
            @foreach ($products as $product)
                <div  class="card m-3" style="width: 18rem">
                    <img src="{{ $product->image_url }}"  class="card-img-top"  alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                         <p>{{ \Str::limit($product->description, 100, '...') }}</p>
                        <p class="card-text"><strong>R$:</strong> {{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }


        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px); /* Adiciona efeito de elevação */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 200px; /* Ajuste de altura para as imagens */
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .card h5 {
            font-size: 1.25em;
            color: #333;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1em;
            color: #666;
            margin-bottom: 10px;
        }

        .card-text strong {
            font-weight: bold;
        }

        .card-price {
            font-size: 1.2em;
            color: #007bff;
            font-weight: bold;
        }

        /* Responsividade */
        @media (max-width: 767px) {
            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 20px;
            }
        }

        @media (min-width: 768px) {
            .col-md-4 {
                flex: 0 0 33.3333%;
                max-width: 33.3333%;
            }
        }
    </style>
@endsection
