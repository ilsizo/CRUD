<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Laravel 9 : CRUD</h2>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success col-lg-12 text-center">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th width="50 text-center">No.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>TelePhone</th>
                    <th width="160">Action</th>
                </tr>
                @foreach ($crud as $check)
                    <tr>
                        <td class="text-center">{{ $check->id }}</td>
                        <td>{{ $check->name }}</td>
                        <td>{{ $check->email }}</td>
                        <td>{{ $check->phone }}</td>
                        <td>
                            <form action="{{ route('crud.destroy', $check->id) }}" method="POST">
                                <a href="{{ route('crud.edit', $check->id)}}" class="btn btn-warning">EDIT</a>
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $crud->links('pagination::bootstrap-5') !!}
            <a href="{{ route('crud.create') }}" class="btn btn-success">CREATE</a>
            </div>
        </div>
    </div>
</body>
</html>