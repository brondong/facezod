          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Hapus Ramalan</h4>
          </div>
          <div class="modal-body">
          	<p>Apakan anda yakin ingin menghapus ramalan zodiak <strong>{{ $ramalan->zodiak }}</strong> pada tanggal <strong>{{ date('d-m-Y', strtotime($ramalan->tanggal)) }}</strong>?</p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="hapusRamalan({{ $ramalan->id }})" id="simpan">Ya</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>