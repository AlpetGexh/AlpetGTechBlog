<?php
$msg = "";
include "../server.php";
include "../database/config.php";

?>

<?php get_Aheader("Admin"); ?>

<div id="layoutSidenav_content">

    <div class="container mt-5 h-100">
        <?php
        if (!empty($msg)) {
            echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>' . $msg . ' </strong>  <br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;<a href="apliko_online.php"></a></span>
    </button>
</div>';
        }
        ?>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">SMS</th>
                    <th scope="col">Opsionet</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require("../database/config.php");
                $c_sql = "SELECT * from kontakit ";
                if ($result = mysqli_query($db, $c_sql)) {
                    $i = 1;
                    foreach ($result as $key => $ko_row) {

                        //$ko_row['id']
                        echo ' <tr>
                        <td> ' . $i++ . ' </td> 
                        <td> ' . $ko_row['email'] . ' </td>
                       <td> <textarea class="" rows="2" cols="40" readonly=""> ' . $ko_row["sms"] . '</textarea></td>
                        <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_' . $ko_row["id"] . ' ">Fshije</a> </td>
                        </tr>  ';
                        $path = "delete/sms_delete.php";
                        get_modal($ko_row["id"],$path,"Kujedes","A deshironi ta fshini mesazhin");
                    }
                }

                ?>

            </tbody>
        </table>

    </div>

    </body>

    </html>