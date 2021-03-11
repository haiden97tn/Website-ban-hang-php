<?php 
   require_once "funcAdmin.php";
	$sql = "select comments.id_products, name_products,count(id_comments) as slcm from comments inner join products on comments.id_products=products.id_products group by comments.id_products,name_products";
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
                    <th>Mã SP</th>
                    <th>Tên Sản Phẩm</th>
                    <th>SL Comment</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) {
                  # code...
                ?>
                    <tr>
                      <td><?php echo $row['id_products']; ?> </td>
                      <td><?php echo $row['name_products']; ?></td>
                      <td><?php echo $row['slcm']; ?></td>
                      <td><a href="?page=cm&action=listcm&id=<?php echo $row['id_products']?>" class="btn btn-info">Xem Comment</a></td>
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
