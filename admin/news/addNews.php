
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>THÊM TIN TỨC</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên tiêu đề</label>
                <input type="text" name="title" class="form-control">
				<label for="inputName">Nội dung</label>
				<textarea type="text" name="content"  class="form-control"></textarea>
                <script>
                        CKEDITOR.replace( 'content' );
                </script>
				<label for="">Images</label> <br>
				<input type="file" name="images" >
                <a href=""><input type="submit" name="btn_add" class="btn btn-info mt-3 float-right" value="THÊM MỚI"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>

<?php 
	require_once "funcAdmin.php";
	if(isset($_POST["btn_add"]))
	{
		$name = mysqli_escape_string($con,$_POST["title"]);
		$content = mysqli_escape_string($con,$_POST["content"]);
		$images = $_FILES['images']['name'];

		if($images != null)
		{
		$path = "upload1/";
		$tmp_name = $_FILES['images']['tmp_name'];
		$images = $_FILES['images']['name'];

		move_uploaded_file($tmp_name,$path.$images);
			$sql = "insert into news(title,content,images) values('$name','$content','$images')";
			mysqli_query($con,$sql);
			header('location:?page=news');
		}
	}
 ?>