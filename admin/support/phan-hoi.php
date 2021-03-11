<?php 
   require_once "funcAdmin.php";
  $id = $_GET['id'];
	$sql = "select * from support where id_support = '$id'";
    $result = mysqli_query($con,$sql);
    while( $rows = mysqli_fetch_array($result)){
        $full_name = $rows['full_name'];
        $email = $rows['email'];
        $title = $rows['title'];
    }

    //gui email cho khach
    if (isset($_POST['btnsend'])) {
        extract($_REQUEST);

        // $file_name = $_FILES['file']['name'];
        // move_uploaded_file($_FILES['file']['tmp_name'], 'image/' . $file_name);

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
                <h3>Phản hồi & giải đáp khách hàng</h3>
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
                    <td><?php echo $title ?></td>
                  </tr>
                  <tr>
                    <td>Nội dung trả lời khách hàng:</td>
                    <td><textarea name="body" id="" cols="100%" style="border:0.5px solid gray;" rows="10"></textarea> </td>
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