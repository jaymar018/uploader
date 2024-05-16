<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Excel File</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for centering the form -->
    <link rel="stylesheet" href="{{ asset('assets/css/upload.css') }}">
    
<body>

<div class="container">

    <div class="container-fluid">
        <div class="row">
          <!-- Sidebar -->
          <div class="col-md-3 sidebar">
            <h3>Sidebar</h3>
            <ul class="list-unstyled">
                <li><a href="{{route('upload.form')}}">Upload User File</a></li>
                <li><a href="{{route('upload.employee.form')}}">Upload Employee File</a></li>
                <li><a href="{{route('upload.student')}}">Upload Student File</a></li>
                <li><a href="{{route('random.data')}}">Export Random Data</a></li>
                <li><a href="{{route('random.student')}}">Export Random Student Data</a></li>
                <li><a href="{{route('export.employees')}}">Export Random Employees</a></li>
                <li><a href="{{route('export.users')}}">Export User File From Db (cursor)</a></li>
                <li><a href="{{route('export.chunk')}}">Export User File From Db (chunk)</a></li>
                <li><a href="{{route('export.employees.db')}}">Export Emp. File From Db</a></li>
              </ul>
          </div>
          <!-- Content Area -->
          <div class="col-md-9 content-area">
            <div class="col-md-6 upload-form">
                <h1 class="text-center mb-4">Upload Students Data</h1>
        
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        
                <form action="{{ route('upload.student') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Choose Excel File</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept=".xls,.xlsx">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
          </div>
        </div>
    </div>
      

    <!--Admin-->
    <a href="{{url('admin')}}">
        <div class="admin-txt">Admin</div>
    </a>


</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
