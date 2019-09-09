<?php include 'header.php' ?>

<?php include 'footer.php' ?>


<?php 
if (@$_GET['durum']=="ok") { ?>
  <script type="text/javascript">
   Swal.fire({
    type: 'success',
     title: 'İşlem Başarılı',
     text: 'İşleminiz Başarıyla Gerçekleştirildi',
     confirmButtonText: "Tamam"
   })
 </script>
 <?php } ?>


 <?php 
if (@$_GET['durum']=="no") { ?>
  <script type="text/javascript">
   Swal.fire({
    type: 'error',
     title: 'Hata',
     text: 'İşleminiz Başarısız Oldu Lütfen Tekrar Deneyin',
     confirmButtonText: "Tamam"
   })
 </script>
 <?php } ?>