<?php
			include "funcAdmin.php";
			$sql = "select * from banner where id = '$_GET[id]' ";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);

				$sql2 = "select * from banner";
				$result2 = mysqli_query($con,$sql2);

			if(isset($_POST["process"]))
			{
				$name = mysqli_escape_string($con,$_POST["name_banner"]);
				$link = mysqli_escape_string($con,$_POST["link"]);
				$anh = $_FILES['c_img']['name'];
				if($anh != null)
				{
				$path = "upload1/";
				$tmp_name = $_FILES['c_img']['tmp_name'];
				$anh = $_FILES['c_img']['name'];
				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "update banner set images = '$anh' where id ='$_GET[id]'";
					mysqli_query($con,$sql);
					header('location:index.php');
				}
					$sql = "update banner set name_banner = '$name' where id= '$_GET[id]' ";
					mysqli_query($con,$sql);
					header("Location:?page=banner");

					$sql = "update banner set link = '$link' where id= '$_GET[id]' ";
					mysqli_query($con,$sql);
					header("Location:?page=banner");
			}
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>Sửa </h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên banner</label>
                <input type="text" name="name_banner" class="form-control" value="<?php echo $row['name_banner']; ?>">
				<label for="inputName">Ảnh</label>
				<input type="file" name="c_img">
				<img src="upload1/<?php echo $row['images']; ?>" style="max-width: 100px;">
				<label for="inputName">Link</label>
                <input type="text" name="link" class="form-control" value="<?php echo $row['link']; ?>">
				<label for="">Vị trí:</label>
                <select name="vitri" id="vitri">
					<option value="<?php echo $row['id']; ?>"><?php echo $row['location']; ?></option>
					<?php while ($row2 = mysqli_fetch_array($result2)) {
					?>
						<option value="<?php echo $row2['id']; ?>"><?php echo $row2['location']; ?></option>
					<?php } ?>
				</select>
				<hr>
                <a href=""><input type="submit" name="process" value="Update" class="btn btn-info mt-3 float-right"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>