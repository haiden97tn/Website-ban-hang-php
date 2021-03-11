<?php
			include "funcAdmin.php";
			$sql = "select * from news where id = '$_GET[id]' ";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);

			if(isset($_POST["process"]))
			{
				$name = mysqli_escape_string($con,$_POST["name"]);
				$content = mysqli_escape_string($con,$_POST["content"]);
				$anh = $_FILES['c_img']['name'];
				if($anh != null)
				{
				$path = "upload1/";
				$tmp_name = $_FILES['c_img']['tmp_name'];
				$anh = $_FILES['c_img']['name'];
				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "update news set images = '$anh' where id ='$_GET[id]'";
					mysqli_query($con,$sql);
					header('location:index.php');
				}
					$sql = "update news set title = '$name', content = '$content' where id = '$_GET[id]' ";
					mysqli_query($con,$sql);
					header("Location:?page=news");
			}
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>Sửa bài viết</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên bài viết</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['title']; ?>">
				<label for="inputName">Nội dung</label>
				
				<textarea type="text" name="content"  class="form-control"><?php echo $row['content']; ?></textarea>
                <script>
                        CKEDITOR.replace( 'content' );
				</script>
				
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