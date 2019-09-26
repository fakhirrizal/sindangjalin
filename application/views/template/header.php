<?php
if(($this->session->userdata('id'))==NULL AND $this->session->userdata('level')=='admin'){
	echo "<script>alert('Harap login terlebih dahulu')</script>";
	echo "<script>window.location='".base_url()."admin/'</script>";
}
else{
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content='"Sindangjalin" (Sistem Informasi Persidangan dan Perjalanan Dinas) adalah aplikasi yang dibangun untuk memberikan kemudahan dalam pengelolaan data dan penyajian informasi kegiatan Persidangan dan perjalanan Dinas Dewan Perwakilan Raktyat Daerah Kota Semarang.' name="description" />
        <meta content="DPRD Kota Semarang" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
		<link href="<?=base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/morris/morris.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/fullcalendar/fullcalendar.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/jqvmap/jqvmap/jqvmap.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url('assets/global/css/components.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets/global/css/plugins.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/global/plugins/datatables/datatables.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=base_url('assets/layouts/layout/css/layout.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/layouts/layout/css/themes/darkblue.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=base_url('assets/layouts/layout/css/custom.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?=base_url('assets/hai.ico');?>" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo" style="text-align: center;">
                    <a href="#">
                        <!-- <img src="<?=base_url()?>assets/sindangjalin.png" width='150' height="50" alt="logo" class="logo-default" /> --> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <?php
                            $notif = $this->Master_model->notif_jaldis();
                            ?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default"> <?= count($notif); ?> </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold"><?= count($notif); ?> hasil JalDis</span> belum ditambahkan</h3>
                                  
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <?php
                                        foreach ($notif as $key => $value) {
                                        echo '
                                        <li>
                                            <a href="'.base_url().'Master/notulen/'.$value->kode_jaldis.'">
                                                <span class="time">'.date('d-m-Y', strtotime($value->end_date)).'</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> '.$value->tujuan.' </span>
                                            </a>
                                        </li>';
                                        }
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <?php
                            $notif = $this->Rapat_model->notif_rapat();
                            ?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-default"> <?= count($notif); ?> </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold"><?= count($notif); ?> kesimpulan Rapat</span> belum ditambahkan</h3>
                                 
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <?php
                                        foreach ($notif as $key => $value) {
                                        echo '
                                        <li>
                                            <a href="'.base_url().'Rapat/hasil_rapat/'.$value->id.'">
                                                <span class="time">'.date('d-m-Y', strtotime($value->tanggal_selesai)).'</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> '.$value->acara.' </span>
                                            </a>
                                        </li>';
                                        }
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                
                                <?php
                                $q = "SELECT * from user where id='".$this->session->userdata('id')."'";
                                $data = $this->User_model->manualQuery($q)->result();
                                    foreach ($data as $key => $value) {
                                        if(!empty($value->foto)){
                                            echo '<img src="'.base_url('assets/global/img/profile/').$value->foto.'" class="img-circle" alt="">';
                                        }
                                        else{
                                            echo '<img src="'.base_url('assets/global/img/file_1509643007.png').'" class="img-circle" alt="">';
                                        }
                                    }
                                ?>
                                <span class="username username-hide-on-mobile"> <?= $this->session->userdata('username') ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo site_url('User/profil'); ?>">
                                        <i class="icon-user"></i> Pengaturan Akun </a>
                                </li>
                              
                                <li>
                                    <a href="<?php echo site_url('Master/bantuan'); ?>">
                                        <i class="icon-rocket"></i> Bantuan
                                        
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                
                                <li>
                                    <a href="<?php echo site_url('User/keluar'); ?>">
                                        <i class="icon-key"></i> Keluar </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                       
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item <?php if($active=='beranda'){echo 'start active open';}else{echo '';} ?> ">
                            <a href="<?php echo site_url('User/beranda'); ?>" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Beranda</span>
                                <?php if($active=='beranda'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                        </li>
                       
                        <li class="heading">
                            <h3 class="uppercase">Menu</h3>
                        </li>
                        <li class="nav-item <?php if($active=='master'){echo 'active open';}else{echo '';} ?> ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Master</span>
                                <?php if($active=='master'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                <span class="arrow <?php if($active=='master'){echo 'open';}else{echo '';} ?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($sub=='anggota'){echo 'active open';}else{echo '';} ?> ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Anggota</span>
                                        <?php if($sub=='anggota'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                        <span class="arrow <?php if($sub=='anggota'){echo 'open';}else{echo '';} ?>"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item <?php if($sub2=='tambah_data'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Anggota/tambah_data'); ?>" class="nav-link">Tambah Data Dewan</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='tambah_setwan'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Anggota/tambah_setwan'); ?>" class="nav-link">Tambah Data Setwan</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='lihat_data'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Anggota/lihat_data'); ?>" class="nav-link">Lihat Data</a>
                                        </li>
                                    </ul>
                                </li> 
                                <li class="nav-item <?php if($sub=='skpd'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Master/skpd'); ?>" class="nav-link ">
                                        <span class="title">SKPD</span>
                                        <?php if($sub=='skpd'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>  
                                <li class="nav-item <?php if($sub=='alat_kelengkapan'){echo 'active open';}else{echo '';} ?> ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Alat Kelengkapan</span>
                                        <?php if($sub=='alat_kelengkapan'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                        <span class="arrow <?php if($sub=='alat_kelengkapan'){echo 'open';}else{echo '';} ?>"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item <?php if($sub2=='pimpinan'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Master/pimpinan'); ?>" class="nav-link">Pimpinan</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='komisi'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Master/lihat_komisi'); ?>" class="nav-link">Komisi</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='pansus'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Master/lihat_pansus'); ?>" class="nav-link">Pansus</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='badan'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Master/lihat_badan'); ?>" class="nav-link">Badan</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='panja'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Master/lihat_panja'); ?>" class="nav-link">Panja</a>
                                        </li>
                                    </ul>
                                </li> 
                                <li class="nav-item <?php if($sub=='partai'){echo 'active open';}else{echo '';} ?> ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Partai</span>
                                        <?php if($sub=='partai'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                        <span class="arrow <?php if($sub=='partai'){echo 'open';}else{echo '';} ?>"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item <?php if($sub2=='tambah_data'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Master/tambah_partai'); ?>" class="nav-link">Tambah Data</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='lihat_data'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Master/lihat_partai'); ?>" class="nav-link">Lihat Data</a>
                                        </li>
                                    </ul>
                                </li>      
                                <li class="nav-item <?php if($sub=='nomor_surat'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Master/nomor_surat'); ?>" class="nav-link ">
                                        <span class="title">Nomor Surat</span>
                                        <?php if($sub=='nomor_surat'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='kode_rekening'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Master/kode_rekening'); ?>" class="nav-link ">
                                        <span class="title">Kode Rekening</span>
                                        <?php if($sub=='kode_rekening'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>  
                                <li class="nav-item <?php if($sub=='kategori_keperluan'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Master/kategori_keperluan'); ?>" class="nav-link ">
                                        <span class="title">Kategori Keperluan</span>
                                        <?php if($sub=='kategori_keperluan'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>                                              
                            </ul>
                        </li>
                        <li class="nav-item <?php if($active=='rapat'){echo 'start active open';}else{echo '';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Rapat</span>
                                <?php if($active=='rapat'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                <span class="arrow <?php if($active=='rapat'){echo 'open';}else{echo '';} ?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($sub=='tambah_data'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Rapat/tambah_data'); ?>" class="nav-link ">
                                        <span class="title">Tambah Data</span>
                                        <?php if($sub=='tambah_data'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='lihat_data'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Rapat/lihat_data'); ?>" class="nav-link ">
                                        <span class="title">Lihat Data</span>
                                        <?php if($sub=='lihat_data'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='timeline'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Rapat/timeline_calendar'); ?>" class="nav-link ">
                                        <span class="title">Timeline</span>
                                        <?php if($sub=='timeline'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if($active=='agenda'){echo 'start active open';}else{echo '';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-notebook"></i>
                                <span class="title">Agenda</span>
                                <?php if($active=='rapat'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                <span class="arrow <?php if($active=='agenda'){echo 'open';}else{echo '';} ?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($sub=='tambah_data'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Agenda/tambah_data'); ?>" class="nav-link ">
                                        <span class="title">Tambah Data</span>
                                        <?php if($sub=='tambah_data'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='lihat_data'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Agenda/lihat_data'); ?>" class="nav-link ">
                                        <span class="title">Lihat Data</span>
                                        <?php if($sub=='lihat_data'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='timeline'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Agenda/timeline_calendar'); ?>" class="nav-link ">
                                        <span class="title">Timeline</span>
                                        <?php if($sub=='timeline'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item <?php if($active=='cetak_surat'){echo 'start active open';}else{echo '';} ?> ">
                            <a href="<?php echo site_url('Surat/cetak'); ?>" class="nav-link nav-toggle">
                                <i class="icon-envelope"></i>
                                <span class="title">Cetak Surat</span>
                                <?php if($active=='surat'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                           
                        </li> -->
                        <li class="nav-item <?php if($active=='jaldis'){echo 'start active open';}else{echo '';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-paper-plane"></i>
                                <span class="title">JalDis</span>
                                <?php if($active=='jaldis'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                <span class="arrow <?php if($active=='jaldis'){echo 'open';}else{echo '';} ?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($sub=='buat_jaldis'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Master/buat_jaldis'); ?>" class="nav-link ">
                                        <span class="title">Tambah Data</span>
                                        <?php if($sub=='buat_jaldis'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='lihat_jaldis'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Master/lihat_jaldis'); ?>" class="nav-link ">
                                        <span class="title">Lihat Data</span>
                                        <?php if($sub=='lihat_jaldis'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='timeline_jaldis'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Laporan/timeline_jaldis'); ?>" class="nav-link ">
                                        <span class="title">Timeline</span>
                                        <?php if($sub=='timeline_jaldis'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if($active=='laporan'){echo 'start active open';}else{echo '';} ?> ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-doc"></i>
                                <span class="title">Laporan</span>
                                <?php if($active=='laporan'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                <span class="arrow <?php if($active=='laporan'){echo 'open';}else{echo '';} ?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if($sub=='badan'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Laporan/rekap_badan'); ?>" class="nav-link ">
                                        <span class="title">Badan</span>
                                        <?php if($sub=='badan'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='pansus'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Laporan/rekap_pansus'); ?>" class="nav-link ">
                                        <span class="title">Pansus</span>
                                        <?php if($sub=='pansus'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='panja'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Laporan/rekap_panja'); ?>" class="nav-link ">
                                        <span class="title">Panja</span>
                                        <?php if($sub=='pansus'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($sub=='rekap'){echo 'active open';}else{echo '';} ?> ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Rekap JalDis</span>
                                        <?php if($sub=='rekap'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                        <span class="arrow <?php if($sub=='rekap'){echo 'open';}else{echo '';} ?>"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item <?php if($sub2=='keikutsertaan_anggota'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Laporan/keikutsertaan_anggota'); ?>" class="nav-link">Keikutsertaan Anggota</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='jaldis'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Laporan/jaldis'); ?>" class="nav-link">Jaldis</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='kategori_keperluan'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Laporan/kategori_keperluan'); ?>" class="nav-link">Per Kategori Keperluan</a>
                                        </li>
                                        <li class="nav-item <?php if($sub2=='anggaran'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('Laporan/anggaran'); ?>" class="nav-link">Anggaran</a>
										</li>
										<li class="nav-item <?php if($sub2=='by_date'){echo 'active open';}else{echo '';} ?>">
                                            <a href="<?php echo site_url('laporan_by_tanggal'); ?>" class="nav-link">Berdasarkan Waktu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item <?php if($sub=='rapat'){echo 'start active open';}else{echo '';} ?> ">
                                    <a href="<?php echo site_url('Laporan/rapat'); ?>" class="nav-link ">
                                        <span class="title">Rapat</span>
                                        <?php if($sub=='rapat'){echo '<span class="selected"></span>';}else{echo '';} ?>
                                    </a>
								</li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if($active=='log_activity'){echo 'start active open';}else{echo '';} ?> ">
                            <a href="<?php echo site_url('Master/log_activity'); ?>" class="nav-link nav-toggle">
                                <i class="icon-list"></i>
                                <span class="title">Log Aktifitas</span>
                                <?php if($active=='log_activity'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                           
                        </li>
                        <li class="nav-item <?php if($active=='tentang'){echo 'start active open';}else{echo '';} ?> ">
                            <a href="<?php echo site_url('User/tentang'); ?>" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Tentang Aplikasi</span>
                                <?php if($active=='tentang'){echo '<span class="selected"></span>';}else{echo '';} ?>
                            </a>
                           
                        </li>
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler"> </div>
                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span> THEME COLOR </span>
                                <ul>
                                    <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                    <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                                    <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                    <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                    <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                    <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span> Theme Style </span>
                                <select class="layout-style-option form-control input-sm">
                                    <option value="square" selected="selected">Square corners</option>
                                    <option value="rounded">Rounded corners</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Layout </span>
                                <select class="layout-option form-control input-sm">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Header </span>
                                <select class="page-header-option form-control input-sm">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Top Menu Dropdown</span>
                                <select class="page-header-top-dropdown-style-option form-control input-sm">
                                    <option value="light" selected="selected">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Mode</span>
                                <select class="sidebar-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Menu </span>
                                <select class="sidebar-menu-option form-control input-sm">
                                    <option value="accordion" selected="selected">Accordion</option>
                                    <option value="hover">Hover</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Style </span>
                                <select class="sidebar-style-option form-control input-sm">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="light">Light</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Position </span>
                                <select class="sidebar-pos-option form-control input-sm">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Footer </span>
                                <select class="page-footer-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Sindangjalin</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom">
                                <i class="icon-calendar"></i>&nbsp;
                                <span id="clock"></span> 
                                    <?php
                                    $hari = date('l');
                                    /*$new = date('l, F d, Y', strtotime($Today));*/
                                    if ($hari=="Sunday") {
                                     echo "Minggu";
                                    }elseif ($hari=="Monday") {
                                     echo "Senin";
                                    }elseif ($hari=="Tuesday") {
                                     echo "Selasa";
                                    }elseif ($hari=="Wednesday") {
                                     echo "Rabu";
                                    }elseif ($hari=="Thursday") {
                                     echo("Kamis");
                                    }elseif ($hari=="Friday") {
                                     echo "Jum'at";
                                    }elseif ($hari=="Saturday") {
                                     echo "Sabtu";
                                    }
                                    ?>,
                                   
                                    <?php
                                    $tgl =date('d');
                                    echo $tgl;
                                    $bulan =date('F');
                                    if ($bulan=="January") {
                                     echo " Januari ";
                                    }elseif ($bulan=="February") {
                                     echo " Februari ";
                                    }elseif ($bulan=="March") {
                                     echo " Maret ";
                                    }elseif ($bulan=="April") {
                                     echo " April ";
                                    }elseif ($bulan=="May") {
                                     echo " Mei ";
                                    }elseif ($bulan=="June") {
                                     echo " Juni ";
                                    }elseif ($bulan=="July") {
                                     echo " Juli ";
                                    }elseif ($bulan=="August") {
                                     echo " Agustus ";
                                    }elseif ($bulan=="September") {
                                     echo " September ";
                                    }elseif ($bulan=="October") {
                                     echo " Oktober ";
                                    }elseif ($bulan=="November") {
                                     echo " November ";
                                    }elseif ($bulan=="December") {
                                     echo " Desember ";
                                    }
                                    $tahun=date('Y');
                                    echo $tahun;
                                    ?>
                                   
                            </div>
                        </div>
                    </div>
<?php } ?>
<script type="text/javascript">        
    function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
    var waktu = new Date();            //membuat object date berdasarkan waktu saat 
    var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
    var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>