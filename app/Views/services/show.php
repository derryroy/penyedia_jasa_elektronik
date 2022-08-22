<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="page-header my-0">
    <ol class="breadcrumb1">
        <li class="breadcrumb-item1"><a href="/">Home</a></li>
        <li class="breadcrumb-item1" href="/services/<?= $service['category_slug'] ?>"><?= $service['category_name'] ?></li>
        <li class="breadcrumb-item1 active"><?= $service['title'] ?></li>
    </ol>
</div>

<div class="row">
    <div class="col-xl-4">
        <img class="service-image" src="/uploads/<?= $service['image'] ?>" alt="">
    </div>
    <div class="col-xl-8">
        <h3 class="fs-14 fw-bold text-gray"><?= $service['name'] ?></h3>
        <h3 class="fw-bold"><?= $service['title'] ?></h3>
        <p class="fs-2 fw-bold mb-2">Rp <?= number_format($service['estimated_price']) ?></p>
        <div class="mb-5">
            <?= nl2br($service['description']) ?>
        </div>

        <button type="submit" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modal-order">Pesan</button>
    </div>
</div>

<div class="modal fade" id="modal-order">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="/services/<?= $service['category_slug'] ?>/<?= $service['slug'] ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Pesan</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Detail Kerusakan/Keluhan</label>
                        <textarea name="order_detail" type="text" class="form-control <?= ($validation->hasError('order_detail')) ? 'is-invalid' : ''; ?>"><?= old('order_detail', @$service['order_detail']) ?></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('order_detail') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <input name="order_image" class="form-control <?= ($validation->hasError('order_image')) ? 'is-invalid' : ''; ?>" type="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
