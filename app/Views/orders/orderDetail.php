<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

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
        <div class="text-sm-right mb-2">
            <?php if ($order['status'] == 0): ?>
                <span class="badge bg-primary badge-sm">Ditolak</span>
            <?php elseif ($order['status'] == 1): ?>
                <span class="badge bg-primary badge-sm">Pesanan Baru</span>
            <?php elseif ($order['status'] == 2): ?>
                <span class="badge bg-primary badge-sm">Diproses</span>
            <?php elseif ($order['status'] == 3): ?>
                <span class="badge bg-primary badge-sm">Menunggu Pembayaran</span>
            <?php elseif ($order['status'] == 4): ?>
                <span class="badge bg-primary badge-sm">Selesai</span>
            <?php endif ?>
        </div>
        <div class="panel panel-primary">
            <div class="tab-menu-heading">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li><a href="#detail" class="active" data-bs-toggle="tab">Rincian Transaksi</a></li>
                        <li><a href="#update" data-bs-toggle="tab">Update</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="detail">
                        <?php if (session()->get('user')['role'] == 'merchant' && $order['status'] >= 1 && $order['status'] <= 2): ?>
                            <div class="text-sm-right">
                                <a href="/orders/<?= $order['order_id'] ?>/edit" class="btn btn-primary mb-4">Ubah Rincian / Tambah Layanan</a>
                            </div>
                        <?php endif ?>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total Pembayaran</span>
                            <span class="text-gray">Rp <?= number_format($order['total_price']) ?></span>
                        </div>
                        <div class="divider"></div>
                        <?php foreach ($services as $key => $service): ?>
                            <div class="row">
                                <div class="col-xl-4">
                                    <img src="/uploads/<?= $service['order_image'] ?>" alt="">
                                </div>
                                <div class="col-xl-8">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="fw-bold fs-5 mb-0"><?= $service['title'] ?></p>
                                        <p class="fs-6 fw-bold mb-0 text-gray">Rp <?= number_format($service['price']) ?></p>
                                    </div>
                                    <div class="divider"></div>
                                    <p class="fw-bold mb-0">Kendala/Keluhan</p>
                                    <p><?= $service['order_detail'] ?></p>
                                </div>
                            </div>
                            <?php if ($key != count($services) - 1): ?>
                                <div class="divider my-6"></div>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab-pane" id="update">
                        <div class="main-content-app pt-0">
                            <div class="main-content-body main-content-body-chat h-100">
                                <div class="main-chat-body flex-2 ps ps--active-y" id="ChatBody">
                                    <div class="content-inner">
                                        <?php foreach ($updates as $key => $update): ?>
                                            <?php if (!$update['sender_id'] && !$update['receiver_id']): ?>
                                                <label class="main-chat-time fs-14">
                                                    <div><?= date("Y-m-d H:m", strtotime($update['created_at'])) ?></div>
                                                </label>
                                                <p class="text-center fw-bold fs-14"><?= $update['description'] ?></p>
                                            <?php else: ?>
                                                <div class="media <?= $update['sender_id'] == session()->get('user')['user_id'] ? 'flex-row-reverse chat-right' : 'chat-left' ?>">
                                                    <div class="media-body">
                                                        <div class="main-msg-wrapper">
                                                            <?= $update['description'] ?>
                                                        </div>
                                                        <div>
                                                            <span><?= date("H:m", strtotime($update['created_at'])) ?></span> <a href="javascript:void(0)"><i class="icon ion-android-more-horizontal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 578px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 297px;"></div>
                                    </div>
                                </div>
                                <form action="/orders/<?= $order['order_id'] ?>/chat" method="POST" class="main-chat-footer" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <input name="description" class="form-control" placeholder="Type your message here..." type="text">
                                    <input type="file" class="d-none">
                                    <button type="submit" class="btn btn-icon  btn-primary brround"><i class="fe fe-send"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('custom-js') ?>
<script src="/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="/assets/plugins/p-scroll/pscroll.js"></script>
<script src="/assets/plugins/p-scroll/pscroll-1.js"></script>

<!-- Internal Chat js-->
<script src="/assets/js/chat.js"></script>
<?= $this->endSection() ?>
