<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!-- jquery-->
    <script src="<?php echo base_url(); ?>assets/academics/js/jquery-2.2.4.min.js" type="text/javascript"></script>
 <!-- Lecturers Page 2 Area Start Here -->
       <div class="news-details-page-area">
            <div class="container">
                <div class="row">
                   	
	  	<div class="panel-heading"><i class="fa fa-sign-out"></i> DIREKTORI PESERTA DIDIK</div>
	  	<div class="panel-body">
	  		<form class="form-inline" onsubmit="return false;">
			  <div class="form-group">
			  		<label for="academic_year_id">Tahun Pelajaran</label>
			  		<?=form_dropdown('academic_year_id', $ds_academic_years, NULL, 'class="form-control input-sm" id="academic_year_id"');?>
			  </div>
			  <div class="form-group">
			  		<label for="class_group_id">Kelas</label>
			  		<?=form_dropdown('class_group_id', $ds_class_groups, '', 'class="form-control input-sm" id="class_group_id"');?>
			  </div>
			  <button type="button" onclick="search_students()" class="btn btn-sm btn-success"><i class="fa fa-search"></i> CARI</button>
			</form>
			<hr>
			<div class="table-responsive student-directory"></div>
	  	</div> 

	  	   </div>
            </div>
        </div>