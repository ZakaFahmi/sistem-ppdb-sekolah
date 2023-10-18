<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	$( document ).ready( function() {
		$('#birth_date').datepicker({
			format: 'yyyy-mm-dd',
			todayBtn: 'linked',
			minDate: '0001-01-01',
			setDate: new Date(),
			todayHighlight: true,
			autoclose: true
		});
	});
</script>
        <!-- Inner Page Banner Area End Here -->
        <!-- News Details Page Area Start Here -->
        <div class="news-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row news-details-page-inner">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2 class="title-default-left-bold-lowhight"><i class="fa fa-sign-out"></i><?=strtoupper($page_title)?></h2>
			<form class="form-horizontal admission-form" role="form" action="<?=$action?>">
				<div class="form-group">
					<label for="registration_number" class="col-sm-4 control-label">Nomor Pendaftaran <span style="color: red">*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control input-sm" id="registration_number" name="registration_number">
					</div>
				</div>
				<div class="form-group">
					<label for="birth_date" class="col-sm-4 control-label">Tanggal Lahir <span style="color: red">*</span></label>
					<div class="col-sm-8">
						<div class="input-group">
	          			<input  type="text" readonly="true" class="form-control input-sm" id="birth_date" name="birth_date">
	          			<span class="input-group-addon input-sm"><i class="fa fa-calendar"></i></span>
	        			</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label"></label>
					<div class="col-sm-8">
						<div class="g-recaptcha" data-sitekey="<?=$recaptcha_site_key?>"></div>
					</div>
				</div>
	  			<div class="form-group">
	    			<div class="col-sm-offset-4 col-sm-8">
	      			<button type="button" onclick="<?=$onclick?>; return false;" class="btn btn-success"><?=$button?></button>
	    			</div>
	  			</div>
			</form>
                            </div>
                        </div>
                    </div>

                    <?php $this->load->view('themes/academics/sidebar')?>
                </div>
            </div>
        </div>
        <!-- News Page Area End Here -->