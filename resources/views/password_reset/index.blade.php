<br><br>
<form  method="POST">
    @csrf

    @if ($errors->has('token'))
        <span>{{$errors->first('token')}}</span>
    @endif
    <input type="text" name="token" placeholder="Ingrese su codigo" autofocus required>
    @if (session('fail_pass'))
        <strong>{{session('fail_pass')}}</strong>
    @endif <br><br>

    <input type="password" name="new_password" placeholder="Contraseña nueva" required> <br> <br>

    <input type="password" name="new_password_confirmation" placeholder="Contraseña nueva" required> <br> <br>
    

    <input type="submit" value="Cambiar contraseña">
    @if ($errors->has('new_password'))
        <span>{{$errors->first('new_password')}}</span>
    @endif
    
</form><br>
<a href="{{route('home')}}">Regresar</a>