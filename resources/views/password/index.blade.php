<h1>Recuperar contraseña</h1>
<br>
@if (session('fail'))
    <strong>{{session('fail')}}</strong>
@endif
@if (session('status'))
    <strong>{{session('status')}}</strong>
@endif
<form action="{{route('password.request')}}" method="POST">
@csrf

<input type="email" name="email" autofocus required>
<br><br>
<input type="submit" value="Recuperar">

</form>

<a href="{{route('home')}}">Regresar</a>
<br><br>
<form action="{{route('password.code')}}" method="POST">
    @csrf
    <input type="text" name="token" placeholder="Ingrese su codigo"> <br><br>

    <input type="password" name="new_password" placeholder="Contraseña nueva" required> <br> <br>

    <input type="password" name="new_password_confirmation" placeholder="Contraseña nueva" required> <br> <br>

    <input type="submit" value="Cambiar contraseña">
    @if (session('fail_pass'))
        <strong>{{session('faill_pass')}}</strong>
    @endif
</form>
