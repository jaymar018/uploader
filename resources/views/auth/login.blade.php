<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
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

        .container-fluid .row input {
            border-radius: 10px;
        }

        .container-fluid .row button {
            border-radius: 10px;
        }

        .left-container {
            background: url('https://th.bing.com/th/id/R.fecb2475906c5000b8d927c5e001ca78?rik=rn5DkMk03zSHIQ&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2fb%2f1%2ff%2f275164.jpg&ehk=HhOlF%2fT%2fiDmvFBP7S6EvOIs8B3hOdU3mkrDgyiGqvgI%3d&risl=&pid=ImgRaw&r=0');
            border-top-left-radius: 40px;
            border-bottom-left-radius: 40px;
        }

        .alert ul{
            font-size: 13px;
            padding: 2px;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center" style="height: 100vh;">
                <span>
                    <h1>Welcome Back!</h1>
                    <p>Enter your Credentials to access your account</p>
                    <div class="mb-5">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="email" class="col col-form-label row pr-0">Email Address</label>
                                <div class="col-12 row pr-0">
                                    <input type="text" class="form-control w-100" name="email" id="inputName"
                                        placeholder="Enter your email" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="col col-form-label row pr-0">Password</label>
                                <div class="col-12 row pr-0">
                                    <input type="password" class="form-control w-100" name="password" id="inputName"
                                        placeholder="Enter your password" />

                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-12 pr-0 row">
                                    <button type="submit" class="btn btn-primary btn-block ">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </span>

            </div>

            <div class="col-6 left-container"></div>

        </div>
    </div>


    {{-- <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form> --}}
</body>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>
