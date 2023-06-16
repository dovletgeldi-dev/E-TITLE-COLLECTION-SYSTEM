<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Dispatch</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="styles/dispatchSearch.css">

</head>

<body>

  <div class="container">
    <header>
      <a href="main_page.php" style="display:block;width:180px"><img src="images/logo.png" alt="Logo" width="180px" height="180px"></a>
    </header>

    <div class="row">
      <div class="col-md-12">
        <div class="card mt-4">
          <div class="card-header">
            <h2>SEARCH DRIVER</h2>
          </div>
          <div class="card-body">
            <div class="row">
              <!-- <div class=""> -->
              <form action="#" method="GET">
                <div class="form-group mb-3">
                  <label for="inputlg"></label>
                  <input type="text" onkeyup="myFunction()" id="myInput" class="form-control form-control-lg" placeholder="SEARCH BY NRIC" required>
                </div>
              </form>

              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card mt-4">
          <div class="card-body">
            <table id="myTable" class="table table-bordered">
              <thead>
                <tr>
                  <th>NRIC</th>
                  <th>NAME</th>
                  <th>PHONE NUMBER</th>
                  <th>ORGANIZATION NAME</th>
                  <th>DISPATCH PHOTO</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // require_once "database.php";
                $conn = mysqli_connect(
                  "localhost",
                  "root",
                  "",
                  "etcs_database"
                );
                // $conn2 = mysqli_connect("localhost", "root", "", "webcam");

                // if (isset($_GET['search'])) {
                //   $filterValues = $_GET['search'];
                //   // $query = "SELECT * FROM dispatch WHERE CONCAT(dispatch_nric, dispatch_name, dispatch_phone_no, organization_name) LIKE '%$filterValues%'";
                //   // $query = "SELECT * FROM tb_image ORDER BY id LIKE '%$filterValues%'";
                //   // $query2 = "SELECT * FROM tb_image WHERE CONCAT(image) LIKE '%$filterValues%'";
                // };

                $queryJoin =
                  "SELECT * FROM dispatch INNER JOIN tb_image ON dispatch.id=tb_image.id";
                $query_run = mysqli_query($conn, $queryJoin);

                if (mysqli_num_rows($query_run) > 0) {
                  while ($row = mysqli_fetch_array($query_run)) { ?>
                    <tr>
                      <td><?= $row["dispatch_nric"] ?></td>
                      <td><?= $row["dispatch_name"] ?></td>
                      <td><?= $row["dispatch_phone_no"] ?></td>
                      <td><?= $row["organization_name"] ?></td>
                      <td><img src="img/<?= $row[
                        "image"
                      ] ?>" width="300" height="200"></td>
                    </tr>
                  <?php }
                } else {
                   ?>
                  <tr>
                    <td colspan="5">No Record Found</td>
                  </tr>
                <?php
                }

// }
?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Jquery & Bootstrap5 -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script -->
  <script src="scripts/dispatchSearch.js"></script>
</body>

</html>