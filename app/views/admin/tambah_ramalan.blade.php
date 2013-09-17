        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary btn-s" id="zodiak" data-zodiak="">Pilih Zodiak</button>
              <button type="button" class="btn btn-primary btn-s dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a onclick="zodiak(this)" data-zodiak="Aries">Aries</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Taurus">Taurus</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Gemini">Gemini</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Cancer">Cancer</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Leo">Leo</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Virgo">Virgo</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Libra">Libra</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Scorpio">Scorpio</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Sagitarius">Sagitarius</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Capricorn">Capricorn</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Aquarius">Aquarius</a></li>
                <li><a onclick="zodiak(this)" data-zodiak="Pisces">Pisces</a></li>
              </ul>
            </div>
            
            <h1 class="panel-title"><strong>Tambah Ramalan</strong></h1>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <fieldset>
                  <legend>Nomor</legend>

                  <div class="form-group" id="form-nomor">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="nomor" maxlength="10" placeholder="Ketikkan ramalan nomor disini...">
                      <span class="help-block" id="error-nomor"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <fieldset>
                  <legend>Warna</legend>

                  <div class="form-group" id="form-warna">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="warna" maxlength="10" placeholder="Ketikkan ramalan warna disini..." readonly="readonly">
                      <span class="help-block" id="error-warna"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <fieldset>
                  <legend>Tanggal</legend>

                  <div class="form-group" id="form-tanggal">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="tanggal" maxlength="10" placeholder="Ketikkan tanggal ramalan disini..." readonly="readonly">
                      <span class="help-block" id="error-tanggal"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <fieldset>
                  <legend>Umum</legend>

                  <div class="form-group" id="form-umum">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <textarea class="form-control" id="umum" rows="5" placeholder="Ketikkan ramalan umum disini..."></textarea>
                      <span class="help-block" id="error-umum"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <fieldset>
                  <legend>Asmara</legend>

                  <div class="form-group" id="form-asmara">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <textarea class="form-control" id="asmara" rows="5" placeholder="Ketikkan ramalan asmara disini..."></textarea>
                      <span class="help-block" id="error-asmara"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <fieldset>
                  <legend>Karir</legend>

                  <div class="form-group" id="form-karir">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <textarea class="form-control" id="karir" rows="5" placeholder="Ketikkan ramalan karir disini..."></textarea>
                      <span class="help-block" id="error-karir"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <fieldset>
                  <legend>Motivasi</legend>

                  <div class="form-group" id="form-motivasi">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <textarea class="form-control" id="motivasi" rows="5" placeholder="Ketikkan ramalan motivasi disini..."></textarea>
                      <span class="help-block" id="error-motivasi"></span>
                    </div>
                  </div>
                </fieldset>
              </div>

            </div> <!-- row -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="col-tambah">
              <button type="button" class="btn btn-primary" data-loading-text="Tunggu..." onclick="tambahRamalan()" id="tambah">Tambah</button>
            </div>

            <div class="alert alert-danger col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center" id="error"></div>

            <div class="alert alert-info col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center" id="sukses"></div>

          </div> <!-- panel-body -->

        </div> <!-- panel -->