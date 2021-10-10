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
                <a href="<?php echo BASEURL; ?>/document/list" type="button" class="btn btn-primary my-3">
                    <i class="fa fa-chevron-circle-left"></i> Kembali
                </a>
            </div>
        </div>
        <!--datatables-->
        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?php echo BASEURL; ?>/document/update" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="no_dok" class="form-control" value="<?php echo $data['edits']['no_dok']; ?>">
                                <input type="hidden" name="file_old" class="form-control" value="<?php echo $data['edits']['file']; ?>">
                                <input type="hidden" name="type_old" class="form-control" value="<?php echo $data['edits']['type_file']; ?>">
                                <input type="hidden" name="ukuran_old" class="form-control" value="<?php echo $data['edits']['ukuran_file']; ?>">
                                <label>Jenis Dokumen</label>
                                <select class="form-control" name="jenis">
                                    <?php foreach ($data['jenis'] as $jeniss) : ?>
                                        <?php if ($data['edits']['jenis_dok'] == $jenis['name']) : ?>
                                            <option selected value="<?php echo $data['edits']['jenis_dok']; ?>">
                                                <?php echo $data['edits']['jenis_dok']; ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?php echo $jeniss['name']; ?>">
                                                <?php echo $jeniss['name']; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Dokumen</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $data['edits']['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Dokumen</label>
                                <textarea class="form-control" name="deskripsi"><?php echo $data['edits']['deskripsi']; ?>
                                </textarea>
                            </div>
                            <div class="input-group mb-3">
                                <label>Upload File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="myInput" aria-describedby="myInput">
                                        <label class="custom-file-label" for="myInput">
                                            <?php echo $data['edits']['file']; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Akses Dokumen</label>
                                <select class="form-control" name="akses" id="status">
                                    <?php if ($data['edits']['akses'] == 1) : ?>
                                        <option value="<?php echo $data['edits']['akses']; ?>">
                                            Public
                                        </option>
                                        <option value="2">Private</option>
                                    <?php elseif ($data['edits']['akses'] == 2) : ?>
                                        <option value="<?php echo $data['edits']['akses']; ?>">
                                            Private
                                        </option>
                                        <option value="1">Public</option>
                                    <?php else : ?>
                                        <option value="1">Public</option>
                                        <option value="2">Private</option>
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
<script type="text/javascript">
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("myInput").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>