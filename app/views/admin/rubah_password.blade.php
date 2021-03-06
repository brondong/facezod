        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary btn-s">{{ e(Auth::user()->nama) }}</button>
            </div>
            <h1 class="panel-title"><strong>Rubah Password</strong></h1>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Password Sekarang</legend>

                  <div class="form-group" id="form-password-sekarang">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="password-sekarang" maxlength="20" onkeypress="tekanPassword(event)" placeholder="Ketikkan password anda sekarang disini..."></textarea>
                      <span class="help-block" id="error-password-sekarang"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Password Baru</legend>

                  <div class="form-group" id="form-password-baru">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="password-baru" maxlength="20" onkeypress="tekanPassword(event)" placeholder="Ketikkan password baru anda disini..."></textarea>
                      <span class="help-block" id="error-password-baru"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Konfirmasi Password Baru</legend>

                  <div class="form-group" id="form-konfirmasi-password-baru">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="konfirmasi-password-baru" maxlength="20" onkeypress="tekanPassword(event)" placeholder="Ketik ulang password baru anda disini..."></textarea>
                      <span class="help-block" id="error-konfirmasi-password-baru"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

            </div> <!-- row -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="col-simpan">
              <button type="button" class="btn btn-primary" data-loading-text="Tunggu..." onclick="rubahPassword()" id="simpan">Simpan</button>
            </div>

            <div class="alert alert-info col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center" id="sukses"></div>

          </div> <!-- panel-body -->

        </div> <!-- panel -->