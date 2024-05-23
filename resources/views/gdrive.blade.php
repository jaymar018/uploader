<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="mb-3">
        <label for="" class="form-label">Choose file</label>
        <form method="post" action="/files" enctype="multipart/form-data">
            @csrf
            <input
            type="file"
            class="form-control"
            name=""
            id=""
            placeholder=""
            aria-describedby="fileHelpId"
            />
        <button class="btn btn-success" type="submit">Upload</button>
        </form>
    </div>
    
    
</body>
</html>