        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-primary btn-s">{{ e(Auth::user()->nama) }}</button>
            </div>
            <h1 class="panel-title"><strong>Data Admin</strong></h1>
          </div>

          <div class="panel-body">
            <div class="row">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Dibuat</th>
                    <th>Diupdate</th>
                    <th>...</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($admins as $data)
                    <tr>
                      <td class="text-center">{{ e($data->nama) }}</td>
                      <td class="text-center">{{ e($data->username) }}</td>
                      <td class="text-center">{{ date('d-m-Y H:i:s', strtotime($data->created_at)) }}</td>
                      <td class="text-center">{{ date('d-m-Y H:i:s', strtotime($data->updated_at)) }}</td>
                      <td class="text-center">
                        <div class="btn-group btn-group-xs">
                          <a class="btn btn-default glyphicon glyphicon-pencil" id="{{ $data->id }}" onclick="formRubahAdmin(this)" title="Rubah"></a>
                          <a class="btn btn-default glyphicon glyphicon-trash" id="{{ $data->id }}" onclick="konfirmasiHapusAdmin(this)" title="Hapus"></a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              {{ $admins->links() }}

            </div> <!-- row -->

          </div> <!-- panel-body -->

        </div> <!-- panel -->