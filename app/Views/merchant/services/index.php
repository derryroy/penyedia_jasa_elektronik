<?= $this->extend('merchant/template') ?>
<?= $this->section('content') ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Services</h1>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
<!--                    <h3 class="card-title">Basic Datatable</h3>-->
                    <div class="card-options">
                        <a href="/merchant/services/new" class="btn btn-primary btn-sm">Tambah Servis</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">No</th>
                                <th class="wd-15p border-bottom-0">Judul</th>
                                <th class="wd-20p border-bottom-0">Estimasi Harga</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-25p border-bottom-0">Category</th>
                                <th class="wd-25p border-bottom-0">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($services as $key => $service): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $service['title'] ?></td>
                                    <td><?= $service['estimated_price'] ?></td>
                                    <td><img style="height: 100px;width: 100px;object-fit: cover" src="/uploads/<?= $service['image']  ?>" alt=""></td>
                                    <td><?= $service['category_name'] ?></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="/merchant/services/<?= $service['service_id'] ?>/edit" class="btn btn-warning-light"><i class="fe fe-edit"></i></a>
                                            <form method="POST" action="/merchant/services/<?= $service['service_id'] ?>">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <button type="submit" class="btn btn-danger-light"><i class="fe fe-trash-2"></i></button>
                                            </form>
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
<?= $this->endSection() ?>
