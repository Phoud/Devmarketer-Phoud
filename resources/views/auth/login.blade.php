@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">Login</h1>
            <form action="{{ route('login') }}" method="POST" role="form">
                {{ csrf_field() }}
            <div class="field">
                <label for="email">Email</label>
                <p class="control">
                    <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                </p>
                @if($errors->has('email'))
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="field">
                <label for="password">Password</label>
                <p class="control">
                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" id="password">
                </p>
                @if($errors->has('password'))
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <b-checkbox name="remember" class="m-t-20">Remember me</b-checkbox>
            <button class="button is-primary is-outlined is-fullwidth m-t-30">Log In</button>
            <h5 class="has-text-left m-t-30 m-l-5"><a href="{{ route('password.request') }}" class="is-muted">Forgot Password?</a></h5>
            </div>
        </form> 
        
        </div> {{-- end of the card-content --}}

    </div>
</div>
@endsection
