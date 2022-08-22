<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<a href="/orders/<?= $order['order_id'] ?>" class="btn btn-primary mb-4">Kembali ke Rincian</a>

<div class="card">
    <div class="card-body">
        <div class="alert alert-info">Berikut tampilan iklan produk pada tanggal <?= $order['created_at'] ?></div>
        <div class="row">
            <div class="col-xl-4">
                <img src="/uploads/<?= $services[0]['image'] ?>" alt="">
            </div>
            <div class="col-xl-8">
                <div class="d-flex align-items-center">
                    <p class="fw-bold fs-5 mb-0"><?= $services[0]['title'] ?></p>
                    <span class="badge bg-primary badge-sm ms-4"><?= $category['category_name'] ?></span>
                </div>
                <div class="divider"></div>
                <p><?= $services[0]['description'] ?></p>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div>
            <form action="/orders/<?= $order['order_id'] ?>/update-services" method="POST">

                <div class="services-list">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <?php foreach ($services as $key => $service): ?>
                        <input type="hidden" name="order_service_id[<?= $key ?>]" value="<?= $service['order_service_id'] ?>">
                        <div class="row">
                            <div class="col-xl-4">
                                <img src="/uploads/<?= $service['order_image'] ?>" alt="">
                            </div>
                            <div class="col-xl-8">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="fw-bold fs-5 mb-0"><?= $service['title'] ?></p>
                                </div>
                                <div class="divider"></div>
                                <?php if ($service['order_detail']): ?>
                                    <p class="fw-bold mb-0">Kendala/Keluhan</p>
                                    <p><?= $service['order_detail'] ?></p>
                                <?php endif ?>

                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea class="form-control <?= ($validation->hasError('order_comment.' . $key)) ? 'is-invalid' : ''; ?>"
                                              placeholder="Isi Catatan disini... Cth: Produk dapat diperbaiki, Mohon menunggu sparepart"
                                              name="order_comment[<?= $key ?>]"><?= old('order_comment') ? old('order_comment')[$key] : $service['order_comment'] ?></textarea>
                                    <div class="invalid-feedback"><?= $validation->getError('order_comment.' . $key) ?></div>
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input name="price[<?= $key ?>]" type="number" step="1" min="0" class="form-control <?= ($validation->hasError('price.' . $key)) ? 'is-invalid' : ''; ?>" value="<?= old('price') ? old('price')[$key] : $service['price'] ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('price.' . $key) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                    <?php endforeach; ?>
                </div>

                <div class="text-sm-right">
                    <button type="button" class="btn btn-secondary btn-add-service" data-bs-target="#modal-service" data-bs-toggle="modal">+ Tambah Layanan Lainnya</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>


            <div class="modal fade" id="modal-service">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <form method="POST" action="/orders/<?= $order['order_id'] ?>/add-service" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Layanan</h5>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" value="<?= old('title') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control <?= ($validation->hasError('additional_description')) ? 'is-invalid' : ''; ?>"
                                              placeholder="Isi Deskripsi disini... Cth: Produk dapat diperbaiki, Mohon menunggu sparepart"
                                              name="additional_description"><?= old('additional_description') ?></textarea>
                                    <div class="invalid-feedback"><?= $validation->getError('additional_description') ?></div>
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input name="additional_price" type="number" step="1" min="0" class="form-control <?= ($validation->hasError('additional_price')) ? 'is-invalid' : ''; ?>" value="<?= old('additional_price') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('additional_price') ?></div>
                                </div>

                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input name="order_image" class="form-control <?= ($validation->hasError('order_image')) ? 'is-invalid' : ''; ?>" type="file">
                                    <div class="invalid-feedback"><?= $validation->getError('order_image') ?></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('custom-js') ?>
<script>
  $(function () {
    $('.btn-add-service').on('click', function () {
    })
  })
</script>
<?= $this->endSection() ?>
