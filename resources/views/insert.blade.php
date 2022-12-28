<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Insert Form</title>
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
        .error{
          border:1px solid red;
        }
        .errors{
          color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
      <div class="content">
        <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left mb-2 text-center">
                  <h2>Add Company</h2>
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
      <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Company Name:</strong>@error('name') <span class="errors">{{$message}}</span> @enderror
                      <input type="text" name="name" class="form-control  @error('name') error @enderror @error('name') error @enderror" placeholder="Company Name">
                      {{-- @error('name')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror --}}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Company Email:</strong>@error('email') <span class="errors">{{$message}}</span> @enderror
                      <input type="email" name="email" class="form-control  @error('email') error @enderror" placeholder="Company Email">
                      {{-- @error('email')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror --}}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Company Address:</strong>@error('address') <span class="errors">{{$message}}</span> @enderror
                      <input type="text" name="address" class="form-control  @error('address') error @enderror" placeholder="Company Address">
                      {{-- @error('address')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror --}}
                  </div>
              </div>
              <div class="button">
                <button type="submit" style="margin-left: 19em !important;" class="btn btn-primary ml-3">Submit</button>
              </div>
              
          </div>
      </form>
      </div>
        
    </div>
</body>

</html>