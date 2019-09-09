
<?php include 'header.php'; ?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="font-weight-bold text-primary">Ayarlar</h5>
				</div>
				<div class="card-body">
					<form action="islemler/ajax.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
						
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Logo</label>
								<input type="file" class="form-control" name="site_logo">
							</div>
						</div>


						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Arkaplan</label>
								<input type="file" class="form-control" name="site_arkaplan">
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Başlık</label>
								<input type="text" class="form-control" name="site_baslik" value="<?php echo $ayarcek['site_baslik'] ?>">
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-8 form-group">
								<label>Site Açıklama</label>
								<input class="form-control" type="text" name="site_aciklama" value="<?php echo $ayarcek['site_aciklama'] ?>">
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-8 form-group">
								<label>Ana Sayfa Açıklama</label>
								<textarea class="form-control" name="site_anasayfa_aciklama" id="editor"><?php echo $ayarcek['site_anasayfa_aciklama'] ?></textarea>
							</div>
						</div>


						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Link</label>
								<input type="text" class="form-control" name="site_link" value="<?php echo $ayarcek['site_link'] ?>">
							</div>
						</div>


						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Sahibinin Mail Adresi</label>
								<input type="text" class="form-control" name="site_sahip_mail" value="<?php echo $ayarcek['site_sahip_mail'] ?>">
							</div>
						</div>


						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Mail Host Adresi</label>
								<input type="text" class="form-control" name="site_mail_host" value="<?php echo $ayarcek['site_mail_host'] ?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Mail Adresi</label>
								<input type="text" class="form-control" name="site_mail_mail" value="<?php echo $ayarcek['site_mail_mail'] ?>">
							</div>
						</div>


						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Mail Post Numarası</label>
								<input type="text" class="form-control" name="site_mail_port" value="<?php echo $ayarcek['site_mail_port'] ?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Mail Şifresi</label>
								<input type="text" class="form-control" name="site_mail_sifre" value="<?php echo $ayarcek['site_mail_sifre'] ?>">
							</div>
						</div>







						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Facebook</label>
								<input type="text" class="form-control" name="facebook" value="<?php echo $ayarcek['facebook'] ?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Twitter</label>
								<input type="text" class="form-control" name="twitter" value="<?php echo $ayarcek['twitter'] ?>">
							</div>
						</div>


						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Instagram</label>
								<input type="text" class="form-control" name="instagram" value="<?php echo $ayarcek['instagram'] ?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Github</label>
								<input type="text" class="form-control" name="github" value="<?php echo $ayarcek['github'] ?>">
							</div>
						</div>




						<div class="form-row">
							<button type="submit" class="btn btn-primary" name="ayarkaydet">Kaydet</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include 'footer.php' ?>

<script src="vendor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace("editor")
</script>