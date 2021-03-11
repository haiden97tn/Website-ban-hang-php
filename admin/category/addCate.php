<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>THÊM DANH MỤC</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên danh mục</label>
                <input type="text" name="name_category" class="form-control">
				<label for="">Images</label> <br>
				<input type="file" name="images" >
                <a href=""><input type="submit" name="btn_add" class="btn btn-info mt-3 float-right" value="THÊM DANH MỤC"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>

<?php 
	require_once "funcAdmin.php";
	if(isset($_POST["btn_add"]))
	{
		$name = mysqli_escape_string($con,$_POST["name_category"]);
		$images = $_FILES['images']['name'];

		if($images != null)
		{
		$path = "upload1/";
		$tmp_name = $_FILES['images']['tmp_name'];
		$images = $_FILES['images']['name'];

		move_uploaded_file($tmp_name,$path.$images);
			$sql = "insert into category(name_category,images) values('$name','$images')";
			mysqli_query($con,$sql);
			header('location:?page=cate');
		}
	}
 ?>