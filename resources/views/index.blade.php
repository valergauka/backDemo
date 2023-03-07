<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Import data into MySQL database in Laravel 8</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>

<div class="container mt-5">

    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method='post' action="{{ route('employees.importdata') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" class="form-control" id="file" name="file" value="">
        </div>

        <button type="submit" class="btn btn-success">Import</button>
    </form>

    <!-- Import data with validation -->
    <h2 class='mt-5'>Validate and import data</h2>
    {{-- Display errors --}}
    @if (count($errors) > 0)
        <div class="row">
            <div class="col-md-12 ">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form method='post' action="{{ route('employees.validateandimportdata') }}" >
        @csrf
        <button type="submit" class="btn btn-success">Import</button>
    </form>
</div>

</body>
</html>
