<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="page-header mt-0">
    <h1 class="page-title">Daftar Transaksi</h1>
</div>

<?php if (count($orders)): ?>
    <?php foreach ($orders as $key => $order): ?>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <p class="fw-bold"><?= $order['name'] ?></p>
                    <?php if ($order['status'] == 0): ?>
                        <span class="badge bg-danger badge-sm">Ditolak</span>
                    <?php elseif ($order['status'] == 1): ?>
                        <span class="badge bg-warning badge-sm">Menunggu Konfirmasi</span>
                    <?php elseif ($order['status'] == 2): ?>
                        <span class="badge bg-info badge-sm">Diproses</span>
                    <?php elseif ($order['status'] == 3): ?>
                        <span class="badge bg-info badge-sm">Menunggu Pembayaran</span>
                    <?php elseif ($order['status'] == 4): ?>
                        <span class="badge bg-success badge-sm">Selesai</span>
                    <?php endif ?>
                </div>

                <div class="d-flex">
                    <img src="/uploads/<?= $order['order_service']['order_image'] ?>" class="order-image" alt="">
                    <div class="ms-4">
                        <p class="fw-bold mb-0"><?= $order['order_service']['title'] ?> </p>
                        <?php if ($order['total_service'] > 1): ?>
                            <p class="fs-12 mb-2">+<?= $order['total_service'] - 1 ?> item lainnya</p>
                        <?php endif ?>
                        <p class="mb-0"><?= $order['order_service']['order_detail'] ?> </p>
                        <?php if ($order['order_service']['order_comment']): ?>
                            <div class="divider"></div>
                            <div class="fs-13">
                                <p class="mb-0">Catatan Penjual:</p>
                                <p><?= $order['order_service']['order_comment'] ?></p>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="ms-auto">
                        <p class="fw-bold fs-14">Rp <?= number_format($order['total_price']) ?></p>
                    </div>
                </div>

                <div class="text-sm-right">
                    <?php if ($order['status'] == 3): ?>
                        <a href="/my-order/<?= $order['order_id'] ?>/payment" class="btn btn-outline-primary">Konfirmasi Pembayaran</a>
                    <?php endif ?>
                    <a href="/my-order/<?= $order['order_id'] ?>" class="btn btn-primary">Lihat Detail Transaksi</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php else: ?>
    <div class="text-center">
        <p class="text-center">Belum ada Transaksi</p>
        <a class="btn btn-primary" href="/services">Mulai bertransaksi sekarang</a>
    </div>
<?php endif ?>

<?= $this->endSection() ?>
