<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>file</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <form action="{{ route('s.storage') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file" id="">
                <button type="submit">Upload</button>
            </form>
            
        </div>
    </div>
</body>
</html>