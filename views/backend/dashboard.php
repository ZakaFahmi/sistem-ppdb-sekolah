<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section class="content">
	<?php if ($this->session->userdata('user_type') === 'super_user' || $this->session->userdata('user_type') === 'administrator') { ?>
	<?php if (ENVIRONMENT == 'development') { ?>
	<div class="callout callout-warning">
		<h4>INFORMASI !</h4>
		<p>Website masih dalam mode <b>"DEVELOPMENT"</b>. Jika website sudah online <b>SANGAT DISARANKAN</b> untuk mengubahnya menjadi mode <b>"PRODUCTION"</b>. Mode development hanya diperbolehkan jika masih dijalankan pada server offline.</p>
		<p>Untuk mengubah menjadi mode <b>PRODUCTION</b>, silahkan buka file <b>INDEX.PHP</b> yang berada di root direktori CMS Academics. Pada baris 56, silahkan ubah tulisan <b>development</b> menjadi <b>production</b> seperti dibawa ini :</p>
		<code>define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'production');</code>
	</div>
	<?php } ?>

	<?php if ($warning) { ?>
	<div class="callout callout-danger">
		<h4>PERINGATAN !</h4>
		<ul>
   	<?php if (!$recaptcha_site_key OR !$recaptcha_secret_key) { ?>
			<li><b>Recaptcha Site Key</b> dan <b>Secret Key</b> belum diatur. Silahkan atur terlebih dahulu pada menu <a href="<?=site_url('settings/general')?>"><b>Pengaturan / Umum</b></a>. Untuk mendapatkan <b>Recaptcha Site Key</b> dan <b>Recaptcha Secret Key</b></li>
   	<?php } ?>
   	<?php if (!$google_map_api_key) { ?>
			<li><b>API Key Google Map</b> belum diatur. Silahkan atur terlebih dahulu pada menu <a href="<?=site_url('settings/general')?>"><b>Pengaturan / Umum</b></a>. Untuk mendapatkan <b>API Key Google Map</b> silahkan ikuti petunjuk pada tautan berikut <a href="https://developers.google.com/maps/documentation/javascript/get-api-key?hl=ID">https://developers.google.com/maps/documentation/javascript/get-api-key?hl=ID</a></li>
   	<?php } ?>
   	<?php if (!$latitude OR !$longitude) { ?>
			<li>Latitude dan Longitude (Lintang dan Bujur) untuk menampilkan peta belum diatur. Silahkan atur terlebih dahulu pada menu <a href="<?=site_url('settings/general')?>"><b>Pengaturan / Umum</b></a>. Untuk mendapatkan koordinat <b>Latitude</b> dan <b>longitude</b> silahkan ikuti petunjuk pada tautan berikut <a href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=ID">https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=ID</a></li>
   	<?php } ?>
		<?php if (!$sendgrid_api_key) { ?>
			<li><b>Sendgrid API Key</b> untuk mengirim email belum diatur. Silahkan atur terlebih dahulu pada menu <a href="<?=site_url('settings/mail_server')?>"><b>Pengaturan / Email Server</b></a>. Untuk mendapatkan <b>Sendgrid API Key</b>, silahkan buat akun pada tautan berikut <a href="https://app.sendgrid.com/signup">https://app.sendgrid.com/signup</a></li>
   	<?php } ?>

   	</ul>
	</div>
	<?php } ?>

	<div class="row">
	  <div class="col-md-3 col-sm-6 col-xs-12">
		 <div class="info-box">
			<a href="<?=site_url('blog/messages');?>">
				<span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
			</a>
			<div class="info-box-content">
			  <span class="info-box-text">Pesan Masuk</span>
			  <span class="info-box-number"><?=$widget_box->messages;?></span>
			</div>
		 </div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-xs-12">
		 <div class="info-box">
		 	<a href="<?=site_url('blog/post_comments');?>">
				<span class="info-box-icon bg-green"><i class="fa fa-comments-o"></i></span>
			</a>
			<div class="info-box-content">
			  <span class="info-box-text">Komentar</span>
			  <span class="info-box-number"><?=$widget_box->comments;?></span>
			</div>
		 </div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-xs-12">
		 <div class="info-box">
		 	<a href="<?=site_url('blog/posts');?>">
				<span class="info-box-icon bg-yellow"><i class="fa fa-edit"></i></span>
			</a>
			<div class="info-box-content">
			  <span class="info-box-text">Tulisan</span>
			  <span class="info-box-number"><?=$widget_box->posts;?></span>
			</div>
		 </div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-xs-12">
		 <div class="info-box">
		 	<a href="<?=site_url('blog/pages');?>">
				<span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>
			</a>
			<div class="info-box-content">
			  <span class="info-box-text">Halaman</span>
			  <span class="info-box-number"><?=$widget_box->pages;?></span>
			</div>
		 </div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-md-3 col-sm-6 col-xs-12">
		 <div class="info-box">
		 	<a href="<?=site_url('blog/post_categories');?>">
				<span class="info-box-icon bg-red"><i class="fa fa-list-ul"></i></span>
			</a>
			<div class="info-box-content">
			  <span class="info-box-text">Kategori <br>Tulisan</span>
			  <span class="info-box-number"><?=$widget_box->categories;?></span>
			</div>
		 </div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-xs-12">
		 <div class="info-box">
		 	<a href="<?=site_url('blog/tags');?>">
				<span class="info-box-icon bg-yellow"><i class="fa fa-tags"></i></span>
			</a>
			<div class="info-box-content">
			  <span class="info-box-text">Tags</span>
			  <span class="info-box-number"><?=$widget_box->tags;?></span>
			</div>
		 </div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-xs-12">
		 <div class="info-box">
		 	<a href="<?=site_url('blog/testimoni');?>">
				<span class="info-box-icon bg-green"><i class="fa fa-link"></i></span>
			</a>
			<div class="info-box-content">
			  <span class="info-box-text">Testimoni</span>
			  <span class="info-box-number"><?=$widget_box->testimoni;?></span>
			</div>
		 </div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-xs-12">
		 <div class="info-box">
		 	<a href="<?=site_url('blog/agenda');?>">
				<span class="info-box-icon bg-aqua"><i class="fa fa-quote-right"></i></span>
			</a>
			<div class="info-box-content">
			  <span class="info-box-text">Agenda</span>
			  <span class="info-box-number"><?=$widget_box->agenda;?></span>
			</div>
		 </div>
	  </div>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">PROFIL <?=get_school_level() == 5 ? 'PERGURUAN TINGGI' : 'SEKOLAH'?></div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-4 control-label">Nama <?=get_school_level() == 5 ? 'Perguruan Tinggi' : 'Sekolah'?> :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('school_name')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label"><?=get_school_level() == 5 ? 'Kode PT' : 'NPSN'?> :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('npsn')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label"><?=get_school_level() == 5 ? 'Direktur / Ketua / Rektor' : 'Kepala Sekolah'?> :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('headmaster')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Alamat Jalan :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('street_address')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Dusun :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('sub_village')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Kelurahan / Desa :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('village')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Kecamatan :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('sub_district')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Kabupaten :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('district')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Telp :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('phone')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Fax :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('fax')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Email :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('email')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Website :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('website')?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Kode Pos :</label>
								<div class="col-sm-8">
									<p class="form-control-static"><?=$this->session->userdata('postal_code')?></p>
								</div>
							</div>
						</form>
					</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">INFORMASI SITUS</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-4 control-label">Sistem Operasi</label>
							<div class="col-sm-8">
								<p class="form-control-static"><?=$this->agent->platform();?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Browser</label>
							<div class="col-sm-8">
								<p class="form-control-static"><?=$this->agent->browser();?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Versi PHP</label>
							<div class="col-sm-8">
								<p class="form-control-static"><?=phpversion();?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Versi Database</label>
							<div class="col-sm-8">
								<p class="form-control-static"><?=ucwords($this->db->platform()).' '.$this->db->version();?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Tanggal Server</label>
							<div class="col-sm-8">
								<p class="form-control-static"><?=indo_date(date('Y-m-d'));?></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Jam Server</label>
							<div class="col-sm-8">
								<p class="form-control-static"><?=date('H:i:s');?></p>
							</div>
						</div>

					</form>

				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">LOGIN PENGGUNA</div>
				<table class="table table-responsive table-striped table-bordered">
					<tbody>
						<tr>
							<th width="40%">Nama Pengguna</th>
							<th>Waktu Login</th>
						</tr>
						<?php foreach($last_logged_in->result() as $row) { ?>
						<tr>
							<td><?=$row->full_name;?></td>
							<td><i class="fa fa-calendar"></i> <?=$row->last_logged_in;?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
	  </div>
	  <div class="col-md-6 col-sm-6 col-xs-12">
	  		<div class="panel panel-primary">
				<div class="panel-heading">TULISAN TERBARU</div>
				<div class="panel-body">
					<ul class="products-list product-list-in-box">
				  	<?php $posts = get_recent_posts(10); foreach($posts->result() as $row) { ?>
					 <li class="item">
							<span class="product-description">
								Oleh : <?=$row->post_author;?> Pada : <?=$row->created_at;?>
							</span>
							<a target="_blank" href="<?=site_url('read/'.$row->id.'/'.$row->post_slug)?>" class="product-title"><?=$row->post_title;?></a>
					 </li>
					 <?php } ?>
				  </ul>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">KOMENTAR TERBARU</div>
				<div class="panel-body">
					<ul class="products-list product-list-in-box">
						<?php foreach($recent_posts_comments->result() as $row) { ?>
						<li class="item">
							<span class="product-description">
								Pengirim : <a href="<?=$row->comment_url;?>" target="_blank"><?=$row->comment_author;?></a> on <a href="<?=site_url('read/'.$row->post_id.'/'.$row->post_slug);?>" target="_blank"><?=$row->post_title;?></a>
							</span>
							<span><?=strip_tags($row->comment_content);?></span>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
	  </div>
	</div>
 </section>
