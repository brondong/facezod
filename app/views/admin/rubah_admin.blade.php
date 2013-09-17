        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary btn-s">{{ e(Auth::user()->nama) }}</button>
            </div>
            <h1 class="panel-title"><strong>Rubah Admin</strong></h1>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Nama</legend>

                  <div class="form-group" id="form-nama">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="nama" maxlength="20" onkeypress="tekanRubahAdmin(event, {{ $admin->id }})" placeholder="Ketikkan nama admin disini..." value="{{ $admin->nama }}"></textarea>
                      <span class="help-block" id="error-nama"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Username</legend>

                  <div class="form-group" id="form-username">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="username" maxlength="20" onkeypress="tekanRubahAdmin(event, {{ $admin->id }})" placeholder="Ketikkan username admin disini..."  value="{{ $admin->username }}"></textarea>
                      <span class="help-block" id="error-username"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Password</legend>

                  <div class="form-group" id="form-password">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="password" class="form-control" id="password" onkeypress="tekanRubahAdmin(event, {{ $admin->id }})" placeholder="Ketikkan password admin disini..."></textarea>
                      <span class="help-block" id="error-password"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

            </div> <!-- row -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="col-simpan">
              <button type="button" class="btn btn-primary" data-loading-text="Tunggu..." onclick="rubahAdmin({{ $admin->id }})" id="tambah">Simpan</button>
            </div>

            <div class="alert alert-info col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center" id="sukses"></div>

          </div> <!-- panel-body -->

        </div> <!-- panel -->