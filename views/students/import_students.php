<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	// Import Students
	function import_students() {
		$('#submit').attr('disabled', 'disabled');
		$('body').addClass('loading');
		var values = {
			students: $('#students').val()
		};
		$.post(_BASE_URL + 'students/import_students/save', values, function(response) {
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
	         			<li>Copy dan paste <strong>[<?=get_school_level() == 5 ? 'NIM':'NIS'?>] [NAMA LENGKAP] [JENIS KELAMIN] [ALAMAT JALAN] [TEMPAT LAHIR] [TANGGAL LAHIR]</strong> dari Ms. Excel pada Text Area dibawah.</li>
	         			<li>Kolom <strong>JENIS KELAMIN</strong> diisi huruf <strong>"L"</strong> jika Laki-laki dan <strong>"P"</strong> jika Perempuan.</li>
	         			<li>Kolom <strong>TANGGAL LAHIR</strong> diisi dengan format <strong>"YYYY-MM-DD"</strong>. Contoh :  <strong>1991-03-15</strong></li>
	         			<li><?=get_school_level() == 5 ? 'Mahasiswa':'Peserta Didik'?> yang diimport akan otomatis statusnya menjadi <strong>"Aktif"</strong>. Pastikan Data Induk Status <?=get_school_level() == 5 ? 'Mahasiswa':'Peserta Didik'?> <strong>"Aktif"</strong> tersedia. Klik <a href="<?=site_url('students/student_status')?>"> disini</a> untuk melihat <strong>Daftar Status <?=get_school_level() == 5 ? 'Mahasiswa':'Peserta Didik'?></strong></li>
	         		</ul>
	         	</div>
					<div class="form-group">
               	<textarea autofocus id="students" name="students" class="form-control" rows="16" placeholder="Paste here..."></textarea>
            	</div>
				</div>
				<div class="box-footer">
               <button type="submit" onclick="import_students(); return false;" class="btn btn-primary"><i class="fa fa-upload"></i> IMPORT</button>
            </div>
         </form>
		</div>
	</div>
 </section>