@extends('layouts.master')
@section('title')
Tour Article
@endsection
@section('content')
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach ($tourArticles as $article)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top"
                                    src="{{ asset('storage/images/' . $article->img) }}"
                                    alt="Article Image">
                                <div class="card-body">
                                    <h2>{{ $article->title }}</h2>
                                    <p class="card-text"> {{ $article->excerpt }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('tour.show', ['id' => $article->id]) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                            @if (Auth::user() && Auth::user()->is_admin !== false)
                                            <a href="{{ route('edit', ['id' => $article->id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            @endif
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
