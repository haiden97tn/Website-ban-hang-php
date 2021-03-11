<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>THÊM MÃ GIẢM GIÁ</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Mã Giảm Giá</label>
                <input type="text" name="code" class="form-control">
                <label for="inputName">Voucher</label>
                <input type="text" name="discount" class="form-control">
                <a href=""><input type="submit" name="btn_add" class="btn btn-info mt-3 float-right" value="THÊM MÃ"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>

<?php 
	require_once "funcAdmin.php";
	if(isset($_POST["btn_add"]))
	{
        $code = mysqli_escape_string($con,$_POST["code"]);
        $discount = mysqli_escape_string($con,$_POST["discount"]);
	
			$sql = "insert into discount_code(code,discount) values('$code','$discount')";
			mysqli_query($con,$sql);
			header('location:?page=code');
		
	}
 ?>