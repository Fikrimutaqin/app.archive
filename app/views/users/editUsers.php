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
                <a href="<?php echo BASEURL; ?>/users/list" type="button" class="btn btn-primary my-3">
                    <i class="fa fa-chevron-circle-left"></i> Kembali
                </a>
            </div>
        </div>
        <!--datatables-->
        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row my-5">
                                    <div class="col-lg-3">
                                        <div class="img-thumbnail img-rounded">
                                            <img class="img-fluid" src="<?php echo BASEURL; ?>/assets/images/user/<?php echo $data['view']['thumbnail']; ?>" alt="<?php echo $data['view']['thumbnail']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <form action="<?php echo BASEURL; ?>/Users/updateUsers" method="post" enctype="multipart/form-data">
                                            <input type="hidden" class="form-control" name="users_id" value="<?php echo $data['view']['users_id']; ?>">
                                            <input type="hidden" class="form-control" name="old_thumbnail" value="<?php echo $data['view']['thumbnail']; ?>">
                                            <div class="form-group">
                                                <label>First Name :</label>
                                                <input type="text" class="form-control" name="first_name" value="<?php echo $data['view']['first_name']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Last Name :</label>
                                                <input type="text" class="form-control" name="last_name" value="<?php echo $data['view']['last_name']; ?>">
                                            </div>

                                            <div class="input-group mb-3">
                                                <label>Change Thumbnail</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="thumbnail" class="custom-file-input" id="myInput" aria-describedby="myInput">
                                                        <label class="custom-file-label" for="myInput">
                                                            <?php echo $data['view']['thumbnail']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Role</label>
                                                <select class="form-control" name="role">
                                                    <?php foreach ($data['role'] as $rols) : ?>
                                                        <?php if ($data['view']['role_id'] == $rols['role_id']) : ?>
                                                            <option selected value="<?= $rols['role_id']; ?>">
                                                                <?= $rols['users']; ?>
                                                            </option>
                                                        <?php else : ?>
                                                            <option value="<?= $rols['role_id']; ?>">
                                                                <?= $rols['users']; ?>
                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Is Active</label>
                                                <select class="form-control" name="is_active">
                                                    <?php if ($data['view']['is_active'] == 1) : ?>
                                                        <option selected value="1">
                                                            <?php echo "Active"; ?>
                                                        </option>
                                                        <option value="2">
                                                            <?php echo "InActive"; ?>
                                                        </option>
                                                    <?php elseif ($data['view']['is_active'] == 2) : ?>
                                                        <option selected value="2">
                                                            <?php echo "InActive"; ?>
                                                        </option>
                                                        <option value="2">
                                                            <?php echo "Active"; ?>
                                                        </option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Edit Users
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#forgotpassword">
                                                    Edit Password
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end datables-->
    </div>
</div>
</div>
<!--end Content-->


<!-- Modal -->
<div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo BASEURL; ?>/login/forgot" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" class="form-control">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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