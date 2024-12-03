<?php
include("header.php");

$time = time();
echo $time;
?>
<form action="save.php" method="post">
    <div class="card my-5" style="width: 18rem;">
        <img src="https://down-id.img.susercontent.com/file/id-11134201-23030-uo7uux4ynbov38" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Kabel NYM</h5>
            <input type="hidden" name="no_ref" value="<?= $time ?>ABCD450204BK">
            <label for="">no rek</label>
            <input type="number" name="no_rek">
            <label for="">nama</label>
            <input type="text" name="nama">
            <label for="">nominal</label>
            <input type="number" name="nominal">
            <button type="submit" class="btn btn-primary" name="submit">Beli Sekarang</button>
        </div>
</form>
</div>