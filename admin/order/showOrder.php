<?php 
   require_once "funcAdmin.php";
	$sql = "select * from `order`";
  $result = mysqli_query($con,$sql);
 ?>
<section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Sản Phẩm</th>
                    <th>Mã Giảm</th>
                    <th>Tổng Tiền</th>
                    <th>Thời Gian</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($row = mysqli_fetch_array($result)){
                  # code...
                ?>
                    <tr>
                      <td><?php echo $row['id_order']; ?> </td>
                      <td><?php echo $row['user']; ?></td>
                      <td><a href="?page=order&action=orderDetails&id=<?php echo $row['id_order']?>" class="btn btn-info"><?php echo $row['amount']?></a></td>
                      <td><?php echo $row['codes']; ?></td>
                      <td><?php echo  number_format ($row['total']); ?> VNĐ</td>
                      <td><?php echo $row['date_set']; ?></td>
                      <td><a href="?page=order&action=xac-nhan&id=<?php echo $row['id_order']; ?> " class="btn btn-info">Xác Nhận</a></td>
                      <td><a onclick="return window.confirm('Bạn muốn xóa không');" href="?page=order&action=del&id=<?php echo $row['id_order']; ?> " class="btn btn-info" style='background:rgb(241, 99, 99); border:none'>Xóa</a></td>
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
