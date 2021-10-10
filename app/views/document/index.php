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
        <!-- <div class="row">
            <div class="col-lg-12">
                <a href="#" type="button" data-toggle="modal" data-target="#uploadnewdokumen" class="btn btn-success uploadnewdokumen my-3">
                    <i class="fa fa-plus pr-2"></i>Buat Baru
                </a>
            </div>
        </div> -->
        <!--datatables-->
        <div class="row mt-3">
            <div class="col-lg-12">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nomor Dokumen</th>
                            <th>Jenis Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Tahun</th>
                            <th>Action</th>
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
                                        <?php echo substr($items['nama'], 0, 20) . '...'; ?>
                                    </td>
                                    <td>
                                        <?php echo $items['tahun_ajaran']; ?>
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <?php if ($_SESSION['role_id'] == 1) : ?>
                                            <a href="<?php echo BASEURL; ?>/document/download/<?= $items['no_dok'] ?>" type="button" class="btn btn-warning ml-3">Download</a>

                                            <a href="<?php echo BASEURL; ?>/document/viewDok/<?= $items['no_dok'] ?>" type="button" class="btn btn-success ml-3">View</a>

                                            <a href="<?php echo BASEURL; ?>/document/editDok/<?= $items['no_dok'] ?>" type="button" class="btn btn-primary ml-3">Edit</a>

                                            <a href="<?php echo BASEURL; ?>/document/delete/<?= $items['no_dok'] ?>" type="button" class="btn btn-danger ml-3" onclick="return confirm('Are Sure Delete This Data?');">Delete</a>
                                        <?php elseif ($_SESSION['role_id'] == 2) : ?>

                                            <a href="<?php echo BASEURL; ?>/document/download/<?= $items['no_dok'] ?>" type="button" class="btn btn-warning ml-3">Download</a>

                                            <a href="<?php echo BASEURL; ?>/document/viewDok/<?= $items['no_dok'] ?>" type="button" class="btn btn-success ml-3">View</a>

                                            <a href="<?php echo BASEURL; ?>/document/editDok/<?= $items['no_dok'] ?>" type="button" class="btn btn-primary ml-3">Edit</a>

                                            <a href="<?php echo BASEURL; ?>/document/delete/<?= $items['no_dok'] ?>" type="button" class="btn btn-danger ml-3" onclick="return confirm('Are Sure Delete This Data?');">Delete</a>
                                        <?php elseif ($_SESSION['role_id'] >= 3) : ?>
                                            <a href="<?php echo BASEURL; ?>/document/download/<?= $items['no_dok'] ?>" type="button" class="btn btn-warning ml-3">Download</a>

                                            <a href="<?php echo BASEURL; ?>/document/viewDok/<?= $items['no_dok'] ?>" type="button" class="btn btn-success ml-3">View</a>
                                        <?php else : ?>
                                            <p>Kamu tidak mempunyai role akses, silahkan tanyakan kepada team Admin...</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Data Not Found...</p>
                        <?php endif; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nomor Dokumen</th>
                            <th>Jenis Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Tahun</th>
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

<!-- Modal upload dokumen -->
<div class="modal fade" id="uploadnewdokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadnewdokumenlabel">Upload Dokumen...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?php echo BASEURL; ?>/document/create" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Jenis Dokumen</label>
                                <select name="jenis" class="form-control" required>
                                    <?php foreach ($data['jenis'] as $jeniss) : ?>
                                        <option value="<?= $jeniss['name']; ?>"><?= $jeniss['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label>Pilih Lokasi Penyimpanan</label>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Ruang</label>
                                        <select name="ruang" class="form-control" required>
                                            <?php foreach ($data['ruang'] as $ruangs) : ?>
                                                <option value="<?= $ruangs['cd_ruang']; ?>"><?= $ruangs['cd_ruang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Lemari</label>
                                        <select name="lemari" class="form-control" required>
                                            <?php foreach ($data['lemari'] as $lemaris) : ?>
                                                <option value="<?= $lemaris['cd_lemari']; ?>"><?= $lemaris['cd_lemari']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Rak</label>
                                        <select name="rak" class="form-control" required>
                                            <?php foreach ($data['rak'] as $raks) : ?>
                                                <option value="<?= $raks['cd_rak']; ?>"><?= $raks['cd_rak']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label>Box</label>
                                        <select name="box" class="form-control" required>
                                            <?php foreach ($data['box'] as $boxs) : ?>
                                                <option value="<?= $boxs['cd_box']; ?>"><?= $boxs['cd_box']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label>Map</label>
                                        <select name="map" class="form-control" required>
                                            <?php foreach ($data['map'] as $maps) : ?>
                                                <option value="<?= $maps['cd_map']; ?>"><?= $maps['cd_map']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <label>Urutan</label>
                                        <select name="urutan" class="form-control" required>
                                            <?php foreach ($data['urutan'] as $urutans) : ?>
                                                <option value="<?= $urutans['cd_urutan']; ?>"><?= $urutans['cd_urutan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label>Nama Dokumen</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Dokumen</label>
                                <textarea name="desc" class="form-control" required></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <label>Upload File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="myInput" aria-describedby="myInput">
                                        <label class="custom-file-label" for="myInput">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Akses Dokumen</label>
                                <select name="akses" class="form-control" required>
                                    <option value="1">Public</option>
                                    <option value="2">Private</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <select name="ajaran" class="form-control" required>
                                    <!?php
                                    for ($i = date("Y"); $i >= date("Y") - 32; $i -= 1) {
                                        echo "<option value='$i'> $i </option>";
                                    }
                                    ?>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("myInput").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>