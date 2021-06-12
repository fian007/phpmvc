<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="<?=base_url('welcome/proses_edit')?>" method="post">
            <?php foreach ($edit_data as $e):?>
                <input type="hidden" name="id" value="<?= $e['id'] ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" value="<?= $e['nama']?>" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nrp</label>
                        <input type="text" value="<?= $e['nrp'] ?>" name="nrp" class="form-control">
                    </div>            
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="<?= $e['email'] ?>" name="email" class="form-control">
                    </div>            
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" value="<?= $e['jurusan'] ?>" name="jurusan" class="form-control">
                    </div>
            <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>