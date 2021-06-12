<div class="container">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash');  ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('welcome/tambah_data'); ?>" class="btn btn-primary">Tambah Data Mahasiswa</a>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Cari Data Mahasiswa.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <h3>Daftar Mahasiswa</h3><br>
    <?php if (empty($data_mahasiswa)) : ?>
        <div class="alert alert-danger" role="alert">
            Data Mahasiswa Tidak Diketemukan
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <?php foreach ($data_mahasiswa as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= base_url('welcome/detail/') . $mhs['id'] ?>" class="badge badge-primary float-right">detail</a>
                        <a href="<?= base_url('welcome/hapus_data/') . $mhs['id'] ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?')">hapus</a>
                        <a href="<?= base_url('welcome/edit_data/') . $mhs['id'] ?>" class="badge badge-warning float-right">edit</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>