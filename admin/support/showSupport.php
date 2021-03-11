<?php 
   require_once "funcAdmin.php";
	$sql = "select * from support";
  $result = mysqli_query($con,$sql);
 ?>
<section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">             </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Mã SP</th>
                    <th>Họ Tên</th>
                    <th>Tiêu Đề</th>
                    <th style="width:20%">Nội Dung</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Thời Gian</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) {
                  # code...
                ?>
                    <tr>
                      <td><?php echo $row['id_support']; ?> </td>
                      <td><?php echo $row['full_name']; ?></td>
                      <td><?php echo $row['title']; ?> </td>
                      <td><?php echo $row['content']; ?> </td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['create_at']; ?></td>
                      <td><a href="?page=support&action=phan-hoi&id=<?php echo $row['id_support']; ?> " class="btn btn-info" style='background:rgb(241, 99, 99); border:none'>Reply</a></td>
                      <td><a onclick="return window.confirm('Bạn muốn xóa không');" href="?page=support&action=del&id=<?php echo $row['id_support']; ?> " class="btn btn-info" style='background:rgb(241, 99, 99); border:none'>Xóa</a></td>
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