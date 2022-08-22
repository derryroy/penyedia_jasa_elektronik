<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-primary text-center">
                    Lakukan transfer ke <span class="fw-bold">Bank BCA 123 4567 8900 0987</span>
                </div>
                <div class="divider"></div>
                <form action="/my-order/<?= $order['order_id'] ?>/payment" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <p class="fw-bold fs-16">Konfirmasi Pembayaran</p>
                    <div class="form-group">
                        <label>Nama Pemilik Rekening</label>
                        <input name="payment_name" type="text" class="form-control <?= ($validation->hasError('payment_name')) ? 'is-invalid' : ''; ?>" value="<?= old('payment_name') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('payment_name') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input name="payment_number" type="text" class="form-control <?= ($validation->hasError('payment_number')) ? 'is-invalid' : ''; ?>" value="<?= old('payment_number') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('payment_number') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input name="payment_bank" type="text" class="form-control <?= ($validation->hasError('payment_bank')) ? 'is-invalid' : ''; ?>" value="<?= old('payment_bank') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('payment_bank') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <input name="payment_file" class="form-control <?= ($validation->hasError('payment_file')) ? 'is-invalid' : ''; ?>" type="file">
                        <div class="invalid-feedback"><?= $validation->getError('payment_file') ?></div>
                    </div>

                    <div class="text-sm-right">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <?php foreach ($services as $key => $service): ?>
                    <div class="d-flex">
                        <?php if ($service['order_image']): ?>
                            <img src="/uploads/<?= $service['order_image'] ?>" class="order-image" alt="">
                        <?php endif ?>
                        <div class="ms-4">
                            <p class="fw-bold mb-1"><?= $service['title'] ?> </p>
                            <p class="mb-0"><?= $service['order_detail'] ?> </p>
                            <?php if ($service['order_comment']): ?>
                                <div class="fs-13">
                                    <p class="mb-0">Catatan Penjual:</p>
                                    <p><?= $service['order_comment'] ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <p class="fw-bold text-sm-right fs-14 mt-2 mb-0">Rp <?= number_format($service['price']) ?></p>
                    <div class="divider"></div>
                <?php endforeach; ?>
                <div class="d-flex justify-content-between fw-bold">
                    <span>Total Pembayaran</span>
                    <span class="text-gray">Rp <?= number_format($order['total_price']) ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
