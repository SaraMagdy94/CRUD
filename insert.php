
<html>
<head>    
    <title>car insert</title>
</head>
<body>
    <?php
        require("conn.php");

        if($_SERVER['REQUEST_METHOD'] =='POST'){

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

            $sql="INSERT INTO `car` (`image`,`cname`,`price`,`description`) VALUES('$image',' $name','$price','$des ')";
				mysqli_query($dbconn,$sql) or die(mysqli_error($dbconn));
				
                echo "File Uploaded Suucessfully ";
                header('location:index.php');
           
            }
    ?>

</body>
</html>