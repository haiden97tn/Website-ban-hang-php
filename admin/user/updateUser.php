<?php
    include "funcAdmin.php";
    include "./db3.php";
    // $sql = "select * from user where user = '$_GET[user]' ";
    //     $result = mysqli_query($con,$sql);
    //     $row = mysqli_fetch_array($result);

    // if(isset($_POST["process"]))
    // {
    //     $permission = mysqli_escape_string($con,$_POST["permission"]);
    //     $active = mysqli_escape_string($con,$_POST["active"]);
    //     $sql = "update user set permission = '$permission',  active = '$active' where user = '$_GET[user]' ";
    //     mysqli_query($con,$sql);
    //     header("Location:?page=user");
    //}
    if (isset($_GET['user'])) {
        $id = $_GET['user'];
        foreach (selectDb("SELECT * FROM user WHERE user = '$id'") as $row) {
            $name = isset($row['user']) ? $row['user'] : '';
            $email = isset($row['email']) ? $row['email'] : '';
            $permission = isset($row['permission']) ? $row['permission'] : '';
            $active = isset($row['active']) ? $row['active'] : '';
        }
        if (isset($_POST['process'])) {
            // $name_new = isset($_POST['name']) ? $_POST['name'] : $nane;
            // $email_new = isset($_POST['email']) ? $_POST['email'] : $email;
            $active_new = isset($_POST['active']) ? $_POST['active'] : $active;
            $permission_new = isset($_POST['permission']) ? $_POST['permission'] : $permission;
            action("UPDATE user SET active='$active_new',permission='$permission_new' WHERE user = '$id'");
            header("Location:?page=user");
        }
    } else {
        header("Location:?page=user");
    }
?>
<div class="row">
	<div class="col-3">	</div>
	<div class="col-6 my-4">
		<h3>Sửa User</h3>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
                <label for="inputName">Uesr  Name</label>
                <input type="text" name="name" value="<?= $name ?>" class="form-control" disabled><br>
				<label for="inputName">Gmail</label>
                <input type="text" value="<?= $email ?>" name="email" class="form-control" disabled><br>
				<label for="inputName" >Trạng Thái</label>
                <select name="active" id="active">
					<option value="<?php echo $row['active']; ?>"><?php if($row['active']==0){
                                                                            echo "Bị Khóa";
                                                                    }else{
                                                                        echo "Hoạt Động";
                                                                    } ?>
                    </option>
                    <option value=<?php if($row['active']==0){
                                                    echo "1";
                                        }else{
                                            echo "0";
                                        } ?>>
                                    <?php if($row['active']==0){
                                               echo "Hoạt Động";
                                        }else{
                                            echo "Bị Khóa";
                                        } ?></option>
					
				</select>

				<label for="inputName" style="padding-left:50px" >Phân Quyền</label>
                <select name="permission" id="permission">
					<option value="<?php echo $row['permission']; ?>"><?php if($row['permission']==0){
                                                                            echo "Admin";
                                                                    }else{
                                                                        echo "Người Dùng";
                                                                    } ?>
                    </option>
                    <option value=<?php if($row['permission']==0){
                                                    echo "1";
                                        }else{
                                            echo "0";
                                        } ?>>
                                    <?php if($row['permission']==0){
                                               echo "Người Dùng";
                                        }else{
                                            echo "Admin";
                                        } ?></option>
					
				</select>
					
            
				<hr>
                <a href=""><input type="submit" name="process" value="Update" class="btn btn-info mt-3 float-right"></a>
             </div>
		</form>
	</div>
	<div class="col-3">	</div>
</div>