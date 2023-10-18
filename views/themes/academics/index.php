<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=isset($page_title) ? $page_title . ' | ' : ''?><?=$this->session->userdata('school_name')?></title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="keywords" content="<?=$this->session->userdata('meta_keywords');?>"/>
        <meta name="description" content="<?=$this->session->userdata('meta_description');?>"/>
        <meta name="subject" content="Situs Pendidikan">
        <meta name="copyright" content="<?=$this->session->userdata('school_name')?>">
        <meta name="language" content="Indonesia">
        <meta name="robots" content="index,follow" />
        <meta name="revised" content="Sunday, July 18th, 2010, 5:15 pm" />
        <meta name="Classification" content="Education">
        <meta name="author" content="SYAIFUL BAHRI., syaifulpb11@gmail.com">
        <meta name="designer" content="SYAIFUL BAHRI., syaifulpb11@gmail.com">
        <meta name="reply-to" content="syaifulpb11@gmail.com">
        <meta name="owner" content="SYAIFUL BAHRI.">
        <meta name="url" content="https://www.smkmediautama.sch.id">
        <meta name="identifier-URL" content="https://www.smkmediautama.sch.id">
        <meta name="category" content="Admission, Education">
        <meta name="coverage" content="Worldwide">
        <meta name="distribution" content="Global">
        <meta name="rating" content="General">
        <meta name="revisit-after" content="7 days">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Copyright" content="<?=$this->session->userdata('school_name');?>" />
        <meta http-equiv="imagetoolbar" content="no" />
        <meta name="revisit-after" content="7" />
        <meta name="webcrawlers" content="all" />
        <meta name="rating" content="general" />
        <meta name="spiders" content="all" />
        <meta itemprop="name" content="<?=$this->session->userdata('school_name');?>" />
        <meta itemprop="description" content="<?=$this->session->userdata('meta_description');?>" />
        <meta itemprop="image" content="<?=base_url('media_library/images/'. $this->session->userdata('logo'));?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="<?=base_url('media_library/images/'.$this->session->userdata('favicon'));?>">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/animate.min.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/font-awesome.min.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/vendor/OwlCarousel/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/meanmenu.min.css">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/vendor/slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/vendor/slider/css/preview.css" type="text/css" media="screen" />
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/magnific-popup.css">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/hover-min.css">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/css/reImageGrid.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/academics/style.css">
    <!-- Modernizr Js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/modernizr-2.8.3.min.js"></script>
    <?=link_tag('assets/css/magnific-popup.css');?>
    <?=link_tag('assets/css/toastr.css');?>
    <?=link_tag('assets/css/jssocials.css');?>
    <?=link_tag('assets/css/jssocials-theme-flat.css');?>
    <?=link_tag('assets/css/bootstrap-datepicker.css');?>
    <?=link_tag('assets/css/loading.css');?>
        <script type="text/javascript">
            const _BASE_URL = '<?=base_url();?>';
            const _CURRENT_URL = '<?=current_url();?>';
            const _SCHOOL_LEVEL = '<?=$this->session->userdata('school_level');?>';
        </script>
    <script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
    <script src="<?=base_url('assets/js/frontend.min.js');?>"></script>
</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Main Body Area Start Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
        <header>
            <div id="header1" class="header1-area">
                <div class="main-menu-area bg-primary" id="sticker">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3">
                                <div class="logo-area">
                                    <a href="<?=base_url()?>"><img class="img-responsive" src="<?=base_url('media_library/images/'.$this->session->userdata('logo'))?>" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <nav id="desktop-nav">
                                    <ul>
                                        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
                                        <?php 
                                        foreach ($menus as $menu) {
                                            echo '<li>';
                                            $sub_nav = recursive_list($menu['child']);
                                            $url = base_url() . $menu['menu_url'];
                                            if ($menu['menu_type'] == 'links') {
                                                $url = $menu['menu_url'];
                                            }
                                            echo anchor($url, strtoupper($menu['menu_title']). ($sub_nav ? ' <span class="caret"></span>':''), 'target="'.$menu['menu_target'].'"');
                                            if ($sub_nav) {
                                                echo '<ul>';
                                                echo recursive_list($menu['child']);
                                                echo '</ul>';
                                            }
                                            echo '</li>';
                                        }?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-lg-1 col-md-1 hidden-sm">
                                <div class="header-search">
                                    <form action="<?=site_url('hasil-pencarian')?>" method="POST">
                                        <input type="text" class="search-form" placeholder="Pencarian...." required="" name="keyword">
                                        <a class="search-button" id="search-button"><i class="fa fa-search" aria-hidden="true" type="submit" ></i></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <a href='<?=base_url()?>' class='logo-mobile-menu'><img src='<?php echo base_url(); ?>assets/academics/img/mobile-logo.png' /></a>
                                    <ul>
                                        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
                                        <?php 
                                        foreach ($menus as $menu) {
                                            echo '<li>';
                                            $sub_nav = recursive_list($menu['child']);
                                            $url = base_url() . $menu['menu_url'];
                                            if ($menu['menu_type'] == 'links') {
                                                $url = $menu['menu_url'];
                                            }
                                            echo anchor($url, strtoupper($menu['menu_title']). ($sub_nav ? ' ':''), 'target="'.$menu['menu_target'].'"');
                                            if ($sub_nav) {
                                                echo '<ul>';
                                                echo recursive_list($menu['child']);
                                                echo '</ul>';
                                            }
                                            echo '</li>';
                                        }?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>
        <!-- Header Area End Here -->
        <?php $this->load->view($content)?>
        <!-- Footer Area Start Here -->
        <footer>
            <div class="footer-area-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <a href="<?=base_url()?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/academics/img/logo-footer.png" alt="logo"></a>
                                <div class="footer-about">
                                    <p><?=$this->session->userdata('street_address')?><br>Fax : <?=$this->session->userdata('fax')?></p>
                                </div>
                                <ul class="footer-social">
                                    <?php if (NULL !== $this->session->userdata('facebook') && $this->session->userdata('facebook')) { ?>
                                    <li><a href="<?=$this->session->userdata('facebook')?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <?php } ?>
                                    <?php if (NULL !== $this->session->userdata('facebook') && $this->session->userdata('facebook')) { ?>
                                        <li><a href="<?=$this->session->userdata('twitter')?>" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <?php } ?>
                                    <?php if (NULL !== $this->session->userdata('facebook') && $this->session->userdata('facebook')) { ?>
                                        <li><a href="<?=$this->session->userdata('linked_in')?>" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <?php } ?>
                                    <?php if (NULL !== $this->session->userdata('facebook') && $this->session->userdata('facebook')) { ?>
                                        <li><a href="<?=$this->session->userdata('google_plus')?>" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <?php } ?>
                                    <?php if (NULL !== $this->session->userdata('facebook') && $this->session->userdata('facebook')) { ?>
                                        <li><a href="<?=$this->session->userdata('youtube')?>" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                    <?php } ?>
                                    <?php if (NULL !== $this->session->userdata('facebook') && $this->session->userdata('facebook')) { ?>
                                        <li><a href="<?=$this->session->userdata('instagram')?>" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Kategori</h3>
                                <ul class="featured-links">
                                    <li>
                                        <ul>
                                            <?php 
                                                 $query = get_post_categories(); 
                                                 if ($query->num_rows() > 0) {
                                                     foreach($query->result() as $row) {
                                                         echo '<li>'.anchor(site_url('category/'.$row->slug), $row->category, ['title' => $row->description]).'</li>';
                                                     }
                                                 }
                                                 ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Tautan</h3>
                                <ul class="featured-links">
                                    <li>
                                        <ul>
                                            <?php 
                                                $links = get_links(); 
                                                if ($links->num_rows() > 0) {
                                                foreach($links->result() as $row) {
                                                    echo '<li>'. anchor($row->url, $row->title, ['target' => $row->target]) . '</li>';
                                                }  
                                                }
                                                ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Information</h3>
                                <ul class="corporate-address">
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Phone(01)800433633.html"> <?=$this->session->userdata('phone')?> </a></li>
                                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?=$this->session->userdata('email')?></li>
                                </ul>
                                <div class="newsletter-area">
                                    <h3>Berlangganan</h3>
                                    <div class="input-group stylish-input-group">
                                        <input onkeydown="if (event.keyCode == 13) { subscriber(); return false; }" type="text" id="subscriber" placeholder="Masukan Email kemudian enter" autocomplete="off" class="form-control">
                                        <span class="input-group-addon">
                                                <button type="submit">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                </button>  
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <p><?=copyright(2017, base_url(), $this->session->userdata('school_name'))?>&nbsp;Dev by<a target="_blank" href="http://mediautama.com"> Media Utama</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Body Area End Here -->
    <!-- Plugins js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/plugins.js" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="<?php echo base_url(); ?>assets/academics/js/wow.min.js"></script>
    <!-- Nivo slider js -->
    <script src="<?php echo base_url(); ?>assets/academics/vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/academics/vendor/slider/home.js" type="text/javascript"></script>
    <!-- Owl Cauosel JS -->
    <script src="<?php echo base_url(); ?>assets/academics/vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery.meanmenu.min.js" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery.scrollUp.min.js" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/academics/js/waypoints.min.js"></script>
    <!-- Countdown js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery.countdown.min.js" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/isotope.pkgd.min.js" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Gridrotator js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery.gridrotator.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/academics/js/main.js" type="text/javascript"></script>
</body>


<!-- Mirrored from www.radiustheme.com/demo/html/academics/academics/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 03:15:59 GMT -->
</html>
