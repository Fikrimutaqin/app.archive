<!--content-->
<div class="content-page">
    <div class="fixed-bottom">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-transparent card-block card-stretch card-height mb-3">
                    <div class="d-flex justify-content-between">
                        <div class="select-dropdown input-prepend input-append">
                            <h5 class="card-title"><?php echo $data['title']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title ">
                            <?php foreach ($data['cRuang'] as $ruangs) : ?>
                                <?php echo $ruangs['num']; ?>
                            <?php endforeach ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Data Ruang</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title ">
                            <?php foreach ($data['cLemari'] as $lemaris) : ?>
                                <?php echo $lemaris['num']; ?>
                            <?php endforeach ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Data Lemari</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title ">
                            <?php foreach ($data['cRak'] as $raks) : ?>
                                <?php echo $raks['num']; ?>
                            <?php endforeach ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Data Rak</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title ">
                            <?php foreach ($data['cBox'] as $boxs) : ?>
                                <?php echo $boxs['num']; ?>
                            <?php endforeach ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Data Box</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title ">
                            <?php foreach ($data['cMap'] as $maps) : ?>
                                <?php echo $maps['num']; ?>
                            <?php endforeach ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Data Map</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title ">
                            <?php foreach ($data['cUrutan'] as $uruts) : ?>
                                <?php echo $uruts['num']; ?>
                            <?php endforeach ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Data Urutan</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="#" type="button" data-toggle="modal" data-target="#modalUploadFolder" class="btn btn-success uploadNewFolder my-3">
                    <i class="fa fa-plus pr-2"></i>Buat Baru
                </a>
            </div>
        </div>
        <!--datatables-->
        <div class="row mt-3">
            <div class="col-lg-12">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['view'])) : ?>
                            <?php foreach ($data['view'] as $items) : ?>
                                <tr class="w-100">
                                    <td class="w-75"><?= $items['name']; ?></td>
                                    <td class="d-flex justify-content-end">
                                        <a href="<?php echo BASEURL; ?>/storage/edit/<?= $items['cd_storage']; ?>" type="button" class="btn btn-primary ml-3">Edit</a>

                                        <a href="<?php echo BASEURL; ?>/storage/views/<?= $items['cd_storage']; ?>" type="button" class="btn btn-info ml-3">View</a>

                                        <a href="<?php echo BASEURL; ?>/storage/delete/<?= $items['cd_storage']; ?>" type="button" class="btn btn-danger ml-3" onclick="return confirm('Are Sure Delete This Data?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Data Not Found...</p>
                        <?php endif; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!--end datables-->
    </div>
</div>
</div>
<!--end Content-->