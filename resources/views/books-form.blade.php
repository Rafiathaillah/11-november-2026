<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="book-form-page">
    <main>
        <div class="book-form-card">
            <h1>Book Details</h1>
            <form action="{{ route('store-book') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="writer">Writer</label>
                    <input type="text" id="writer" name="writer" required>
                </div>
                <div class="form-group">
                    <label for="published_year">Published Year</label>
                    <input type="number" id="published_year" name="published_year" min="0" max="9999" step="1">
                </div>
                <div class="form-group">
                    <label for="cover_path">Cover Image</label>
                    <input type="file" id="cover_path" name="cover_path" accept="image/*">
                </div>
                <button type="submit">Save Book</button>
            </form>
        </div>
    </main>
</body>
</html>