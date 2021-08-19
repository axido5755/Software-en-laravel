@include('includes.head')

<body class="text-center">
    
    <main class="form-signin">
      <form action="{{ url('/') }}" method="post" >
        @csrf

        <img class="mb-4" src="https://lh3.googleusercontent.com/proxy/scUvPUqGeoxpf2IO6Z4aOTjxB3b_E76JN4waw_F0SoK6KqaMpYqz4ZWaIcUg4csvI7c7eZ87Fiup__RyZ1VOOJvLFaalTiJBmuiXKxgQH8QxitMgWXCvrDqK" alt="" width="100%" >
        <h1 class="h3 mb-3 fw-normal">Ingreso a contratos</h1>
    
        <div class="form-floating">
          <input type="text" name="rut" class="form-control" id="floatingInput" placeholder="199584855" value="{{old('rut')}}">
          <label for="floatingInput">Rut</label>
        </div>
        <div class="form-floating">
          <input type="password" name="contrasena" class="form-control" id="floatingPassword" placeholder="contrasena">
          <label for="floatingPassword">Contraseña</label>
        </div>
    
        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
        <p class="mt-5 mb-3 text-muted">©Universidad Del Biobio</p>
        <p class="mt-5 mb-3 text-muted">©2021</p>
      </form>
    </main>
    
    
        
      
    
    </body>

    <style>
        html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>