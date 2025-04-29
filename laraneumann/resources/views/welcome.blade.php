<h1>WELCOME TO NEUMANN</h1>

@auth
    <p>Welcome, {{ $user->name }}!</p>
    <p>Your role: {{ $user->role_name }}</p>
@else
    <p>Welcome, guest! Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a>.</p>
@endauth
