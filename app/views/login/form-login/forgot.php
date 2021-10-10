<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="py-3 text-center">Ubah Password</h4>
                    <form action="<?php echo BASEURL; ?>/Login/changePassword" method="post">

                        <div class="form-group">
                            <label>Password Baru :</label>
                            <input type="hidden" class="form-control" name="users_id" value="<?php echo $data['view']['users_id'] ?>">
                            <input type="password" class="form-control" name="newpass" placeholder="Masukan Password Lama Kamu...">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">
                                Ubah Password
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>