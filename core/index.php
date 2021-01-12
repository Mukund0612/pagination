<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
include 'config.php';
$database = new Database();
$con = $database->getConnection();

$sql = "SELECT * FROM test";
$result = mysqli_query($con, $sql);
$total_record = mysqli_num_rows($result);
$limit = 3;
$total_page = ceil($total_record / $limit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid header p-4">
        <div class="col-lg-2">
            <img src="assets/image/logo.png" alt="Site logo" width="150px">
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $offset = ($page - 1) * $limit; 
                $sql = "SELECT * FROM test LIMIT {$offset}, $limit";
                $result = mysqli_query($con, $sql);
                    if ($total_record > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['handle']; ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>

        <div class="demo" style="margin-top: 50px;">
            <nav class="pagination-outer" aria-label="Page navigation">
                <ul class="pagination">
                <?php
                ($page > 1) ? $enable = "" : $enable = "disabled";
                echo '<li class="page-item">
                    <a href="index.php?page='.($page - 1).'" class="page-link '.$enable.'" aria-label="Previous">
                        <span aria-hidden="true">PREV</span>
                    </a>
                </li>';
                for ($i = 1; $i <= $total_page; $i++) {
                    ($page == $i ) ? $page_status = 'active' : $page_status = '';
                        echo '<li class="page-item '.$page_status.'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                }
                
                // <!-- <li class="page-item active"><a class="page-link" href="#">3</a></li> -->
                ($total_page > $page) ? $enable = "" : $enable = "disabled";
                    echo '<li class="page-item">
                        <a href="index.php?page='.($page + 1).'" class="page-link '.$enable.'" aria-label="Next">
                            <span aria-hidden="true">NEXT</span>
                        </a>
                    </li>';
                ?>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>