@extends('home')

@section('content')
    <div class="col-md-6 upload-form">
        <h1 class="text-center mb-4">{{$title}}</h1>

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

        <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose Excel File</label>
                <input type="file" class="form-control-file" id="file" name="file" accept=".xls,.xlsx">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>    
@endsection

