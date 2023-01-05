@extends('credential.main')

@section('content')
    

@if ($messages = Session::get('success'))
<div class="alert alert-info">{{ $messages }}</div>
@endif
@if ($messages = Session::get('error'))
<div class="alert alert-danger">{{ $messages }}</div>
@endif
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center bg-info">
                Login
            </div>
            <div class="card-body">
                    <form action="{{ route('sample.validate_login') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="email" class="form-control" placeholder="Email"/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection