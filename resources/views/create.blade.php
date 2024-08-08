<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Create Article</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/create-edit.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <h1 class="h3 mb-3 font-weight-normal">Create Article</h1>
        <form method="POST" action="{{ url('/') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" name="title" placeholder="Article Title" required>
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <input type="text" id="excerpt" class="form-control" name="excerpt" placeholder="Article Excerpt" required>
            </div>
            <div class="form-group">
                <label for="detail">Content</label>
                <textarea id="detail" class="form-control" name="detail" rows="5" placeholder="Article Content" required></textarea>
            </div>
            <div class="form-group">
                <label>Type</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="news" name="type" value="1" checked>
                    <label class="form-check-label" for="news">News</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="tour" name="type" value="0">
                    <label class="form-check-label" for="tour">Tour</label>
                </div>
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" id="img" class="form-control-file" name="img">
            </div>
            <button class="btn btn-primary" type="submit">Create Article</button>
        </form>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
