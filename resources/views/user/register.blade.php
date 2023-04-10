@extends('app')
@section('content')
<div>
<p style="font-weight:800;font-size:30px"> REGISTER </p>
</div>
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('register.perform') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control"
                name="username" value="{{ old('username') }}"
                placeholder="Username" required="required" autofocus>
            </div>
            <div class="mb-3">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email"
                value="{{ old('email') }}" placeholder="name@example.com"
                required="required" autofocus>
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <label>Password Confirmation<span class="text-danger">*</span></label>
                <input type="password" class="form-control"
                                                        name="password_confirmation"
                                                        value="{{ old('password_confirmation') }}"
                                                        placeholder="Confirm Password" required="required">
            </div>
            <div class="mb-3">
                <button type="submit" value="save" class="btn btn-primary">Register</button>
                <a class="btn btn-danger" href="{{ url('/') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection