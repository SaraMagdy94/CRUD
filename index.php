<?php
    require("conn.php");
    $sql='SELECT * FROM car';
    $result = mysqli_query($dbconn, $sql);
    $num= mysqli_num_rows($result);
?>
<?php
    include'includs/header.php';
?>

    <div class="container">
        <div class="row all">
            <?php 
                for($i=0;$i<$num;$i++){
                $row= mysqli_fetch_array($result);
            ?>
            <div class="col-md-3">
                <div class="col_one">
                <div class="row ">
                    <div class="col-md-8"><img src="image/<?= $row['image'] ?>" class="img-index img-fluid "></div>

                    <div class="col-md-4">
                        <h3><?= $row['cname'] ?></h3>
                        <h3><?= $row['price'] ?></h3>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                    <?= $row['description'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col update">
                    <a href="edit.php?id=<?= $row['id']?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id']?>">Delete</a>
                    </div>
                </div>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="row">
            <div class="col">
            <button class="btn  btn-dark text-center d-block align-items-center m-auto " ><a href="index.html">Add New Data</a></button>
            </div>
        </div>
    </div>

<?php
    include'includs/footer.php';
?>