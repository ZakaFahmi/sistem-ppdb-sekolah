
    <!-- jquery-->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery-2.2.4.min.js" type="text/javascript"></script>        <!-- Lecturers Page 2 Area Start Here -->
        <div class="lecturers-page2-area">
            <div class="container" id="inner-isotope">
                <div class="row featuredContainer">
                   	<?php $idx = 3; $rows = $query->num_rows(); foreach($query->result() as $row) { ?>
		<?=($idx % 3 == 0) ? '<div class="col-md-4 col-xs-12">':''?>

				<div class="embed-responsive embed-responsive-16by9">
				<iframe frameborder="0" allowfullscreen class="embed-responsive-item" src="<?=$row->post_content?>"></iframe>
			</div>
		<?=(($idx % 3 == 2) || ($rows+2 == $idx)) ? '</div>':''?>
	<?php $idx++; } ?>

                </div>
            </div>
        </div>
        <!-- Lecturers Page 2 Area End Here -->