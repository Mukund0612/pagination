<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
</head>

<body>
    <div class="container-fluid header p-4">
        <div class="col-lg-2">
            <img src="<?php echo base_url('assets/image/logo.png'); ?>" alt="Site logo" width="150px">
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
                foreach ($allRecord as $data) {
                ?>
                <tr>
                    <th scope="row"><?php echo $data->id; ?></th>
                    <td><?php echo $data->first_name; ?></td>
                    <td><?php echo $data->last_name; ?></td>
                    <td><?php echo $data->handle; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="demo" style="margin-top: 50px;">
            <nav class="pagination-outer" aria-label="Page navigation">
                <?php echo $this->pagination->create_links(); ?>
                <!-- <ul class="pagination">
                <li class="page-item">
                    <a href="index.php?page='.($page - 1).'" class="page-link '.$enable.'" aria-label="Previous">
                        <span aria-hidden="true">PREV</span>
                    </a>
                </li>
                <li class="page-item '.$page_status.'"><a class="page-link" href="index.php?page='.$i.'">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                        <a href="index.php?page='.($page + 1).'" class="page-link '.$enable.'" aria-label="Next">
                            <span aria-hidden="true">NEXT</span>
                        </a>
                    </li>
                </ul> -->
            </nav>
        </div>
    </div>
</body>

</html>