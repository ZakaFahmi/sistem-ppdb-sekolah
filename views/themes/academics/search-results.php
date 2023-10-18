<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!-- jquery-->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <div class="inner-page-banner-area" style="background-image: url('<?php echo base_url(); ?>assets/academics/img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1><?=$title?></h1>
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Pencarian</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Research Page 1 Area Start Here -->
        <div class="research-page1-area">
            <div class="container">
                <div class="row">
                    <?php if($posts || $pages) { ?>
                        <?php if($posts) { ?>
                <?php if ($posts->num_rows() > 0) { ?>
                    <?php foreach($posts->result() as $row) { ?>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="research-box1">
                                    <h3 class="sidebar-title"><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h3>
                                    <p  style="text-align: justify;"><?=word_limiter(strip_tags($row->post_content), 30)?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
                    <?php } ?>





                    <?php if($pages) { ?>
                <?php if ($pages && $pages->num_rows() > 0) { ?>
                    <?php foreach($pages->result() as $row) { ?>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="research-box1">
                                    <h3 class="sidebar-title"><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h3>
                                    <p style="text-align: justify;"><?=word_limiter(strip_tags($row->post_content), 30)?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

                    <?php $this->load->view('themes/academics/sidebar')?>
                </div>
            </div>
        </div>
        <!-- Research Page 1 Area End Here -->
<?php if ($pages && $pages->num_rows() == 0 && $posts && $posts->num_rows() == 0) { ?>

        <!-- Inner Page Banner Area End Here -->
        <!-- Error Page Area Start Here -->
        <div class="error-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="error-top">
                            <img src="<?php echo base_url(); ?>assets/academics/img/404.png" class="img-responsive" alt="404">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="error-bottom">
                            <h2>Sorry!!! Page Was Not Found</h2>
                            <p>The page you are looking is not available or has been removed. Try going to Home Page by using the button below.</p>
                            <a href="index-2.html" class="default-white-btn">Go To Home Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Error Page Area End Here -->
        <?php } ?>  