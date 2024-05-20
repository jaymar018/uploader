<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Excel File</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <ul class="list-unstyled">
                    <li><i class="fa fa-upload"></i> <a href="{{route('upload.form')}}">Upload User File</a></li>
                    <li><i class="fa fa-upload"></i> <a href="{{route('upload.employee.form')}}">Upload Employee File</a></li>
                    <li><i class="fa fa-upload"></i> <a href="{{route('upload.student.form')}}">Upload Student File</a></li>
                    <li><i class="fa fa-download"></i> <a href="{{route('random.students')}}">Random Student Data</a></li>
                    <li><i class="fa fa-download"></i> <a href="{{route('random.employees')}}">Random Employees Data</a></li>
                    <li><i class="fa fa-download"></i> <a href="{{route('download')}}">Download</a></li>
                </ul>
            </ul>
          </div>
          <!-- Content Area -->
          <div class="col-md-9 content-area">
            
            @yield('content')
            
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

<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')

</body>
</html>
