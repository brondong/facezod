          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Hapus Admin</h4>
          </div>
          <div class="modal-body">
          	<p>Apakan anda yakin ingin menghapus admin dengan nama <strong>{{ e($admin->nama) }}</strong> dan username <strong>{{ e($admin->username) }}</strong>?</p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="hapusAdmin({{ $admin->id }})" id="simpan">Ya</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>