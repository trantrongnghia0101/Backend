<form class="m-t" role="form" action="{{route('login')}}" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" name="email" old="email" class="form-control" placeholder="Email" >
        @if ($errors->has('email')) 
           <span class="error-message">*{{$errors->first('email')}}</span>
        @endif
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" >
        @if ($errors->has('password')) 
            <span class="error-message">*{{$errors->first('password')}}</span>
         
         @endif
    </div>
    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
</form>