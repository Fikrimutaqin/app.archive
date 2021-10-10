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
                <a href="<?php echo BASEURL; ?>/" type="button" class="btn btn-primary my-3">
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
                                        <form action="<?php echo BASEURL; ?>/users/update" method="post" enctype="multipart/form-data">
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
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Edit Profile
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

<script type="text/javascript">
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("myInput").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>