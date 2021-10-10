<!--SideBar-->
<div class="iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?php echo BASEURL; ?>/dashboard" class="header-logo">
            <img src="<?php echo BASEURL; ?>/assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
            <img src="<?php echo BASEURL; ?>/assets/images/logo-white.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="fa fa-bars fa-2x wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <div class="new-create select-dropdown input-prepend input-append">
            <div class="btn-group mb-3">
                <label data-toggle="dropdown">
                    <div class="search-query selet-caption">
                        <i class="fa fa-plus pr-2"></i>Buat Baru
                    </div>
                    <span class="search-replace"></span>
                    <span class="caret">
                        <!--icon-->
                    </span>
                </label>
                <ul class="dropdown-menu">
                    <?php if ($_SESSION['role_id'] == 1) : ?>
                        <li>
                            <a href="#" class="uploadNewTipeDokumen">
                                <div class="item">
                                    Tidak Ada Menu
                                </div>
                            </a>
                        </li>
                    <?php elseif ($_SESSION['role_id'] == 2) : ?>
                        <li>
                            <a href="#" class="uploadNewTipeDokumen" data-toggle="modal" data-target="#modalUploadTipeDokumen">
                                <div class="item">
                                    <i class="ri-file-add-line pr-2"></i> Jenis Dokumen
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" type="button" data-toggle="modal" data-target="#uploadnewdokumen">
                                <div class="item">
                                    <i class="ri-file-add-line pr-2"></i> Dokumen
                                </div>
                            </a>
                        </li>
                    <?php elseif ($_SESSION['role_id'] >= 3) : ?>
                        <li>
                            <a href="#" type="button" data-toggle="modal" data-target="#uploadnewdokumen">
                                <div class="item">
                                    <i class="ri-file-add-line pr-2"></i> Dokumen
                                </div>
                            </a>
                        </li>
                    <?php else : ?>
                        <p>
                            Kamu tidak mempunyai role akses, silahkan tanyakan kepada team Admin...
                        </p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <?php if ($_SESSION['role_id'] == 1) : ?>
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/dashboard" class="">
                            <i class="fas fa-home"></i>
                            <span>Beranda</span>
                        </a>
                        <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                    </li>
                    <!-- <li class="">
                        <a href="<?php echo BASEURL; ?>/document/listType" class="">
                            <i class="fas fa-stream"></i><span>Jenis Dokumen</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/document/list" class="">
                            <i class="fas fa-file"></i><span>Dokumen</span>
                        </a>
                    </li> -->
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/users/list" class="">
                            <i class="fas fa-users"></i><span>Users</span>
                        </a>
                    </li>
                    <!-- <li class="">
                        <a href="<?php echo BASEURL; ?>/report/index" class="">
                            <i class="fas fa-print"></i><span> Laporan</span>
                        </a>
                        <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                    </li> -->
                <?php elseif ($_SESSION['role_id'] == 2) : ?>
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/dashboard" class="">
                            <i class="fas fa-home"></i>
                            <span>Beranda</span>
                        </a>
                        <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                    </li>
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/document/listType" class="">
                            <i class="fas fa-stream"></i><span>Jenis Dokumen</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/document/list" class="">
                            <i class="fas fa-file"></i><span>Dokumen</span>
                        </a>
                    </li>
                    <!-- <li class="">
                        <a href="<?php echo BASEURL; ?>/users/list" class="">
                            <i class="fas fa-users"></i><span>Users</span>
                        </a>
                    </li> -->
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/report/index" class="">
                            <i class="fas fa-print"></i><span> Laporan</span>
                        </a>
                        <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                    </li>
                <?php elseif ($_SESSION['role_id'] >= 3) : ?>
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/dashboard" class="">
                            <i class="fas fa-home"></i>
                            <span>Beranda</span>
                        </a>
                        <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                    </li>
                    <li class="">
                        <a href="<?php echo BASEURL; ?>/document/list" class="">
                            <i class="fas fa-file"></i><span>Dokumen</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="sidebar-bottom">
            <h4 class="mb-3"><i class="far fa-cloud-upload-alt mr-2"></i>Storage</h4>
            <p style="color:#8f93f6; font-weight:bold;">
                Total : <?php echo $data['storage']; ?>
            </p>
        </div>
        <div class="p-3"></div>
    </div>
</div>
<!--End SideBar-->