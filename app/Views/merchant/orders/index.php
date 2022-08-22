<?= $this->extend('merchant/template') ?>
<?= $this->section('content') ?>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Transaksi</h1>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <!--            <div class="card-header">-->
            <!--                    <h3 class="card-title">Basic Datatable</h3>-->
            <!--                    <div class="card-options">-->
            <!--                        <a href="/merchant/services/new" class="btn btn-primary btn-sm">Tambah Servis</a>-->
            <!--                    </div>-->
            <!--            </div>-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">No</th>
                            <th class="wd-15p border-bottom-0">Servis</th>
                            <th class="wd-20p border-bottom-0">Nama Customer</th>
                            <th class="wd-25p border-bottom-0">Kategori</th>
                            <th class="wd-25p border-bottom-0">Status</th>
                            <th class="wd-25p border-bottom-0">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $key => $order): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td>
                                    <div class="d-flex flex-wrap">
                                        <img src="/uploads/<?= $order['order_service']['order_image'] ?>" class="order-image me-4" alt="">
                                        <div class="">
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
                                </td>
                                <td><?= $order['name'] ?></td>
                                <td><?= $order['category']['category_name'] ?></td>
                                <td>
                                    <?php if ($order['status'] == 0): ?>
                                        Ditolak
                                    <?php elseif ($order['status'] == 1): ?>
                                        Pesanan Baru
                                    <?php elseif ($order['status'] == 2): ?>
                                        Diproses
                                    <?php elseif ($order['status'] == 3): ?>
                                        Menunggu Pembayaran
                                    <?php elseif ($order['status'] == 4): ?>
                                        Selesai
                                    <?php endif ?>
                                </td>
                                <td>
                                    <div class="d-flex flex-column align-items-start gap-1">
                                        <?php if ($order['status'] == 1): ?>
                                            <button class="btn btn-success process-order" data-id="<?= $order['order_id'] ?>" data-status="accept">Terima Pesanan</button>
                                            <button class="btn btn-danger process-order" data-id="<?= $order['order_id'] ?>" data-status="reject">Tolak Pesanan</button>
                                        <?php endif ?>
                                        <?php if ($order['status'] >= 2): ?>
                                            <a href="/orders/<?= $order['order_id'] ?>" class="btn btn-primary">Rincian Pesanan</a>
                                        <?php endif ?>
                                        <?php if ($order['status'] == 2): ?>
                                            <form action="/merchant/orders/<?= $order['order_id'] ?>/finish" method="POST">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="PATCH">
                                                <button type="submit" class="btn btn-success">Pesanan Selesai</button>
                                            </form>
                                        <?php endif ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->

<div class="modal fade" id="modal-order">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="status">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Terima Pesanan</h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Catatan (Opsional)</label>
                        <textarea name="order_comment" type="text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn">Pesan Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('custom-js') ?>
<script>
  $(function () {
    let modal = new bootstrap.Modal(document.getElementById('modal-order'))

    $('.process-order').on('click', function () {
      let status = $(this).data('status')
      let id = $(this).data('id')
      $('[name=status]').val(status)
      $('#modal-order .modal-title').html(status === 'accept' ? 'Terima Pesanan' : 'Tolak Pesanan')
      $('[name=order_comment]').val('')
      $('button[type=submit]')
        .removeClass('btn-success').removeClass('btn-danger')
        .addClass(status === 'accept' ? 'btn-success' : 'btn-danger')
        .html(status === 'accept' ? 'Terima' : 'Tolak')
      $('#modal-order form').attr('action', '/merchant/orders/' + id + '/process')
      modal.show()
    })
  })
</script>
<?= $this->endSection() ?>
