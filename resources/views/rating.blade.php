<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Rating</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Input Rating</h1>

        <div class="mb-4">
            <a href="{{ route('book.index') }}" class="btn btn-primary">Back To Book List</a>
        </div>

        <form action="{{ route('rating.create') }}" method="GET" class="mb-4">
            <div class="mb-3">
                <label for="author_id" class="form-label">Book Author:</label>
                <select name="author_id" id="author_id" class="form-select" onchange="this.form.submit()" required>
                    <option value="" disabled selected>Select Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

        </form>
        @if (request('author_id'))
        <form action="{{ route('rating.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_id" class="form-label">Book Name:</label>
                <select name="book_id" id="book_id" class="form-select" required>
                    <option value="" disabled selected>Select Book</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating:</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="" disabled selected>Select Rating</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-success">Submit Rating</button>
        </form>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
