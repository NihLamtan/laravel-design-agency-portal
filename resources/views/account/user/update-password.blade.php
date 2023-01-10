@extends('account.layout')


@section('nav-bar')

<main id="main-sec">
    <x-user-dashboard-navbar/>
</main>

@endsection    

    @section('profile_content')
    <form method="POST" action="{{ route('password.update') }}">

        @csrf
        @method('PUT')
    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">

        <label for="new-password" class="control-label input-label">Current Password</label>
                    
        <input id="current-password" type="password" class="form-control input-area" name="current-password" >

        @if ($errors->has('current-password'))
            <span class="help-block">
                <strong>{{ $errors->first('current-password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
        <label for="new-password" class="control-label input-label">New Password</label>

            <input id="new-password" type="password" class="form-control input-area" name="new-password" >

            @if ($errors->has('new-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('new-password') }}</strong>
                </span>
            @endif
        </div>
   
        <div class="form-group">
            <label for="new-password-confirm" class="control-label input-label">Confirm New Password</label>
                <input id="new-password-confirm" type="password" class="form-control input-area" name="new-password_confirmation" >
        </div>
   
        <div class="form-group">
            <button type="submit" class="dashboard-main-btn">
                Save Password
            </button>
        </div>
    </form>
   
    @endsection
