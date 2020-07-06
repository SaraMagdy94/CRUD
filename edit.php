<?php
    include'includs/header.php';
?>
    <?php
        require("conn.php");

        if($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['id'];
            $dir="image/";
			$image=$_FILES['uploadimg']['name'];
            $temp_name=$_FILES['uploadimg']['tmp_name'];
            $name =$_POST["cname"];
            $price =$_POST["price"];
            $des =$_POST["description"];

            if($image!="")
			{
				if(file_exists($dir.$image))
				{
					$image= time().'_'.$image;
				}

				$fdir= $dir.$image;
				move_uploaded_file($temp_name, $fdir);
            }

            $sql="UPDATE car SET image='$image',cname='$name',price='$price',description='$des' WHERE id=$id";
				mysqli_query($dbconn,$sql) or die(mysqli_error($dbconn));
				
                echo "File Uploaded Suucessfully ";
                header('location:index.php');
           
            }
    ?>
    
    <?php
        $id = $_GET['id'];
        $sql_update="SELECT * FROM car WHERE id=$id";
        $result = mysqli_query($dbconn,$sql_update );
        $res = mysqli_fetch_array($result);
        if($res){
            $image = $res['image'];
            $name = $res['cname'];
            $price =$res["price"];
            $des =$res["description"];
        }
    
    ?>

<div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="edit.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Insert image </label>
                        <input type="file" name="uploadimg" class="form-control" value="<?php echo $image;?>">
                    </div>
                    <div class="form-group">
                        <label>Name Car </label>
                        <input type="text" name="cname" class="form-control" value="<?php echo $name;?>">
                    </div>
                    <div class="form-group">
                        <label>Price Car </label>
                        <input type="txt" name="price" class="form-control" value="<?php echo $price;?>">
                    </div>
                    <div class="form-group">
                        <label>description </label>
                        <textarea name="description" class="form-control"><?php echo $des;?></textarea>

                        <!-- <input type="text" name="description" class="form-control" value="<?php echo $des;?>" > -->
                    </div>
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>

    <?php
    include'includs/footer.php';
?>