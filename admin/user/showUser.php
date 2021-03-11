<?php 
   require_once "funcAdmin.php";
	$sql = "select * from user";
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
                    <th>User</th>
                    <th>Passwd</th>
                    <th>Email</th>
                    <th width="100px;">Quyền</th>
                      <th width="100px;">Trạng Thái</th>
                    <th>Create_at</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) {
                  # code...
                ?>
                    <tr>
                      <td><?php echo $row['user']; ?> </td>
                      <td><?php echo $row['passwd']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo ($row['permission']==1)? 'Người Dùng' : 'Admin'?></td>
                      <td><?php echo ($row['active']==1)? 'Hoạt động' : 'Bị khóa'?></td>
                      <td><?php echo $row['create_at']; ?></td>
                      <td><a href="?page=user&action=update&user=<?php echo $row['user']?>" class="btn btn-info">Sửa</a></td>
                      <td><a onclick="return window.confirm('Bạn muốn xóa không');" href="?page=user&action=del&id=<?php echo $row['user']; ?> " class="btn btn-info" style='background:rgb(241, 99, 99); border:none'>Xóa</a></td>
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