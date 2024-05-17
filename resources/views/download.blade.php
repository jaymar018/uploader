@extends('home')

@section('content')
    <div class="container-fluid row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Students Data</h3>
                    <a href="{{route('export.students.db')}}" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Employees Data</h3>
                    <a href="{{route('export.employees.db')}}" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
    </div>
    
@endsection