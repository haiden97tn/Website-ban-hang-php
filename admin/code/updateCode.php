<?php
			include "funcAdmin.php";
			$sql = "select * from discount_code where id = '$_GET[id]' ";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);

			if(isset($_POST["process"]))
			{
                $code = mysqli_escape_string($con,$_POST["code"]);
                $discount = mysqli_escape_string($con,$_POST["discount"]);
				
                $sql = "update discount_code set code = '$code', discount = '$discount' where id = '$_GET[id]' ";
                mysqli_query($con,$sql);
                header("Location:?page=code");
			}
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>Sửa Danh Mục</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Mã Giảm Giá</label>
                <input type="text" name="code" class="form-control" value="<?php echo $row['code']; ?>">
				<label for="inputName">Voucher</label>
				<input type="text" name="discount" class="form-control" value="<?php echo $row['discount']; ?>">
                <a href=""><input type="submit" name="process" value="Update" class="btn btn-info mt-3 float-right"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>