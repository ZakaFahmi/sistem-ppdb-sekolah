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
       
        <!-- News Details Page Area Start Here -->
        <div class="news-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row news-details-page-inner">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3>Sambutan <?=(get_school_level() == 5 ? 'Rektor' : (get_school_level() == 6 ? 'Ketua': (get_school_level() == 7 ? 'Direktur' : 'Kepala Sekolah')));?></h3>
                                <?=get_welcome()?>
                               
                                <ul class="news-social">
                                   
                                <div id="share1"></div>
                                <script>
                                $("#share1").jsSocials({
                                    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
                                });
                                </script>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('themes/academics/sidebar')?>
                </div>
            </div>
        </div>
        <!-- News Page Area End Here -->