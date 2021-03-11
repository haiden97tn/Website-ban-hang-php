<?php
	include "funcAdmin.php";
	$sql = "select * from information where id = '$_GET[id]' ";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);

	if(isset($_POST["process"]))
	{
		$address = mysqli_escape_string($con,$_POST["address"]);
		$email = mysqli_escape_string($con,$_POST["email"]);
		$phone = mysqli_escape_string($con,$_POST["phone"]);
		$logo = $_FILES['logo']['name'];
		if($logo != null)
		{
		$path = "upload1/";
		$tmp_name = $_FILES['logo']['tmp_name'];
		$logo = $_FILES['logo']['name'];
		move_uploaded_file($tmp_name,$path.$logo);
			$sql = "update information set logo = '$logo' where id ='$_GET[id]'";
			mysqli_query($con,$sql);
			header('location:index.php');
		}
			$sql = "update information set address = '$address', email = '$email', phone = '$phone' where id = '$_GET[id]' ";
			mysqli_query($con,$sql);
			header("Location:?page=info");
	}
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>Sửa Danh Mục</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Địa chỉ:</label>
                <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
                <label for="inputName">Email:</label>
                <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                <label for="inputName">Phone:</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
				<label for="inputName">Logo</label>
				<input type="file" name="logo">
				<img src="upload1/<?php echo $row['logo']; ?>" style="max-width: 100px;">
				<hr>
                <a href=""><input type="submit" name="process" value="Update" class="btn btn-info mt-3 float-right"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>