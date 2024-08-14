@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="h3 mb-3 font-weight-normal">Edit Article</h1>
        <form method="POST" action="{{ url('/' . $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control" name="title"
                            value="{{ $article->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <input type="text" id="excerpt" class="form-control" name="excerpt"
                            value="{{ $article->excerpt }}" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" name="detail" rows="5" required>{{ $article->detail }}</textarea>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Type</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="news" name="type" value="1"
                                {{ $article->type ? 'checked' : '' }}>
                            <label class="form-check-label" for="news">News</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="tour" name="type" value="0"
                                {{ !$article->type ? 'checked' : '' }}>
                            <label class="form-check-label" for="tour">Tour</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img" name="img">
                                <label class="custom-file-label" for="img" aria-describedby="img">Choose file</label>
                            </div>
                        </div>
                        {{-- <input type="file" id="img" class="form-control-file" name="img"> --}}
                        <img class="card-img-top mt-2" id="imgbox" src="{{ asset('storage/images/' . $article->img) }}"
                            alt="Current Image" style="max-width: 300px;">
                    </div>
                </div>
                <div class="col-md-10">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">Update Article</button>
                </div>
            </div>
        </form>
    </div>
@endsection
