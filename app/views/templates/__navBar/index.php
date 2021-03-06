<!--navBar-->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="<?php echo BASEURL; ?>" class="header-logo">
                    <h2>Citra Bangsa</h2>
                </a>
            </div>
            <div class="iq-search-bar device-search">
                <!-- <form>
                    <div class="input-prepend input-append">
                        <div class="btn-group">
                            <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                                <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Type here to search..."><span class="search-replace"></span>
                                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                <span class="caret">
                                   
                                </span>
                            </label>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <div class="item">
                                            <i class="far fa-file-pdf bg-info"></i>
                                            PDFs
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="item">
                                            <i class="far fa-file-alt bg-primary"></i>
                                            Documents
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="item">
                                            <i class="far fa-file-excel bg-success"></i>
                                            Spreadsheet
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="item">
                                            <i class="far fa-file-powerpoint bg-danger"></i>
                                            Presentation
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="item">
                                            <i class="far fa-file-image bg-warning"></i>
                                            Photos & Images
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="item">
                                            <i class="far fa-file-video bg-info"></i>
                                            Videos
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form> -->
            </div>
            <div class="d-flex align-items-center">
                <div class="change-mode">
                    <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                        <div class="custom-switch-inner">
                            <p class="mb-0"> </p>
                            <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                            <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                <span class="switch-icon-left"><i class="a-left"></i></span>
                                <span class="switch-icon-right"><i class="a-right"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </a>
                            <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                <form action="#" class="searchbox p-2">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                        <a href="#" class="search-link"><i class="las la-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton02">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="p-3 text-left">
                                            <a href="<?php echo BASEURL; ?>/users/editProfile/<?php echo $_SESSION['email']; ?>" class="iq-sub-card pt-0">
                                                <i class="fas fa-user"></i> Edit Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="caption bg-primary line-height">
                                    <?php echo substr($_SESSION['first_name'], 0, 1); ?>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                <div class="card mb-0">
                                    <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">Profile</h4>
                                        </div>
                                        <div class="close-data text-right badge badge-primary cursor-pointer ">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-header">
                                            <div class="cover-container text-center">
                                                <div class="rounded-circle profile-icon bg-primary mx-auto d-block">
                                                    <?php echo substr($_SESSION['first_name'], 0, 1); ?>
                                                </div>
                                                <div class="profile-detail mt-3">
                                                    <h5>
                                                        <?php echo $_SESSION['first_name']; ?>
                                                    </h5>
                                                    <p>
                                                        <?php echo $_SESSION['email']; ?>
                                                    </p>
                                                </div>
                                                <a href="<?php echo BASEURL; ?>/login/_logout" class="btn btn-primary">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--End navBar-->