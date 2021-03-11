<?php
	require_once "funcAdmin.php";
	$sql = "select * from category";
	$result = mysqli_query($con,$sql);
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>THÊM SẢN PHẨM</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên sản phẩm</label>
                <input type="text" name="name_products" class="form-control">
				<label for="">Images</label> <br>
                <input type="file" name="images" > <br>
                <label for="inputName">Giá gốc</label>
                <input type="text" name="price" class="form-control">
                <label for="inputName">Giá sale</label>
                <input type="text" name="sale" class="form-control">
                <label for="inputName">Thông tin</label>
				<!-- <input type="text" name="detal" class="form-control"> -->
				<textarea type="text" name="detal"  class="form-control"></textarea>
                <script>
                        CKEDITOR.replace( 'detal' );
                </script>
                <label for="">Danh mục:</label>
				<select name="id_category" id="id_category">
					<option value=""></option>
					<?php while ($row = mysqli_fetch_array($result)) {
					?>
						<option value="<?php echo $row['id_category']; ?>"><?php echo $row['name_category']; ?></option>
					<?php } ?>
				</select>
                <a href=""><input type="submit" name="btn_add" class="btn btn-info mt-3 float-right" value="THÊM SẢN PHẨM"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>

<?php 
	if(isset($_POST["btn_add"]))
	{
        $name = mysqli_escape_string($con,$_POST["name_products"]);
        $price = mysqli_escape_string($con,$_POST["price"]);
        $sale = mysqli_escape_string($con,$_POST["sale"]);
        $detal = mysqli_escape_string($con,$_POST["detal"]);
        $id_category = mysqli_escape_string($con,$_POST["id_category"]);
		$images = $_FILES['images']['name'];
		if($images != null)
		{


		$path = "upload1/";
		$tmp_name = $_FILES['images']['tmp_name'];
		$images = $_FILES['images']['name'];

		move_uploaded_file($tmp_name,$path.$images);
			$sql = "insert into products(name_products,images,price,sale,detal,id_category) values('$name','$images','$price','$sale','$detal','$id_category')";
			mysqli_query($con,$sql);
			header('location:?page=product');
		}
	}
 ?>