<?php 
   require_once "funcAdmin.php";
	$sql = "select * from information";
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
                        <th>Logo</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th></th>
                    </tr>
                  
                  </thead>
                  <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) {
                  # code...
                ?>
                    <tr>
                        <td><img src="upload1/<?php echo $row['logo']; ?>" style="max-width: 100px;"></td>
                        <td><?php echo $row['address']; ?> </td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><a href="?page=info&action=update&id=<?php echo $row['id']?>" class="btn btn-info">Sửa</a></td>
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