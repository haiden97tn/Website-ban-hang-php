<?php
			include "funcAdmin.php";
			$sql = "select * from slide where id_slide = '$_GET[id]' ";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);

			if(isset($_POST["process"]))
			{
                $name = mysqli_escape_string($con,$_POST["name"]);
				$link = mysqli_escape_string($con,$_POST["link"]);
				$stt = mysqli_escape_string($con,$_POST["stt"]);
				$anh = $_FILES['c_img']['name'];
				if($anh != null)
				{
				$path = "upload1/";
				$tmp_name = $_FILES['c_img']['tmp_name'];
				$anh = $_FILES['c_img']['name'];
				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "update slide set images = '$anh' where id_slide ='$_GET[id]'";
					mysqli_query($con,$sql);
					header('location:index.php');
				}
					$sql = "update slide set name_slide = '$name', link = '$link', stt = '$stt' where id_slide = '$_GET[id]' ";
					mysqli_query($con,$sql);
					header("Location:?page=slider");
			}
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>Sửa Slide</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên Slide</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name_slide']; ?>"><br>
				<label for="inputName">Ảnh</label>
				<input type="file" name="c_img">
                <img src="upload1/<?php echo $row['images']; ?>" style="max-width: 100px;"> <br>
                <label for="inputName">Link</label>
				<input type="text" name="link" class="form-control" value="<?php echo $row['link']; ?>">
				<label for="inputName">STT</label>
                <input type="text" name="stt" class="form-control" value="<?php echo $row['stt']; ?>">
				<hr>
                <a href=""><input type="submit" name="process" value="Update" class="btn btn-info mt-3 float-right"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>