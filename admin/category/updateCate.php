<?php
			include "funcAdmin.php";
			$sql = "select * from category where id_category = '$_GET[id]' ";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);

			if(isset($_POST["process"]))
			{
				$name = mysqli_escape_string($con,$_POST["name"]);
				$anh = $_FILES['c_img']['name'];
				if($anh != null)
				{
				$path = "upload1/";
				$tmp_name = $_FILES['c_img']['tmp_name'];
				$anh = $_FILES['c_img']['name'];
				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "update category set images = '$anh' where id_category ='$_GET[id]'";
					mysqli_query($con,$sql);
					header('location:index.php');
				}
					$sql = "update category set name_category = '$name' where id_category = '$_GET[id]' ";
					mysqli_query($con,$sql);
					header("Location:?page=cate");
			}
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>Sửa Danh Mục</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên danh mục</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name_category']; ?>">
				<label for="inputName">Ảnh</label>
				<input type="file" name="c_img">
				<img src="upload1/<?php echo $row['images']; ?>" style="max-width: 100px;">
				<hr>
                <a href=""><input type="submit" name="process" value="Update" class="btn btn-info mt-3 float-right"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>