<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error{
            border:1px solid red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="card p-5 mt-4">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <form action="{{route('form.store')}}" method="post">
                    @csrf
                    <div class="head">
                        <h3 class="text-center text-info">Validation</h3>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input name="email" type="email" class="form-control @error('email') error  @enderror" id="inputEmail4" value="{{ old('email')}}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input name="password" type="password" class="form-control @error('email') error  @enderror" id="inputPassword4" value="{{ old('password')}}">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      @error('add1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      <textarea name="add1" type="text" class="form-control @error('add1') error  @enderror" id="inputAddress" placeholder="1234 Main St" value="{{ old('add1')}}"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Address 2</label>
                      @error('add2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      <textarea name="add2" type="text" class="form-control @error('add2') error  @enderror" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ old('add2')}}"></textarea>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input name="city" type="text" class="form-control @error('city') error  @enderror" id="inputCity" value="{{ old('city')}}">
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="state">State</label>
                        <select id="state" class="form-control @error('states') error  @enderror" name="states">
                          <option value="">Choose...</option>
                          <option value="1">Tamil Nadu</option>
                          <option value="2">Kerala</option>
                          <option value="3">Karnataka</option>
                          <option value="4">Andhra</option>
                        </select>
                        @error('states')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input name="zip" type="text" class="form-control @error('zip') error  @enderror" id="inputZip" value="{{ old('zip')}}">
                        @error('zip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input name="checkout" class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                          Check me out
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                  </form>
            </div>
        </div>
    </div>
</body>
</html>