<?php
include "server.php";
include "database/config.php";
$id = $_REQUEST['id'];

//rrit viewsat per 1 pas cdo shikimi
mysqli_query($db, "UPDATE post set views = views +1  WHERE id ='$id' ");

// $u_sql = "SELECT * from users where id = '$id' ";
// $u_result = mysqli_query($db, $u_sql);
// $u_row = $u_result->fetch_assoc();
// $user_id = $u_row['id'];
// echo $user_id;

$sql = "SELECT p.id,p.photo,p.date,p.views,p.titulli,p.body,p.category ,u.username , p.userid FROM users u, post p WHERE p.userid = u.id  and p.id = '$id' ORDER BY id DESC ";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
$c_category = $row['category'];

$c_sql = "SELECT * from post_categories where id = '$c_category' ";
$c_result = mysqli_query($db, $c_sql);
$c_row = $c_result->fetch_assoc();


?>
<?php get_header("" . $row['titulli'] . " "); ?>


<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php" style="color: #333 !important; ">Home</a>
    </li>

    <li class="breadcrumb-item active" style="color: #01cd74 !important;"><?php echo " <a href='category.php? id=" . $c_row['id'] . "'>" . $c_row['emri'] . "</a> " ?></li>
    <li class="breadcrumb-item active" style="color: #01cd74 !important;"><?php echo " " . $row['titulli'] . ""; ?></li>
</ol>


<div class=" container mt-5">
    <!-- <h3 class="tittle"></h3> -->
    <div class="row">
        <div class="col-lg-8 text-left mt-4">
            <div class="single_post">
                <div class="single_post_info">
                    <img src="assets/img/post/<?php echo $row['photo']; ?>" class="img-fluid" alt="image not available" style="width:900px;height:380px" loading="lazy">
                    <div class="single_post_info_show">
                        <ul>
                            <li>
                                <a href="user.php?id= <?php echo $row['userid'] ?> ">
                                    <i class="far fa-calendar-alt"></i><?php echo strftime('%e %B, %Y', strtotime($row['date']))  ?>
                                    <i class="far fa-eye fa-x2"></i><?php echo $row['views']; ?>
                                    <i class="far fa-user fa-x2"></i><?php echo $row['username']; ?>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <h1><?php echo $row['titulli']; ?></h1>

                <p><?php echo $row['body']; ?></p>
            </div>
        </div>

        <?php get_widget(); ?>

    </div>
</div>
<?php get_footer(); ?>