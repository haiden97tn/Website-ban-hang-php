<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>THÊM BANNER</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên banner</label>
                <input type="text" name="name_banner" class="form-control">
				<label for="">Images</label> <br>
				<input type="file" name="images" >
				<label for="inputName">Link</label>
                <input type="text" name="link" class="form-control">
				<label for="">Vị trí:</label>
				<select name="vitri" id="id">
					<option value=""></option>
					<option value="vitri1">Vị trí 1</option>
					<option value="vitri2">Vị trí 2</option>
					<option value="vitri3">Vị trí 3</option>
					<option value="vitri4">Vị trí 4</option>
				</select>
                <a href=""><input type="submit" name="btn_add" class="btn btn-info mt-3 float-right" value="THÊM BANNER"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>

<?php 
	require_once "funcAdmin.php";
	if(isset($_POST["btn_add"]))
	{
		$name = mysqli_escape_string($con,$_POST["name_banner"]);
		$link = mysqli_escape_string($con,$_POST["link"]);
		$vitri = mysqli_escape_string($con,$_POST["vitri"]);
		$images = $_FILES['images']['name'];

		if($images != null)
		{
		$path = "upload1/";
		$tmp_name = $_FILES['images']['tmp_name'];
		$images = $_FILES['images']['name'];

		move_uploaded_file($tmp_name,$path.$images);
			$sql = "insert into banner(name_banner,images,link,location) values('$name','$images','$link','$vitri')";
			mysqli_query($con,$sql);
			header('location:?page=banner');
		}
	}
 ?>