        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary btn-s">{{ e(Auth::user()->nama) }}</button>
            </div>
            <h1 class="panel-title"><strong>Rubah Username</strong></h1>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Username Sekarang</legend>

                  <div class="form-group" id="form-username-sekarang">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="username-sekarang" maxlength="20" onkeypress="tekanUsername(event)" placeholder="Ketikkan username anda sekarang disini..."></textarea>
                      <span class="help-block" id="error-username-sekarang"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Username Baru</legend>

                  <div class="form-group" id="form-username-baru">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="username-baru" maxlength="20" onkeypress="tekanUsername(event)" placeholder="Ketikkan username baru anda disini..."></textarea>
                      <span class="help-block" id="error-username-baru"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Konfirmasi Username Baru</legend>

                  <div class="form-group" id="form-konfirmasi-username-baru">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="konfirmasi-username-baru" maxlength="20" onkeypress="tekanUsername(event)" placeholder="Ketik ulang username baru anda disini..."></textarea>
                      <span class="help-block" id="error-konfirmasi-username-baru"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

            </div> <!-- row -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="col-simpan">
              <button type="button" class="btn btn-primary" data-loading-text="Tunggu..." onclick="rubahUsername()" id="simpan">Simpan</button>
            </div>

            <div class="alert alert-info col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center" id="sukses"></div>

          </div> <!-- panel-body -->

        </div> <!-- panel -->