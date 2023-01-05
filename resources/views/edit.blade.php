<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Company Form - Laravel 9 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .content{
          margin:auto;
            box-shadow: 0px 5px 5px 0px grey;
            padding: 37px;
width:70%;
            border-radius: 12px;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <div class="content">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2 text-center">
                        <h2>Edit Company</h2>
                    </div>
                    <div class="pull-right text-right">
                        <a class="btn btn-info" href="{{ route('companies.index') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company Name:</strong>
                            <input type="text" name="name" value="{{ $company->name }}" class="form-control"
                                placeholder="Company name">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company Email:</strong>
                            <input type="email" name="email" class="form-control" placeholder="Company Email"
                                value="{{ $company->email }}">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company Address:</strong>
                            <input type="text" name="address" value="{{ $company->address }}" class="form-control"
                                placeholder="Company Address">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Files</label>@error('file') <span class="errors">{{$message}}</span> @enderror
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                            <p><img class="img-thumbnail" width="70" height="75"src="@if(!empty($company->file)){{url('/uploads/'.$company->file)}} @else {{url('/uploads/company.jpg')}} @endif" alt=""></p>
                         </div>
                      </div>
                    <button type="submit" style="margin-left: 19em !important;" class="btn btn-primary ml-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>