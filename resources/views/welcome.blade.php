<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Model Data Overview</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="welcome-page">
    <main>
        <h1>Book List</h1>
        <p class="intro">A quick look at book list in database.</p>

        <section class="section">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Title</th>
                            <th>Writer</th>
                            <th>Published Year</th>
                            <th>Cover Path</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ( $books as $book )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->writer }}</td>
                                <td>{{ $book->published_year }}</td>
                                <td>{{ $book->cover_path }}</td>
                                <td>
                                    <div class="book-actions">
                                        <form method="GET" action="{{ route('edit-book', $book) }}">
                                            <input class="edit-button" type="submit" value="Edit">
                                        </form>
                                        <form method="POST" action="{{ route("destroy-book", $book) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input value="{{ $book->id }}" type="hidden" name="id">
                                            <input class="delete-button" type="submit" value="Delete">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <form method="GET" action="{{ url('/create-book') }}">
            <button class="add-button" type="submit" aria-label="Add book">+</button>
        </form>
        
    </main>
</body>
</html>