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
        <div class="row mb-3">
            <div class="col-lg-12"><label class="text-bold">Filer dan cari</label></div>
            <div class="col-lg-12">
                <form action="<?php echo BASEURL; ?>/report/search" method="post">
                    <div class="form-group form-inline">

                        <label class="ml-3">Dari Tanggal:</label>
                        <input type="date" name="d_start" id="d_start" class="form-control ml-3" style="border: 1px solid #8f93f6;">

                        <label class="ml-3">Sampai Tanggal:</label>
                        <input type="date" name="d_end" id="d_end" class="form-control ml-3" style="border: 1px solid #8f93f6;">

                        <button type="submit" class="btn btn-primary ml-3">Search</button>

                    </div>
                </form>
            </div>
        </div>
        <!--datatables-->
        <div class="row mt-3">
            <div class="col-lg-12">
                <table id="table-report" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nomor Dokumen</th>
                            <th>Jenis Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Tanggal</th>
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['view'])) : ?>
                            <?php foreach ($data['view'] as $items) : ?>
                                <tr>
                                    <td>
                                        <?php echo "D" . $items['no_dok']; ?>
                                    </td>
                                    <td>
                                        <?php echo $items['jenis_dok']; ?>
                                    </td>
                                    <td>
                                        <?php echo $items['nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($items['tanggal_upload'])); ?>
                                    </td>
                                    <td>
                                        <?php foreach ($data['users'] as $users) : ?>
                                            <?php if ($items['author'] == $users['email']) : ?>
                                                <?php echo $users['first_name'] . ' ' . $users['last_name']; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Data Not Found...</p>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end datables-->
    </div>
</div>
</div>
<!--end Content-->