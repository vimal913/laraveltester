<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>
<body>
<div class="container">
    <div class="content">
        
            {{-- @foreach ($users as $user)
            <h2>{{$user->address->country}}</h2> --}}
            {{-- @foreach ($user->pen as $pens)
            <p>{{isset($pens->title) ? $pens->title : "-"}}</p>
            @endforeach --}}
            
            {{-- @endforeach --}}
            {{-- @foreach ($addresses as $address)
            <ul>
            <li>{{$address->country}}</li>
            <li>{{isset($address->owner->id) ? $address->owner->id : "-"}}</li>
            </ul>
            @endforeach --}}




            @foreach ($users as $user)
            <ul>
            <li>{{$user->name}}</li>
            <li>{{isset($user->address->country) ? $user->address->country : "-"}}</li>
            </ul>
            @endforeach
        
    </div>
</div>
   
    
</body>
</html>