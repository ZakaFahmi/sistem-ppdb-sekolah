<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!-- jquery-->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var page = 1;
    var total_pages = "<?=$total_pages;?>";
    $(document).ready(function() {
        if (parseInt(total_pages) == page || parseInt(total_pages) == 0) {
            $('.panel-footer').remove();
        }
    });
    function more_comments() {
        page++;
        var data = {
            page_number: page,
            comment_post_id: '<?=$this->uri->segment(2)?>'
        };      
        if ( page <= parseInt(total_pages) ) {
            $('body').addClass('loading');
            $.post( _BASE_URL + 'public/post_comments/more_comments', data, function( response ) {
                var res = typeof response !== 'object' ? $.parseJSON( response ) : response;
                var comments = res.comments;
                var html = '';
                for (var z in comments) {
                    var comment = comments[ z ];
                    html += '<div class="panel panel-inverse" style="margin-bottom: 0px;">';
                    html += '<div class="panel-heading" style="padding-bottom: 0px">';
                    html += '<strong>' + comment.comment_author + '</strong> - <span class="text-muted">' + comment.created_at + '</span>';
                    html += '</div>';
                    html += '<div class="panel-body" style="padding-top: 0px">';
                    html += '<p align="justify">' + comment.comment_content + '</p>';
                    html += '</div>';
                    html += '</div>';
                }
                var el = $(".panel-inverse:last"); 
                $( html ).insertAfter(el);
                if ( page == parseInt(total_pages) ) {
                    $('.panel-footer').remove();
                }
                $('body').removeClass('loading');
            });
        }
    }
</script>
        <!-- Inner Page Banner Area Start Here -->
        <?php if ($post_type == 'post' && file_exists('./media_library/posts/large/'.$query->post_image)) { ?>
        <div class="inner-page-banner-area" style="background-image: url('<?=base_url('media_library/posts/large/'.$query->post_image)?>');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Post Details</h1>
                    <ul>
                        <li><a href="<?=base_url()?>">Home</a> -</li>
                        <li>Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- Inner Page Banner Area End Here -->
        <!-- News Details Page Area Start Here -->
        <div class="news-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row news-details-page-inner">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php if ($post_type == 'post' && file_exists('./media_library/posts/large/'.$query->post_image)) { ?>
                                <div class="news-img-holder">
                                    <img src="<?=base_url('media_library/posts/large/'.$query->post_image)?>" style="width: 100%; display: block;" class="img-responsive" alt="research">
                                    <ul class="news-date1">
                                        <li><?=indo_date(substr($query->created_at, 0, 10))?></li>
                                        <li></li>
                                    </ul>
                                </div>
                                <?php } ?>
                                <h2 class="title-default-left-bold-lowhight"><a href="#"><?=$query->post_title?></a></h2>
                                <ul class="title-bar-high news-comments">
                                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> <?=$post_author?></a></li>
                                    <?php 
                                    if ($query->post_tags) {
                                        $post_tags = explode(',', $query->post_tags);
                                        foreach ($post_tags as $tag) {
                                            echo '<li><a href="'.site_url('tag/'.url_title(strtolower(trim($tag)))).'">';
                                            echo '<i class="fa fa-tags" aria-hidden="true"></i> '.ucwords(strtolower(trim($tag)));
                                            echo '</a></li>';
                                        }
                                    }
                                    ?>
                                    <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i><span><?=$query->post_counter?></span> Kali dilihat</a></li>
                                </ul>
                                <p><?=$query->post_content?></p>

                                <ul class="news-social">
                                   
                                <div id="share1"></div>
                                <script>
                                $("#share1").jsSocials({
                                    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
                                });
                                </script>
                                </ul>
                                <?php if ($post_comments->num_rows() > 0) { ?>
                                <div class="course-details-comments">
                                    <h3 class="sidebar-title">(4) Comments</h3>
                                    <?php foreach($post_comments->result() as $row) { ?>
                                    <div class="media">
                                        <a href="#" class="pull-left">
                                            <img alt="Comments" src="img/course/16.jpg" class="media-object">
                                        </a>
                                        <div class="media-body">
                                            <h3><a href="#"><?=$row->comment_author?></a></h3>
                                            <h4><?=day_name(date('N', strtotime($row->created_at)))?>, <?=indo_date($row->created_at)?></h4>
                                            <p align="justify"><?=strip_tags($row->comment_content)?></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="panel-footer">
                                    <button class="btn btn-sm btn-block btn-inverse load-more" onclick="more_comments()">KOMENTAR LAINNYA</button>
                                </div>


                                <?php } ?>

                                <?php if (
                                    (
                                        $query->post_comment_status == 'open' &&
                                        $this->session->userdata('comment_registration') == 'true' && 
                                        $this->auth->is_logged_in()
                                    ) ||
                                    (
                                        $query->post_comment_status == 'open' &&
                                        $this->session->userdata('comment_registration') == 'false'
                                    )
                                ) { ?>
                                <div class="leave-comments">
                                    <h3 class="sidebar-title"><i class="fa fa-comments-o"></i> KOMENTARI TULISAN INI</h3>
                                    <div class="row">
                                        <div class="contact-form">
                                            <form>
                                                <fieldset>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Nama Lengkap"  id="comment_author" name="comment_author" class="form-control">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="email"  id="comment_email" name="comment_email" placeholder="Email" class="form-control">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text"  id="comment_url" name="comment_url" placeholder="Website" class="form-control">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <textarea placeholder="Komentar" class="textarea form-control"  id="comment_content" name="comment_content" rows="8" cols="20"></textarea>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label"></label>
                                                            <div class="col-sm-9">
                                                                <div class="g-recaptcha" data-sitekey="<?=$recaptcha_site_key?>"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-3 col-sm-9">
                                                                <input type="hidden" name="comment_post_id" id="comment_post_id" value="<?=$this->uri->segment(2)?>">
                                                            <button type="button" onclick="post_comment(); return false;" class="view-all-accent-btn"><i class="fa fa-send"></i> SUBMIT</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('themes/academics/sidebar')?>
                </div>
            </div>
        </div>
        <!-- News Page Area End Here -->