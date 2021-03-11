<?php 
   require_once "funcAdmin.php";
   echo $id = $_GET['id'];
   

   //lay tong tien
	  $sql = "select * from `order` where `id_order` = '$id'";
    $result = mysqli_query($con,$sql);
    while( $rows = mysqli_fetch_array($result)){
        $total = $rows['total'];
        $user = $rows['user'];
        // $email = $rows['email'];
        // $title = $rows['title'];
    }

    //lay ten khach hang
    $sql1 = "select * from user where user = '$user' ";
    $result1 = mysqli_query($con,$sql1);
    while($rows1 = mysqli_fetch_array($result1)){
      $full_name = $rows1['ho_ten'];
      $email = $rows1['email'];
    }


    //gui email cho khach
    $title="Cảm ơn quý khách đã đặt hàng từ Mobile Shop";

    if (isset($_POST['btnsend'])) {
      $body = $_POST['body'];
      $totalPrice = $_POST['totalPrice'];
      $title = "Cảm ơn quý khách đã đặt hàng từ Mobile Shop";
      require_once('send.php');
    }

    

 ?>
<section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">             </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h3>Xác nhận đơn hàng</h3>
              <form action="" method="post" enctype="multipart/form-data">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <td>Tên khách hàng:</td>
                    <td><?php echo $full_name ?></td>
                  </tr>
                  <tr>
                    <td>Email khách</td>
                    <td><?php echo $email ?></td>
                  </tr>
                  <tr>
                    <td>Tiêu đề</td>
                    <td ><?php echo $title; ?></td>
                  </tr>
                  <tr>
                    <td>Nội dung đơn hàng:</td>
                    <td>
                      <table name="body">

                        <tr>
                          <td colspan=2><h4>Đơn hàng của quý khách sẽ được vẫn chuyển trong khoảng từ 3 - 5 ngày, vui lòng chú ý điện thoại để nhận hàng. Xin cảm ơn quý khách.</h4></td>
                        </tr>   
                        <tr>
                          <td colspan=2>Danh sách hóa đơn</td>
                        </tr>
                        <tr height="300px">
                          <td>Tên sản phẩm</td>
                          <td width="50%">
                          <textarea readonly  type="text" name = "body" style="border:none; out-line:none; background-color:white;" rows="10" cols="50" ><?php
                            $sql2 = "select * from order_details where id_order = '$id' ";
                            $result2 = mysqli_query($con,$sql2);
                            while( $rows2 = mysqli_fetch_array($result2)){
                              $sql3 = "select * from products where id_products = '$rows2[id_products]' ";
                              $result3 = mysqli_query($con,$sql3);
                              while( $rows3 = mysqli_fetch_array($result3)){
                          ?><?php
                              echo $rows3['name_products'].' - ';
                              echo $price = ' Giá: '.number_format($rows3['price']).' VND';
                              echo '</br>';
                            ?>
                          <?php
                                }
                              }
                          ?></textarea>
                           </td>
                        </tr>
                        <tr>
                          <td>Tổng tiền</td>
                          <td><input type = "text" name = "totalPrice" style = "border:none;" readonly value = "<?php echo number_format($total); ?> VND"/></td>

                        </tr>
                      </table>
                      <!-- <textarea name="body" id="" cols="100%" style="border:0.5px solid gray;" rows="10"> -->
                        
                      <!-- </textarea>  -->
                    </td>
                  </tr>
                    
                  <tr>
                    <td colspan=2><button type="submit" name="btnsend" >Gửi</button></td>
                  </tr>
                  </thead>
                  <tbody>
                     
                  </tbody>
                </table>
                </form>
                <div class="page">
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

