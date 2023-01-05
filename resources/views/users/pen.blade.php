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
        @foreach ($pens as $pen)
        <h1>{{$pen->title}}</h1>
        <p>{{optional($pen->user)->name}}</p>
            <ul>
                @foreach ($pen->tags as $tag)
                    <li>{{$tag->name}}  ({{$tag->pivot->created_at}})</li>
                @endforeach
            </ul>
        @endforeach
           
        
    </div>
</div>
   
    
</body>
</html>