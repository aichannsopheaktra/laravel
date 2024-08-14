@extends('layouts.master')
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
            </div>
        </div>
@endsection
