<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Dispatch</title>

  <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-4">
          <div class="card-header">
            <h2>Search Driver</h2>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-7">

                <form action="" method="GET">
                  <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search NRIC" required value="<?php if (isset($_GET['search'])) {
                                                                                                                      echo $_GET['search'];
                                                                                                                    } ?>">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card mt-4">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>NRIC</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Organization</th>
                  <th>Dispatch Photo</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once "database.php";

                if (isset($_GET['search'])) {
                  $filterValues = $_GET['search'];
                  $query = "SELECT * FROM dispatch WHERE CONCAT(dispatch_nric, dispatch_name, dispatch_phone_no, organization_name) LIKE '%$filterValues%'";
                  $query_run = mysqli_query($conn, $query);

                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $items) {
                ?>
                      <tr>
                        <td><?= $items['dispatch_nric']; ?></td>
                        <td><?= $items['dispatch_name']; ?></td>
                        <td><?= $items['dispatch_phone_no']; ?></td>
                        <td><?= $items['organization_name']; ?></td>
                        <td><?= $items['dispatch_photo']; ?></td>
                      </tr>
                    <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="5">No Record Found</td>
                    </tr>
                <?php

                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>