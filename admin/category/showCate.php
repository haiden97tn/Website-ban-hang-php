<?php 
   require_once "funcAdmin.php";
	$sql = "select * from category";
  $result = mysqli_query($con,$sql);
 ?>
<section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="?page=cate&action=add"><input type="button" class="btn btn-info" value="THÊM DANH MỤC"></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>images</th>
                    <th>Thời gian</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) {
                  # code...
                ?>
                    <tr>
                      <td><?php echo $row['id_category']; ?> </td>
                      <td><?php echo $row['name_category']; ?></td>
                      <td><img src="upload1/<?php echo $row['images']; ?>" style="max-width: 100px;"></td>
                      <td><?php echo $row['careate_at']; ?></td>
                      <td><a href="?page=cate&action=update&id=<?php echo $row['id_category']?>" class="btn btn-info">Sửa</a></td>
                      <td><a onclick="return window.confirm('Bạn muốn xóa không');" href="?page=cate&action=del&id=<?php echo $row['id_category']; ?> " class="btn btn-info" style='background:rgb(241, 99, 99); border:none'>Xóa</a></td>
                    </tr>
                <?php } ?>
                     
                  </tbody>
                </table>
                <div class="page">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="">1</a></li>
                  <li class="page-item"><a class="page-link" href="">2</a></li>
                  <li class="page-item"><a class="page-link" href="">3</a></li>
                  <li class="page-item"><a class="page-link" href="">4</a></li>
                  <li class="page-item"><a class="page-link" href="">5</a></li>
                </ul>
              </div>
              <!-- .page -->
              </div>
             
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      

    <!-- /.content -->
  </div>
  </section>
