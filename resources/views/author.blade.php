<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 Author</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center mb-4">Top 10 Authors</h3>

        <div class="mb-4">
            <a href="{{ route('book.index') }}" class="btn btn-primary">Back To Book List</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Author Name</th>
                        <th>Voter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topAuthors as $index => $author)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->total_voter }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
