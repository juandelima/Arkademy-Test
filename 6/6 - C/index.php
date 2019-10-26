<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT cs.name AS name_cashier, pd.name AS p_name, ct.name AS c_name, pd.price AS harga FROM cashier cs INNER JOIN product pd ON cs.id = pd.id_cashier INNER JOIN category ct ON ct.id = pd.id_category ORDER BY pd.price ASC");
$get_product = mysqli_query($mysqli, "SELECT * FROM product");
// print_r($result)
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Arkademy Coffeshop</title>
    <style>
        /* CUSTOM CSS */
        .btn-danger {
            color: #fff;
            background-color: #ff8fb2;
            border-color: #ff8fb2;
        }

        .navbar {
            box-shadow: 1px -6px 10px 1px;
        }
    </style>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-light m-b100">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="img/logo.JPG" width="300" height="75" alt="">
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <button class="btn btn-danger my-2 my-sm-0" data-toggle="modal" data-target="#tambah">ADD</button>
                </div>
                </div>
        </nav>
    <div class="container" style="margin-top: 40px;">
            <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cashier</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Acion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                         $no = 0;
                         while($user_data = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td><?php echo ++$no; ?></td>
                         <td><?php echo $user_data['name_cashier']; ?></td>
                         <td><?php echo $user_data['p_name']; ?></td>
                         <td><?php echo $user_data['c_name']; ?></td>
                         <td>Rp. <?php echo number_format($user_data['harga'],2,',','.'); ?></td>
                         <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-target="#delete<?php echo $no; ?>">Delete</button>
                         </td>
                      </tr>

                      <?php } ?>
                     <!-- <tr>
                         <td>1</td>
                         <td>Pevita Pearce</td>
                         <td>Latte</td>
                         <td>Drink</td>
                         <td>Rp. 10.000</td>
                         <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                         </td>
                     </tr>

                     <tr>
                            <td>2</td>
                            <td>Raisa Andriana</td>
                            <td>Cake</td>
                            <td>Food</td>
                            <td>Rp. 20.000</td>
                            <td>
                               <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
                               <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr> -->
                    </tbody>
        </table>

        <!-- MODAL -->
        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">ADD</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post" name="form1">
                            <div class="form-group">
                              <label for="inputAddress">Name</label>
                              <input type="text" name="name" class="form-control" id="inputAddress" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="inputState">Product</label>
                                <select id="inputState" class="form-control" name="product">
                                    <option selected>Choose...</option>
                                    <?php
                                      $no = 0;
                                      while($data = mysqli_fetch_array($get_product)) {
                                    ?>
                                    <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                    <?php
                                    } 
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Category</label>
                                <input type="text" name="category" class="form-control" id="inputAddress" placeholder="category">
                            </div>

                            <div class="form-group">
                                    <label for="inputAddress">Price</label>
                                    <input type="text" name="price" class="form-control" id="inputAddress" placeholder="price">
                            </div>
                            <button type="submit" class="btn btn-danger" name="tambah">ADD</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="tambahTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <form>
                                <div class="form-group">
                                  <label for="inputAddress">Name</label>
                                  <input type="text" name="name" class="form-control" id="inputAddress" placeholder="name" value="Pevita Pearce">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Product</label>
                                    <select id="inputState" class="form-control" name="product">
                                        <option selected>Latte</option>
                                        <option>...</option>
                                    </select>
                                </div>
    
                                <div class="form-group">
                                    <label for="inputAddress">Category</label>
                                    <input type="text" name="category" class="form-control" id="inputAddress" placeholder="category" value="Drink">
                                </div>
    
                                <div class="form-group">
                                        <label for="inputAddress">Price</label>
                                        <input type="text" name="price" class="form-control" id="inputAddress" placeholder="price" value="10.000">
                                </div>
                                <button type="submit" class="btn btn-danger">Edit</button>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </div>
    <!-- kagak sempet buat crudnya. kerjain 3 jam kebut -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>