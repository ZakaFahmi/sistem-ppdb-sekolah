<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	// Import Employees
	function import_employees() {
		$('#submit').attr('disabled', 'disabled');
		$('body').addClass('loading');
		var values = {
			employees: $('#employees').val()
		};
		$.post('<?=site_url("employees/import/save");?>', values, function(response) {
			var res = H.stringToJSON(response);
			H.growl(res.type, H.message(res.message));
			$('#employees').val('');
			$('#submit').removeAttr('disabled');
			$('body').removeClass('loading');
		});
	}
</script>
<section class="content-header">
   <h1><i class="fa fa-upload text-green"></i> <?=ucwords(strtolower($title));?></h1>
 </section>
 <section class="content">
 	<div class="panel panel-default">
		<div class="panel-body">			
			<form role="form">
				<div class="box-body">
					<div class="callout callout-info">
						<button type="button" onclick="removeCallout()" class="close">×</button>
	            	<h4>Petunjuk Singkat</h4>
	         		<ul>
	         			<li>Copy dan paste <strong>[NIK] [NAMA LENGKAP] [JENIS KELAMIN] [ALAMAT JALAN] [TEMPAT LAHIR] [TANGGAL LAHIR]</strong> dari Ms. Excel pada Text Area dibawah.</li>
	         			<li>Kolom <strong>JENIS KELAMIN</strong> diisi huruf <strong>"L"</strong> jika Laki-laki dan <strong>"P"</strong> jika Perempuan.</li>
	         			<li>Kolom <strong>TANGGAL LAHIR</strong> diisi dengan format <strong>"YYYY-MM-DD"</strong>. Contoh :  <strong>1991-03-15</strong></li>
	         		</ul>
	         	</div>
					<div class="form-group">
               	<textarea autofocus id="employees" name="employees" class="form-control" rows="16" placeholder="Paste here..."></textarea>
            	</div>
				</div>
				<div class="box-footer">
               <button type="submit" onclick="import_employees(); return false;" class="btn btn-primary"><i class="fa fa-upload"></i> IMPORT</button>
            </div>
         </form>
		</div>
	</div>
 </section>