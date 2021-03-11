<?php 
   require_once "funcAdmin.php";
	$sql1 = "select * from comments where  id_products = '$_GET[id]'";
  $result1 = mysqli_query($con,$sql1);
 ?>
<section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="?page=cm&action"><input type="button" class="btn btn-info" value="QUAY LẠI"></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Mã CM</th>
                    <th>User</th>
                    <th>Content</th>
                    <th>Thời gian</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while ($row1 = mysqli_fetch_array($result1)) {
                  # code...
                ?>
                    <tr>
                      <td><?php echo $row1['id_comments']; ?> </td>
                      <td><?php echo $row1['user']; ?></td>
                      <td><?php echo $row1['content']; ?></td>
                      <td><?php echo $row1['create_at']; ?></td>
                      <td><a onclick="return window.confirm('Bạn muốn xóa không');" href="?page=cm&action=del&id=<?php echo $row1['id_comments']; ?> " class="btn btn-info" style='background:rgb(241, 99, 99); border:none'>Xóa</a></td>
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
