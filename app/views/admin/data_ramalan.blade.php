        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary btn-s">{{ e(Auth::user()->nama) }}</button>
            </div>
            <h1 class="panel-title"><strong>Data Ramalan</strong></h1>
          </div>

          <div class="panel-body">
            <div class="row">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Zodiak</th>
                    <th>Umum</th>
                    <th>Asmara</th>
                    <th>Karir</th>
                    <th>Motivasi</th>
                    <th>Nomor</th>
                    <th>Warna</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($ramalan as $data)
                    <tr>
                      <td class="text-center">{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                      <td class="text-center">{{ e($data->zodiak) }}</td>
                      <td>{{ substr(ucfirst(nl2br(e($data->umum))), 0, 100) }}</td>
                      <td>{{ substr(ucfirst(nl2br(e($data->asmara))), 0, 100) }}</td>
                      <td>{{ substr(ucfirst(nl2br(e($data->karir))), 0, 100) }}</td>
                      <td>{{ substr(ucfirst(nl2br(e($data->motivasi))), 0, 100) }}</td>
                      <td class="text-center">{{ e($data->nomor) }}</td>
                      <td class="text-center">{{ e($data->warna) }}</td>
                      <td class="text-center">
                        <div class="btn-group btn-group-xs">
                          <a class="btn btn-default glyphicon glyphicon-pencil" id="{{ $data->id }}" onclick="formRubahRamalan(this)" title="Rubah"></a>
                          <a class="btn btn-default glyphicon glyphicon-trash" id="{{ $data->id }}" onclick="konfirmasiHapusRamalan(this)" title="Hapus"></a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              {{ $ramalan->links() }}

            </div> <!-- row -->

          </div> <!-- panel-body -->

        </div> <!-- panel -->