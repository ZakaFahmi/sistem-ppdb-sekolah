<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!-- jquery-->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <!-- Slider 1 Area Start Here -->
        <?php $query = get_image_sliders(); if ($query->num_rows() > 0) { ?>
        <div class="slider1-area overlay-default index1">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider-3" class="slides">
                    <?php $idx = 0; foreach($query->result() as $row) { ?>
                    <img src="<?=base_url('media_library/image_sliders/'.$row->image);?>" alt="slider" title="#slider-direction-<?=$row->id;?>" />
                    <?php $idx++; } ?>
                </div>
                <?php $idx = 0; foreach($query->result() as $row) { ?>
                <div id="slider-direction-<?=$row->id;?>" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-<?=$row->id;?>">
                        <div class="title-container s-tb-c">
                            <div class="title1"><?=$row->caption;?></div>
                            <p><?=$row->deskripsi;?></p>
                            <div class="slider-btn-area">
                                <a href="<?=site_url('sambutan-kepala-sekolah');?>" class="default-big-btn">Baca Sambutan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $idx++; } ?>
            </div>
        </div>
        <?php } ?>
        <!-- Slider 1 Area End Here -->
        <?php $query = get_quotes(); if ($query->num_rows() > 0) { ?>
        <!-- Service 1 Area Start Here -->
        <div class="service1-area">
            <div class="service1-inner-area">
                <div class="container">
                    <div class="row service1-wrapper">
                        <?php foreach($query->result() as $row) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                            <div class="service-box-content">
                                <h3><a href="<?=$row->url?>"><?=$row->quote_by?></a></h3>
                                <p><?=$row->quote?></p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-<?=$row->status?>" aria-hidden="true"></i>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service 1 Area End Here -->
        <?php } ?>
        <!-- About 1 Area Start Here -->
        <div class="about1-area">
            <div class="container">
                <h1 class="about-title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">Selamat Datang</h1>
                <p class="about-sub-title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s"><?=$this->session->userdata('tagline')?></p>
                <div class="about-img-holder wow fadeIn" data-wow-duration="2s" data-wow-delay=".2s">
                    <img src="<?php echo base_url(); ?>/assets/academics/img/about/1.jpg" alt="about" class="img-responsive" />
                </div>
            </div>
        </div>
        <!-- About 1 Area End Here -->
        <?php $query = get_albums(5); if ($query->num_rows() > 0) { ?>
        <!-- Courses 1 Area Start Here -->
        <div class="courses1-area">
            <div class="container">
                <h2 class="title-default-left">Foto Terbaru</h2>
            </div>
            <div id="shadow-carousel" class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <?php foreach($query->result() as $row) { ?>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper">
                                <img class="img-responsive" style="cursor: pointer;" onclick="preview(<?=$row->id?>)" src="<?=base_url('media_library/albums/'.$row->album_cover)?>">
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#"><?=$row->album_title?></a></h3>
                                <ul class="courses-info">
                                    <li>1 Year
                                        <br><span> Course</span></li>
                                    <li>40
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Classes</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- Courses 1 Area End Here -->
        <?php } ?>
        <?php $query = get_recent_video(1); if ($query->num_rows() > 0) { ?>
        <!-- Video Area Start Here -->
        <div class="video-area overlay-video bg-common-style" style="background-image: url('<?php echo base_url(); ?>assets/academics/img/banner/1.jpg');">
            <?php foreach($query->result() as $row) { ?>
            <div class="container">
                <div class="video-content">
                    <h2 class="video-title">Video Terbaru</h2>
                    <p class="video-sub-title">Video ini berisi informasi profil sekolah,<br>kehidupan sekolah, informasi alumni dan berita terkini di SMK Media Utama.</p>
                    <a class="play-btn popup-youtube wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s" href="<?=$row->post_content?>"><i class="fa fa-play" aria-hidden="true"></i></a>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <!-- Video Area End Here -->
        <?php $query = get_headmaster(); if ($query->num_rows() > 0) { ?>
        <!-- Lecturers Area Start Here -->
        <div class="lecturers-area">
            <div class="container">
                <h2 class="title-default-left">Kepala Sekolah dan Staf</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <?php $idx = 0; foreach($query->result() as $row) { ?>
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="#"><img class="img-responsive" src="<?=base_url('media_library/headmaster/'.$row->image);?>" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 class="item-title"><a href="#"><?=$row->caption;?></a></h3>
                                <span class="item-designation"><?=$row->deskripsi;?></span>
                                <ul class="lecturers-social">
                                    <li><a href="<?=$row->email;?>" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a href="<?=$row->instagram;?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="<?=$row->twitter;?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?=$row->facebook;?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php $idx++; } ?>
                </div>
            </div>
        </div>
    <?php } ?>
        <!-- Lecturers Area End Here -->
        <!-- News and Event Area Start Here -->
        <div class="news-event-area">
            <div class="container">
                <div class="row">
                    <?php
                    $query = get_recent_posts(3); if ($query->num_rows() > 0) {
                        $posts = [];
                        foreach ($query->result() as $post) {
                            array_push($posts, $post);
                        }
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 news-inner-area">
                        <h2 class="title-default-left">Post Terbaru</h2>
                        <ul class="news-wrapper">
                        <?php if (count(array_slice($posts, 0, 1)) > 0) { ?>
                            <?php foreach(array_slice($posts, 0, 1) as $row) { ?>
                            <li>
                                <div class="news-img-holder">
                                    <a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><img src="<?=base_url('media_library/posts/thumbnail/'.$row->post_image)?>" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h3>
                                    <div class="post-date"><?=day_name(date('N', strtotime($row->created_at)))?>, <?=indo_date($row->created_at)?> | oleh <?=$row->post_author?></div>
                                    <p align="justify"><?=substr(strip_tags($row->post_content), 0, 90)?></p>
                                </div>
                            </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if (count(array_slice($posts, 1)) > 0) { ?>
                            <?php foreach(array_slice($posts, 1) as $row) { ?>
                            <li>
                                <div class="news-img-holder">
                                    <a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><img src="<?=base_url('media_library/posts/thumbnail/'.$row->post_image)?>" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3><a href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>"><?=$row->post_title?></a></h3>
                                    <div class="post-date"><?=day_name(date('N', strtotime($row->created_at)))?>, <?=indo_date($row->created_at)?> | oleh <?=$row->post_author?></div>
                                    <p align="justify"><?=substr(strip_tags($row->post_content), 0, 90)?></p>
                                </div>
                            </li>
                            <?php } ?>
                        <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php $query = get_agenda(2); if ($query->num_rows() > 0) { ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 event-inner-area">
                        <h2 class="title-default-left">Acara Akan Datang</h2>
                        <ul class="event-wrapper">
                            <?php foreach($query->result() as $row) { ?>
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
                                        <h3><?=$row->tanggal?></h3>
                                        <p><?=$row->bulan?></p>
                                        <span><?=$row->tahun?></span>
                                    </div>
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="javascript:(0)"><?=$row->quote_by?></a></h3>
                                    <p><?=$row->quote?></p>
                                    <ul>
                                        <li><?=$row->waktu?></li>
                                        <li><?=$row->tempat?></li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- News and Event Area End Here -->
        <!-- Counter Area Start Here -->
        <div class="counter-area bg-primary-deep" style="background-image: url('img/banner/4.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".20s">
                        <h2 class="about-counter title-bar-counter" data-num="31">31</h2>
                        <p>PROFESSIONAL TEACHER</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".40s">
                        <h2 class="about-counter title-bar-counter" data-num="20">20</h2>
                        <p>NEWS COURSES EVERY YEARS</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".60s">
                        <h2 class="about-counter title-bar-counter" data-num="56">56</h2>
                        <p>NEWS COURSES EVERY YEARS</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".80s">
                        <h2 class="about-counter title-bar-counter" data-num="510">510</h2>
                        <p>REGISTERED STUDENTS</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Area End Here -->
        <?php $query = get_testimoni(); if ($query->num_rows() > 0) { ?>
        <!-- Students Say Area Start Here -->
        <div class="students-say-area">
            <h2 class="title-default-center">Apa Kata Mereka?</h2>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="true" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="2" data-r-medium-nav="false" data-r-medium-dots="true" data-r-large="2" data-r-large-nav="false" data-r-large-dots="true">
                    <?php $idx = 0; foreach($query->result() as $row) { ?>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="profile-img-wrapper">
                                <a href="#" class="profile-img"><img class="profile-img-responsive img-circle" src="<?=base_url('media_library/testimoni/'.$row->image);?>" alt="Testimonial"></a>
                            </div>

                            <div class="tlp-tm-content-wrapper">
                                <h3 class="item-title"><a href="#"><?=$row->caption;?></a></h3>
                                <span class="item-designation"><?=$row->status;?></span>
                                <ul class="rating-wrapper">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="item-content"><?=$row->deskripsi;?></div>
                            </div>
                        </div>
                    </div>
                <?php $idx++; } ?>
                </div>
            </div>
        </div>
        <!-- Students Say Area End Here -->
        <?php } ?>
        <!-- Students Join 1 Area Start Here -->
        <div class="students-join1-area">
            <div class="container">
                <div class="students-join1-wrapper">
                    <div class="students-join1-left">
                        <div id="ri-grid" class="author-banner-bg ri-grid header text-center">
                            <ul class="ri-grid-list">
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/4.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/6.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/7.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/8.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/9.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/10.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/11.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/12.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/13.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/14.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/15.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/16.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/17.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/18.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/19.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/20.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/21.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/22.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/23.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/24.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/25.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/26.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/27.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/28.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/29.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/30.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/31.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/32.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/33.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/34.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/35.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/36.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/37.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:(0)"><img src="<?php echo base_url(); ?>/media_library/ppdb_info/38.jpg" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="students-join1-right">
                        <div>
                            <h2>PPDB<span> 2019</span><br>Telah Dibuka</h2>
                            <a href="formulir-penerimaan-peserta-didik-baru" class="join-now-btn">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Students Join 1 Area End Here -->
        <!-- Brand Area Start Here -->
        <?php $query = get_banners(); if ($query->num_rows() > 0) { ?>
        <div class="brand-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="4" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    <?php foreach($query->result() as $row) { ?>
                    <div class="brand-area-box">
                        <a href="<?=$row->url?>" title="<?=$row->title?>"><img src="<?=base_url('media_library/banners/'.$row->image)?>" alt="brand"></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- Brand Area End Here -->