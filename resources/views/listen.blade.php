<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
</head>
<body>
    
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        Echo.channel('notification')
        .listen('MessageNotification', (event) => {
            console.log("message");
            alert('hello');
        });

    </script>
</body>
</html> 