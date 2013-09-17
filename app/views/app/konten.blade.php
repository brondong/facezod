              <ul class="nav nav-tabs">
                <li class="active"><a href="#data" data-toggle="tab">Data</a></li>
                <li><a href="#umum" data-toggle="tab">Umum</a></li>
                <li><a href="#asmara" data-toggle="tab">Asmara</a></li>
                <li><a href="#karir" data-toggle="tab">Karir</a></li>
                <li><a href="#motivasi" data-toggle="tab">Motivasi</a></li>
                <li><a href="#nomor" data-toggle="tab">Nomor</a></li>
                <li><a href="#warna" data-toggle="tab">Warna</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane fade in active" id="data">
                  <table>
                    <tr>
                      <td>Nama Lengkap</td>
                      <td>: {{ e($nama) }}</td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir</td>
                      <td>: {{ e($lahir) }}</td>
                    </tr>
                    <tr>
                      <td>Umur Saat Ini</td>
                      <td>: {{ e($umur) }}</td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>: {{ e($gender) }}</td>
                    </tr>
                    <tr>
                      <td>Status Hubungan</td>
                      <td>: {{ e($status) }}</td>
                    </tr>
                  </table>
                </div>

                @foreach ($ramal as $data)
                  <div class="tab-pane fade" id="umum">
                    <p>{{ ucfirst(nl2br(e($data->umum))) }}</p>
                  </div>
                  <div class="tab-pane fade" id="asmara">
                    <p>{{ ucfirst(nl2br(e($data->asmara))) }}</p>
                  </div>
                  <div class="tab-pane fade" id="karir">
                    <p>{{ ucfirst(nl2br(e($data->karir))) }}</p>
                  </div>
                  <div class="tab-pane fade" id="motivasi">
                    <p>{{ ucfirst(nl2br(e($data->motivasi))) }}</p>
                  </div>
                  <div class="tab-pane fade col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center" id="nomor">
                    <p>{{ e($data->nomor) }}</p>
                  </div>
                  <div class="tab-pane fade col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center" id="warna">
                    <p style="background: {{ '#' . $data->warna }}"></p>
                  </div>
                @endforeach
              </div>