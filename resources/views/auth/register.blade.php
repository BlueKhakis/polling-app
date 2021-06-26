@foreach ($errors->all() as $error)
    <div class="error">{{ $error }}</div>
@endforeach

<link rel="stylesheet" href="style.css">
 
<form action="{{ route('register') }}" method="post">
    @csrf
 
    <input type="text" name="name" value="{{ old('name') }}">
 
    <input type="email" name="email" value="{{ old('email') }}">
 
    <input type="password" name="password" value="">
 
    <input type="password" name="password_confirmation" value="">
 
    <button>Register</button>
 
</form>