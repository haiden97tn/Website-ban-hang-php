<?php 
   require_once "funcAdmin.php";
	$sql1 = "select * from products where  id_products = '$_GET[id]'";
  $result1 = mysqli_query($con,$sql1);
  $row = mysqli_fetch_array($result1)
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title></title>
 </head>
 <body>
 <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="http://localhost/du_an_1/admin/?page=product"><input type="button" class="btn btn-info" value="QUAY LẠI"></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="width:60%; text-align: center;margin-left:20%">
                <?php  echo $row['detal']; ?>
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
 </body>
 </html>