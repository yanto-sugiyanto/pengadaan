<!-- Modal -->
<div class="modal fade" id="pengadaanModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengadaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> 
        </button>
      </div>
      <form action="/tambahPengadaan" method="post" role="form" enctype="multipart/form-data">
        {{csrf_field()}}

        <input type="hidden" name="id_pengadaan" id="id_pengadaan" class="id_admin">
      <div class="modal-body">
        
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pengadaan</label>
                    <input type="text" class="form-control nama" id="nama-pengadaan" name="nama_pengadaan" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <textarea class="form-control deskripsi" id="deskripsi" name="deskripsi">
                   </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="file" class="form-control gambar" id="gambar" name="gambar" accept="image/png, image/jpg, image/jpeg, image/gif">
                   
                  </div>
                  <div class="form-group">
                    
                    <label>Anggaran : <input type="" class="labelRp" disabled style="border:none; background-color: white; color: black;"></label>
                    <input type="text" class="form-control" id="anggaran" name="anggaran" placeholder="Masukan anggaran" onkeyup="curency()">
                </div>
                <!-- /.card-body -->
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </div>
      </form>
    </div>
  </div>
</div>