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
                <a href="<?php echo BASEURL; ?>/storage/list" type="button" class="btn btn-primary my-3">
                    <i class="fa fa-chevron-circle-left"></i> Kembali
                </a>
            </div>
        </div>
        <!--datatables-->
        <div class="row mt-3">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name Penyimpanan</th>
                            <th scope="col">Total Penyimpanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><?php echo $data['views']['name']; ?></th>
                            <td>
                                <button type="button" class="btn btn-primary">
                                    Ruang
                                    <span class="badge badge-light">
                                        <?php echo $data['cRuang']['num']; ?>
                                    </span>
                                </button>
                                /
                                <button type="button" class="btn btn-primary">
                                    Lemari
                                    <span class="badge badge-light">
                                        <?php echo $data['cLemari']['num']; ?>
                                    </span>
                                </button>
                                /
                                <button type="button" class="btn btn-primary">
                                    Rak
                                    <span class="badge badge-light">
                                        <?php echo $data['cRak']['num']; ?>
                                    </span>
                                </button>
                                /
                                <button type="button" class="btn btn-primary">
                                    Box
                                    <span class="badge badge-light">
                                        <?php echo $data['cBox']['num']; ?>
                                    </span>
                                </button>
                                /
                                <button type="button" class="btn btn-primary">
                                    Map
                                    <span class="badge badge-light">
                                        <?php echo $data['cMap']['num']; ?>
                                    </span>
                                </button>
                                /
                                <button type="button" class="btn btn-primary">
                                    Urutan
                                    <span class="badge badge-light">
                                        <?php echo $data['cUrutan']['num']; ?>
                                    </span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end datables-->
    </div>
</div>
</div>
<!--end Content-->