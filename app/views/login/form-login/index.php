<div class="fixed-bottom">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
</div>
<div class="wrapper">
    <section class="login-content">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center height-self-center">
                <div class="col-md-5 col-sm-12 col-12 align-self-center">
                    <div class="sign-user_card">
                        <img src="<?php echo BASEURL; ?>/assets/images/logo-new.png" class="img-fluid rounded-normal light-logo logo" alt="logo">
                        <img src="<?php echo BASEURL; ?>/assets/images/logo-new.png" class="img-fluid rounded-normal darkmode-logo logo" alt="logo">
                        <h3 class="mb-3">Sign In</h3>
                        <p>Login to stay connected.</p>
                        <form action="<?php echo BASEURL; ?>/Login/postLogin" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input name="email" id="email" class="floating-input form-control" type="email" placeholder=" ">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input name="password" id="password" class="floating-input form-control" type="password" placeholder=" ">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <a href="#" class="text-primary float-center" data-toggle="modal" data-target="#forgotpassword">Forgot Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-login">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
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
                                    Forgot Password
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>