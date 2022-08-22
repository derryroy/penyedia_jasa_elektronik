<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

    <div class="page-header mt-0">
        <h1 class="page-title">Servis Terbaru</h1>
        <div>
            <a href="/services">Lihat Servis Lainnya</a>
        </div>
    </div>

    <div class="row">
        <?php foreach($services as $key => $service): ?>
            <div class="col-xl-4 col-md-12">
                <div class="card overflow-hidden relative">
                    <img src="/uploads/<?= $service['image'] ?>" class="card-img-top card-img-service" alt="img">
                    <span class="badge card-category bg-success"><?= $service['category_name'] ?></span>
                    <div class="card-body">
                        <h3 class="fs-12 fw-bold text-gray"><?= $service['name'] ?></h3>
                        <h5 class="card-text fw-bold"><?= $service['title'] ?></h5>
                        <p class="card-title">Rp <?= number_format($service['estimated_price']) ?></p>
                        <a href="/services/<?= $service['category_slug'] ?>/<?= $service['slug'] ?>" class="btn btn-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?= $this->endSection() ?>
