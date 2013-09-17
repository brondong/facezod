<!DOCTYPE html>
<html>
  <head>
    <title>Pengamat Zodiak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="zodiak, bintang, ramalan, primbon, ramalan zodiak, ramalan bintang, primbon">
    <meta name="description" content="Ketahui ramalan bintang anda setiap hari secara up to date dengan bantuan Pengamat Zodiak">
    <meta name="author" content="Heru Rusdianto">
    <meta name="robots" content="noindex,nofollow">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" media="screen">

    <!--[if lt IE 9]>
      <script src="{{ asset('js/html5shiv.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h1 class="panel-title"><strong>Login Founder</strong></h1>
        </div>

        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="form-horizontal">
                <div class="form-group" id="form-username">
                  <label for="username" class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control-label">Username</label>
                  <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <input type="text" class="form-control" id="username" maxlength="20" onkeypress="tekan(event)" placeholder="Ketikkan username anda disini...">
                    <span class="help-block" id="error-username"></span>
                  </div>
                </div>
                
                <div class="form-group" id="form-password">
                  <label for="password" class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control-label">Password</label>
                  <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <input type="password" class="form-control" id="password" maxlength="30" onkeypress="tekan(event)" placeholder="Ketikkan password anda disini...">
                    <span class="help-block" id="error-password"></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="ingat" id="ingat"> Ingat saya
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <button type="button" id="fat-btn" data-loading-text="Tunggu..." class="btn btn-primary" onclick="login()">Login</button>
                  </div>
                </div>

                <div class="alert alert-danger" id="error-login"></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script>
      var url_login = "{{ route('admin_login') }}";
      var url_home = "{{ route('admin_home') }}";
    </script>
  </body>
</html>