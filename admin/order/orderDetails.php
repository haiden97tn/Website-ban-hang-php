<?php 
   require_once "funcAdmin.php";
	$sql = "select products.name_products, products.price,quantity from order_details inner join products on order_details.id_products=products.id_products  where id_order = '$_GET[id]'";
  $result = mysqli_query($con,$sql);
 ?>
<section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="http://localhost/du_an_1/admin/?page=order"><input type="button" class="btn btn-info" value="QUAY LẠI"></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($row = mysqli_fetch_array($result)){
                  # code...
                ?>
                    <tr>
                      <td><?php echo $row['name_products']; ?> </td>
                      <td><?php echo  number_format ($row['price']); ?> VNĐ</td>
                      <td><?php echo $row['quantity']; ?></td>
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
