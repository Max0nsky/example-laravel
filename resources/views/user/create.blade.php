<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('public/assets/admin/css/admin.css') }}">

</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Регистрация</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <div class="row">
          <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            @if (session()->has('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

          </div>
        </div>
        <form action="{{ route('register.store') }}" method="post">
          @csrf

          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Регистрация</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <a href="#" class="text-center">Я уже зарегестрирован</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <script src="{{ asset('public/assets/admin/js/admin.js') }}"></script>

</body>

</html>