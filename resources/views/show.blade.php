@extends('layouts.master')
@section('title')
Tour Article
@endsection
@section('content')
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">{{ $article->title }} <span class="text-muted">{{ $article->excerpt }}</span></h2>
                        <p class="lead">{{ $article->detail }}</p>
                    </div>
                    <div class="col-md-5">
                        @if ($article->img)
                            <img src="{{ asset('storage/images/' . $article->img) }}" class="featurette-image img-fluid mx-auto" alt="Article Image">
                        @endif
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a>
                </div>
                {{-- <div class="container mt-5">
                    <h1>{{ $article->title }}</h1>
                    <p><strong>Excerpt:</strong> {{ $article->excerpt }}</p>
                    <p><strong>Content:</strong> {{ $article->detail }}</p>
                    @if ($article->img)
                        <img src="{{ asset('storage/images/' . $article->img) }}" class="img-fluid" alt="Article Image">
                    @endif
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a>
                </div> --}}
            </div>
        </div>
@endsection
