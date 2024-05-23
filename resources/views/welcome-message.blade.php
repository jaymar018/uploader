<!-- resources/views/welcome-message.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Include Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .container-fluid div span {
            border: 1px solid black;
            padding: 50px;
            border-radius: 10px;
        }

        .submit-btn
        {
            background-color: #4D869C;
            border: none;
        }

        .cancel-btn
        {
            background-color: #4d869c95;
            border: none;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1>Welcome to our service!</h1>
                        <p>Please agree to the terms and conditions.</p>

                        <form id="cancel-form" action="{{ route('cancel.welcome') }}" method="post"
                            style="display: none;">
                            @csrf
                        </form>

                        <form action="{{ route('acknowledge.welcome', ['userId' => $userId]) }}" method="POST">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <a href=""></a>
                                    <button type="button" class="btn btn-primary btn-block cancel-btn"
                                        onclick="document.getElementById('cancel-form').submit();">Cancel</button>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block submit-btn">Agree</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
