        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary btn-s">{{ e(Auth::user()->nama) }}</button>
            </div>
            <h1 class="panel-title"><strong>Rubah Nama</strong></h1>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Nama Sekarang</legend>

                  <div class="form-group" id="form-nama-sekarang">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="nama-sekarang" maxlength="20" onkeypress="tekanNama(event)" placeholder="Ketikkan nama anda sekarang disini..."></textarea>
                      <span class="help-block" id="error-nama-sekarang"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Nama Baru</legend>

                  <div class="form-group" id="form-nama-baru">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="nama-baru" maxlength="20" onkeypress="tekanNama(event)" placeholder="Ketikkan nama baru anda disini..."></textarea>
                      <span class="help-block" id="error-nama-baru"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <legend>Konfirmasi Nama Baru</legend>

                  <div class="form-group" id="form-konfirmasi-nama-baru">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="konfirmasi-nama-baru" maxlength="20" onkeypress="tekanNama(event)" placeholder="Ketik ulang nama baru anda disini..."></textarea>
                      <span class="help-block" id="error-konfirmasi-nama-baru"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

            </div> <!-- row -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="col-simpan">
              <button type="button" class="btn btn-primary" data-loading-text="Tunggu..." onclick="rubahNama()" id="simpan">Simpan</button>
            </div>

            <div class="alert alert-info col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center" id="sukses"></div>

          </div> <!-- panel-body -->

        </div> <!-- panel -->