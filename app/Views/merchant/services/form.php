<?= $this->extend('merchant/template') ?>
<?= $this->section('content') ?>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Services</h1>
</div>
<!-- PAGE-HEADER END -->
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/merchant/services/<?= @$service ? $service['service_id'] : '' ?>" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <?php if (@$service): ?>
                        <input type="hidden" name="_method" value="PUT">
                    <?php endif ?>

                    <div class="form-group">
                        <label>Judul</label>
                        <input name="title" type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" value="<?= old('title', @$service['title']) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" type="text" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>"><?= old('description', @$service['description']) ?></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('description') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category_id" class="form-control <?= ($validation->hasError('category_id')) ? 'is-invalid' : ''; ?>">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['category_id'] ?>"
                                    <?= old('category_id', @$service['category_id']) == $category['category_id'] ? 'selected' : '' ?>
                                >
                                    <?= $category['category_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('category_id') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Estimasi Harga</label>
                        <input name="estimated_price" type="number" step="1" min="0" class="form-control <?= ($validation->hasError('estimated_price')) ? 'is-invalid' : ''; ?>" value="<?= old('estimated_price', @$service['estimated_price']) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('estimated_price') ?></div>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input name="image" class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" type="file">
                        <div class="invalid-feedback"><?= $validation->getError('image') ?></div>
                    </div>

                    <!--                        <div class="form-group">-->
                    <!--                            <label>City</label>-->
                    <!--                            <input type="text" class="form-control is-invalid" required>-->
                    <!--                            <div class="invalid-feedback">Please provide a valid city.</div>-->
                    <!--                        </div>-->
                    <div class="text-sm-right">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
<?= $this->endSection() ?>
