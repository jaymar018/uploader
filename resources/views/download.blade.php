@extends('home')

@section('content')
    <div class="container-fluid row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Students Data</h3>
                    <a href="{{route('export.students.db')}}" class="btn btn-primary">Download</a>
                    <div class="progress">
                        <div id="studentProgressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Employees Data</h3>
                    <a href="{{route('export.employees.db')}}" class="btn btn-primary">Download</a>
                    <div class="progress">
                        <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="{{asset('js/download.js')}}"></script>
@endsection