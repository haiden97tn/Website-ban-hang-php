<?php
			include "funcAdmin.php";
			$sql = "select * from products where id_products = '$_GET[id]' ";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);

			$sql1 = "select products.id_category,name_category from category inner join products on  category.id_category=products.id_category where id_products = '$_GET[id]' ";
			$result1 = mysqli_query($con,$sql1);
			$rows = mysqli_fetch_array($result1);

			$sql2 = "select * from category";
			$result2 = mysqli_query($con,$sql2);

			if(isset($_POST["process"]))
			{
                $name = mysqli_escape_string($con,$_POST["name"]);
                $price = mysqli_escape_string($con,$_POST["price"]);
                $sale = mysqli_escape_string($con,$_POST["sale"]);
                $detal = mysqli_escape_string($con,$_POST["detal"]);
                $id_category = mysqli_escape_string($con,$_POST["id_category"]);
				$anh = $_FILES['c_img']['name'];
				if($anh != null)
				{
				$path = "upload1/";
				$tmp_name = $_FILES['c_img']['tmp_name'];
				$anh = $_FILES['c_img']['name'];
				move_uploaded_file($tmp_name,$path.$anh);
					$sql = "update products set images = '$anh' where id_products ='$_GET[id]'";
					mysqli_query($con,$sql);
					header('location:index.php');
				}
					$sql = "update products set name_products = '$name', price = '$price', sale = '$sale', detal = '$detal',id_category = '$id_category'  where id_products = '$_GET[id]' ";
					mysqli_query($con,$sql);
					header("Location:?page=product");
			}
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>Sửa Sản Phẩm</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name_products']; ?>">
				<label for="inputName">Ảnh</label>
				<input type="file" name="c_img">
                <img src="upload1/<?php echo $row['images']; ?>" style="max-width: 100px;"> <br>
                <label for="inputName">Giá gốc</label>
                <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
                <label for="inputName">Giá sale</label>
                <input type="text" name="sale" class="form-control" value="<?php echo $row['sale']; ?>">
                <label for="inputName">Thông tin</label>
				<textarea type="text" name="detal"  class="form-control"  ><?php echo $row['detal']; ?></textarea>
                <script>
                        CKEDITOR.replace( 'detal' );
                </script>
                <label for="inputName">Mã danh mục</label>
                <select name="id_category" id="id_category">
					<option value="<?php echo $rows['id_category']; ?>"><?php echo $rows['name_category']; ?></option>
					<?php while ($row2 = mysqli_fetch_array($result2)) {
					?>
						<option value="<?php echo $row2['id_category']; ?>"><?php echo $row2['name_category']; ?></option>
					<?php } ?>
				</select>
				<hr>
                <a href=""><input type="submit" name="process" value="Update" class="btn btn-info mt-3 float-right"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>