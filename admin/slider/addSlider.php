<?php
	require_once "funcAdmin.php";
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>THÊM SLIDER</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên Slider</label>
                <input type="text" name="name_slide" class="form-control">
				<label for="">Images</label> <br>
                <input type="file" name="images" > <br>
                <label for="inputName">Link</label>
				<input type="text" name="link" class="form-control">
				<label for="inputName">STT</label>
                <input type="text" name="stt" class="form-control">
                <a href=""><input type="submit" name="btn_add" class="btn btn-info mt-3 float-right" value="THÊM SLIDER"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>

<?php 
	if(isset($_POST["btn_add"]))
	{
        $name = mysqli_escape_string($con,$_POST["name_slide"]);
		$link = mysqli_escape_string($con,$_POST["link"]);
		$stt = mysqli_escape_string($con,$_POST["stt"]);
		$images = $_FILES['images']['name'];
		if($images != null)
		{


		$path = "upload1/";
		$tmp_name = $_FILES['images']['tmp_name'];
		$images = $_FILES['images']['name'];

		move_uploaded_file($tmp_name,$path.$images);
			$sql = "insert into slide(name_slide,images,link,stt) values('$name','$images','$link','$stt')";
			mysqli_query($con,$sql);
			header('location:?page=slider');
		}
	}
 ?>