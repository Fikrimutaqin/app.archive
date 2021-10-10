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
            <div class="col-lg-12">
                <a href="<?php echo BASEURL; ?>/document/listType" type="button" class="btn btn-primary my-3">
                    <i class="fa fa-chevron-circle-left"></i> Kembali
                </a>
            </div>
        </div>
        <!--datatables-->
        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?php echo BASEURL; ?>/document/updateType">
                            <div class="form-group">
                                <label>Jenis Dokumen :</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $data['edits']['name']; ?>" style="border-color: #8f93f6;" required>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $data['edits']['id']; ?>" style="border-color: #8f93f6;" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Jenis Dokumen :</label>
                                <textarea name="description" class="form-control" style="border-color: #8f93f6;" required><?php echo $data['edits']['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <?php if ($data['edits']['status'] == 1) : ?>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    <?php else : ?>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">Edit Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end datables-->
    </div>
</div>
</div>
<!--end Content-->