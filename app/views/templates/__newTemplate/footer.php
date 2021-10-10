</div>

<!-- Wrapper End-->
<footer class="mb-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                Copyright 2021 <a href="#">CloudBOX</a> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>

<!-- Backend Bundle JavaScript -->
<script src="<?php echo BASEURL; ?>/assets/js/backend-bundle.min.js"></script>

<!-- Chart Custom JavaScript -->
<script src="<?php echo BASEURL; ?>/assets/js/customizer.js"></script>

<!-- Chart Custom JavaScript -->
<script src="<?php echo BASEURL; ?>/assets/js/chart-custom.js"></script>

<script src="<?php echo BASEURL; ?>/assets/js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/0d39b4ddaa.js" crossorigin="anonymous"></script>
<script src="<?php echo BASEURL ?>/dist/js/script.js?v=<?php echo rand(); ?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sp-1.3.0/datatables.min.js"></script>



<!-- Modal Add Folder-->
<div class="modal fade" id="modalUploadFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlecreatefolder">Penyimpanan...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASEURL; ?>/storage/create" method="post" class="form-upload">
                    <div class="newCreateFolder">
                        <div class="row fieldGroup">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Total Penyimpanan :</label>
                                    <input type="number" name="total" class="form-control" placeholder="Masukan total penyimpanan max 5" style="border-color: #8f93f6;" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success addInputCategory"><i class="fas fa-plus"></i> Sub Folder</button> -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Type Document-->
<div class="modal fade" id="modalUploadTipeDokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titlecreatefolder">Jenis Dokumen...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASEURL; ?>/document/type" method="post" class="form-upload">
                    <div class="newCreateFolder">
                        <div class="row fieldGroup">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Jenis Dokumen :</label>
                                    <input type="text" name="jenis" class="form-control" placeholder="Masukan jenis dokumen" style="border-color: #8f93f6;" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Jenis Dokumen :</label>
                                    <textarea name="desc" class="form-control" placeholder="Masukan deskripsi dokumen" style="border-color: #8f93f6;" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success addInputCategory"><i class="fas fa-plus"></i> Sub Folder</button> -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>

</html>