<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!-- jquery-->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var page = 1;
    var total_pages = "<?=$total_pages;?>";
    $(document).ready(function() {
        if (parseInt(total_pages) == page || total_pages == 0) {
            $('button.load-more').remove();
        }
    }); 
    function load_more() {
        page++;
        var data = {
            page_number: page
        };
        
        if ( page <= total_pages ) {
            $.post( _BASE_URL + 'public/gallery_photos/more_photos', data, function( response ) {
                var res = typeof response !== 'object' ? $.parseJSON( response ) : response;
                var rows = res.rows;
                var total_rows = res.total_rows;
                var idx = 3, html = '';
                for (var z in rows) {
                    var result = rows[ z ];
                    html += (idx % 3 == 0) ? '<div class="row loop-album">' : '';
                    html += '<div class="col-md-4 col-xs-12">';
                    html += '<div class="thumbnail">';
                    html += '<img style="cursor: pointer; width: 100%; height: 250px;" onclick="preview(' + result.id + ')" src="' + _BASE_URL + 'media_library/albums/' + result.album_cover + '">';
                    html += '<div class="caption">';
                    html += '<h4>' + result.album_title + '</h4>';
                    html += '<p>' + result.album_description + '</p>';
                    html += '<button onclick="preview(' + result.id + ')" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += ((idx % 3 == 2) || total_rows + 2 == idx) ? '</div>' : '';
                    idx++;
                }
                var el = $("div.loop-album:last"); 
                $( html ).insertAfter(el);
                if (page == total_pages) {
                    $('button.load-more').remove();
                }
            });
        }
    }
</script>
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Our Lecturers_02</h1>
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Lecturers</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Lecturers Page 2 Area Start Here -->
        <div class="lecturers-page2-area">
            <div class="container" id="inner-isotope">
                <div class="row featuredContainer">
                    <?php $idx = 3; $rows = $query->num_rows(); foreach($query->result() as $row) { ?>
        <?=($idx % 3 == 0) ? '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 diploma cse">':''?>


                    
                        <div class="single-item">
                            <div class="lecturers-item-wrapper">
                                <a href="#"><img class="img-responsive" style="cursor: pointer; width: 100%; height: 250px;" onclick="preview(<?=$row->id?>)" src="<?=base_url('media_library/albums/'.$row->album_cover)?>" alt="team"></a>
                                <div class="lecturers-content-wrapper">
                                    <h3><a onclick="preview(<?=$row->id?>)" ><?=$row->album_title?></a></h3>
                                    <p><?=$row->album_description?></p>
                                </div>
                            </div>
                        </div>

        <?=(($idx % 3 == 2) || ($rows+2 == $idx)) ? '</div>':''?>
    <?php $idx++; } ?>


                </div>
            </div>
        </div>
        <!-- Lecturers Page 2 Area End Here -->