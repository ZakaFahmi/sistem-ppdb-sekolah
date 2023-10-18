<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	// Import Alumni
	function import_alumni() {
		$('#submit').attr('disabled', 'disabled');
		$('body').addClass('loading');
		var values = {
			students: $('#students').val()
		};
		$.post(_BASE_URL + 'students/import_alumni/save', values, function(response) {
			var res = H.stringToJSON(response);
			H.growl(res.type, H.message(res.message));
			$('#students').val('');
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
	         			<li>Copy dan paste <strong>[<?=get_school_level() == 5 ? 'NIM':'NIS'?>] [NAMA LENGKAP] [JENIS KELAMIN] [TANGGAL MASUK] [TANGGAL KELUAR] [HANDPHONE] [EMAIL] [ALAMAT JALAN]</strong> dari Ms. Excel pada Text Area dibawah.</li>
	         			<li>Kolom <strong>JENIS KELAMIN</strong> diisi huruf <strong>"L"</strong> jika Laki-laki dan <strong>"P"</strong> jika Perempuan.</li>
	         			<li>Kolom <strong>TANGGAL MASUK</strong> dan <strong>TANGGAL KELUAR</strong> diisi dengan format <strong>YYYY-MM-DD</strong>.</li>
	         		</ul>
	         	</div>
					<div class="form-group">
               	<textarea autofocus id="students" name="students" class="form-control" rows="16" placeholder="Paste here..."></textarea>
            	</div>
				</div>
				<div class="box-footer">
               <button type="submit" onclick="import_alumni(); return false;" class="btn btn-primary"><i class="fa fa-upload"></i> IMPORT</button>
            </div>
         </form>
		</div>
	</div>
 </section>