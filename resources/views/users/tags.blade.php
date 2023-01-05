<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pen</title>
</head>
<body>
<div class="container">
    <div class="content">
        @foreach ($tags as $tag)
        <h1>{{$tag->name}}</h1>
            <ul>
                @foreach ($tag->pens as $pen)
                    <li>{{$pen->title}}</li>
                @endforeach
            </ul>
        @endforeach
           
        
    </div>
</div>
   
    
</body>
</html>