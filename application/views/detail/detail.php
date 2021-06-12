<div class="container">

    <div class="card" style="width: 18rem;">
        <?php foreach ($detail as $d): ?>
            <div class="card-body">
                <h5 class="card-title"><?= $d['nama'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $d['nrp'] ?></h6>
                <p class="card-text"><?= $d['email'] ?></p>
                <p class="card-text"><?= $d['jurusan'] ?></p>
           </div>
        <?php endforeach ?>
    </div>
</div>