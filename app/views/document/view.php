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
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="d-flex justify-content-center mt-5">
                    <?php
                    //read type file
                    $path = $data['view']['lokasi'] . '/' . $data['view']['file'];
                    $resultPath = pathinfo($path, PATHINFO_EXTENSION);
                    $resultPath;
                    ?>
                    <?php if ($resultPath == 'png' || $resultPath == 'jpg' || $resultPath == 'jpeg') : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center mt-3 mb-3">
                                    <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/image.png" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center mt-3 mb-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewerdoc">
                                        <i class="fa fa-eye"></i> Lihat..
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($resultPath == 'pdf') : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center mt-3 mb-3">
                                    <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/pdf.png" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center mt-3 mb-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewerdoc">
                                        <i class="fa fa-eye"></i> Lihat..
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($resultPath == 'docx' || $resultPath == 'doc') : ?>
                        <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/doc.png" class="img-fluid" />
                    <?php elseif ($resultPath == 'ppt' || $resultPath == 'pptx') : ?>
                        <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/ppt.png" class="img-fluid" />
                    <?php elseif ($resultPath == 'txt') : ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center mt-3 mb-3">
                                    <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/txt.png" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center mt-3 mb-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewerdoc">
                                        <i class="fa fa-eye"></i> Lihat..
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($resultPath == 'xlsx' || $resultPath == 'xls' || $resultPath == 'csv') : ?>
                        <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/xlsx.png" class="img-fluid" />
                    <?php else : ?>
                        <p>Not Data...</p>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-lg-8">
                <ul class="list-group list-group-flush" style="width:90%">
                    <li class="list-group-item">
                        <b>Detail Dokumen</b>
                    </li>
                    <li class="list-group-item">
                        <p>
                            Jenis Dokumen :
                            <?php echo $data['view']['jenis_dok']; ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p>
                            Nama Dokumen :
                            <?php echo $data['view']['nama']; ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p>
                            Deskripsi Dokumen :
                            <?php echo $data['view']['deskripsi']; ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p>
                            Ukuran Dokumen :
                            <?php
                            $size = $data['view']['ukuran_file'];
                            $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                            $power = $size > 0 ? floor(log($size, 1024)) : 0;
                            echo number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
                            ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p>
                            Tahun Ajran :
                            <?php echo $data['view']['tahun_ajaran']; ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p>
                            Tanggal Upload:
                            <?php echo $data['view']['tanggal_upload']; ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p>
                            Author:
                            <?php echo $data['view']['author']; ?>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--end Content-->

<!-- Modal -->

<?php if ($resultPath == 'png' || $resultPath == 'jpg' || $resultPath == 'jpeg') : ?>
    <div class="modal fade" id="viewerdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['view']['file']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <iframe src="<?php echo BASEURL; ?>/<?php echo $path ?>?page=hsn#toolbar=0" width="100%" height="780px" style="border: none;"></iframe>

                </div>
            </div>
        </div>
    </div>
<?php elseif ($resultPath == 'pdf') : ?>
    <div class="modal fade" id="viewerdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['view']['file']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <iframe src="<?php echo BASEURL; ?>/<?php echo $path ?>?page=hsn#toolbar=0" width="100%" height="780px" style="border: none;"></iframe>

                </div>
            </div>
        </div>
    </div>
<?php elseif ($resultPath == 'docx' || $resultPath == 'doc') : ?>
    <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/doc.png" class="img-fluid" />
<?php elseif ($resultPath == 'ppt' || $resultPath == 'pptx') : ?>
    <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/ppt.png" class="img-fluid" />
<?php elseif ($resultPath == 'txt') : ?>
    <div class="modal fade" id="viewerdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['view']['file']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <iframe src="<?php echo BASEURL; ?>/<?php echo $path ?>?page=hsn#toolbar=0" width="100%" height="780px" style="border: none;"></iframe>

                </div>
            </div>
        </div>
    </div>
<?php elseif ($resultPath == 'xlsx' || $resultPath == 'xls' || $resultPath == 'csv') : ?>
    <img width="200px" height="200px" src="<?php echo BASEURL; ?>/assets/icons/xlsx.png" class="img-fluid" />
<?php else : ?>
    <p>Not Data...</p>
<?php endif; ?>