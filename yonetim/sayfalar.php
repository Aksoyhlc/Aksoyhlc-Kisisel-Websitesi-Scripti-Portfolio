
<?php include 'header.php'; 



$sorgu=$db->prepare("SELECT * FROM sayfalar");
$sorgu->execute();
$sayfa=$sorgu->fetch(PDO::FETCH_ASSOC);

?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="font-weight-bold text-primary">Sayfalar</h5>
				</div>
				<div class="card-body">
					<form action="islemler/ajax.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

						<div class="form-row">
							<div class="col-md-12 form-group">
								<label>Tanıtım Sayfası</label>
								<textarea class="form-control" name="tanitim_sayfasi" id="editor"><?php echo $sayfa['tanitim_sayfasi'] ?></textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-12 form-group">
								<label>Çalışmalarım Sayfası</label>
								<textarea class="form-control" name="calismalarim_sayfasi" id="editor2"><?php echo $sayfa['calismalarim_sayfasi'] ?></textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-12 form-group">
								<label>Hakkımda Sayfası</label>
								<textarea class="form-control" name="hakkimda_sayfasi" id="editor3"><?php echo $sayfa['hakkimda_sayfasi'] ?></textarea>
							</div>
						</div>


						<div class="form-row">
							<button type="submit" class="btn btn-primary" name="sayfakaydet">Kaydet</button>
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
	CKEDITOR.replace("editor");
	CKEDITOR.replace("editor2");
	CKEDITOR.replace("editor3")
</script>