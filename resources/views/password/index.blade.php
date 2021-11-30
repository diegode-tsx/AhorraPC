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

<a href="{{route('code')}}">Tengo un codigo</a>