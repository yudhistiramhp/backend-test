<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books List</title>
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Book List</h1>

        <div class="mb-4">
            <a href="{{ route('rating.create') }}" class="btn btn-warning">Rate Book</a>
            <a href="{{ route('author.index') }}" class="btn btn-secondary">Top Author</a>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <p>List Shown</p>
                <form action="{{ route('book.index') }}" method="get" class="d-inline">
                    <input type="text" name="query" value="{{ $query }}" hidden />
                    <select name="per_page" class="form-select" onchange="this.form.submit()">
                        @for ($i = 10; $i <= 100; $i += 10)
                            <option value="{{ $i }}" {{ request('per_page') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </form>
            </div>
            <div class="col-md-6 d">
                <p>Search Book</p>
                <form action="{{ route('book.index') }}" method="get" class="d-inline">
                    <input type="text" name="query" value="{{ $query }}" class="form-control d-inline-block" style="width: 87%;">
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Book Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Average Rating</th>
                    <th>Voter Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $index => $book)
                <tr>
                    <td>{{ ($books->currentPage() - 1) * $books->perPage() + $index + 1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>{{ $book->author->name ?? '-' }}</td>
                    <td>{{ $book->averagerating() }}</td>
                    <td>{{ $book->votercount() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="justify-content-center">
            {{ $books->appends(['per_page' => request('per_page')])->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
