<?php include 'signup.php';?>

<html>
<head>
  <title>LearnPHP</title>
</head>   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<!-- Inclusion de Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style type="text/css">
    .container {
        text-align: center;
        display: center;
        justify-content: space-between;
    }
    footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 10px 0;
    }
    body {
      background-image: url("back.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    max-width: 100%;
    height: auto;

    }

  .box {
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    max-width: 500px;
    margin: 0 auto;
  }

  .form-control {
    border: none;
    border-radius: 0;
    border-bottom: 2px solid #ccc;
  }

  .form-control:focus {
    box-shadow: none;
    border-color: #5bc0de;
  }

  .form-group label {
    color: #555;
    font-weight: bold;
  }

  .form-text {
    font-size: 12px;
    color: #999;
  }


	</style>

<body>
  <div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Explorer l'art de la cuisine</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contact Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#" target="_blank">Facebook</a>
              <a class="dropdown-item" href="#">Instagram</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Gmail</a>
            </div>
          </li>
        </ul>

        <?php
        
        if(!isset($_SESSION["isloggedin"])){

          echo '
          <div>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Sign up</button>
          </div>
          <div>
              <button type="button" class="btn btn-info ml-2" data-toggle="modal" data-target="#login" data-whatever="@mdo">Login</button>
          </div>
          ';
        }else{
          echo'
            <form method="post" action="learn.php">
              <div>
                  <button name="logout" type="submit" class="btn btn-danger ml-2" data-whatever="@mdo">Log out</button>
              </div>
            </form>
          ';
        }

        ?>
        
      </div>
    </nav>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" action="learn.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Full Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Name" required>
                      <br>
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="fa fa-eye" id="togglePassword"></i>
                          </span>
                        </div>
                        <script>
                          const passwordInput = document.getElementById('password');
                          const togglePasswordBtn = document.getElementById('togglePassword');

                          togglePasswordBtn.addEventListener('click', function() {
                            if (passwordInput.type === 'password') {
                              passwordInput.type = 'text';
                              this.classList.remove('fa-eye');
                              this.classList.add('fa-eye-slash');
                            } else {
                              passwordInput.type = 'password';
                              this.classList.remove('fa-eye-slash');
                              this.classList.add('fa-eye');
                            }
                          });
                        </script>
                      </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" action="learn.php">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="loginEmail" aria-describedby="emailHelp" placeholder="Enter email" required>                  </div>
                  <div class="form-group position-relative">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="loginPassword" id="password" placeholder="Password" required>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fas fa-eye" id="togglePassword"></i>
                        </span>
                      </div>
                      <script>
                        const passwordInput = document.getElementById('password');
                        const togglePasswordBtn = document.getElementById('togglePassword');

                        togglePasswordBtn.addEventListener('click', function() {
                          if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                            this.classList.remove('fa-eye');
                            this.classList.add('fa-eye-slash');
                          } else {
                            passwordInput.type = 'password';
                            this.classList.remove('fa-eye-slash');
                            this.classList.add('fa-eye');
                          }
                        });
                      </script>
                    </div>
                  </div>
                  <button name="Sauthentifier" type="submit" class="btn btn-primary">S'authentifier</button>
                </form>
            </div>
          </div>
        </div>
      </div>
      </div> 
      <?php
        if(isset($_GET["error"])){
          echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Error:</strong> '.$_GET["error"].'
            </div>  
          ';
        }else{
          if(isset($_SESSION["isloggedin"]) && $_SESSION["isloggedin"] == true){
            echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>Welcome back:</strong> '. $_SESSION["name"] .' !
              </div>
            ';
          }else{
            echo '
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>Warning:</strong> You are not logged in!
              </div> 
            ';
          }
        }
      ?>

      <?php

      if(isset($_SESSION["isloggedin"])){
        
        echo '
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                  <div class="card rounded-3">
                    <div class="card-body p-4">
          
                      <h3 class="text-center my-3 pb-3">Cook</h3>
          
                      <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" method="post" action="learn.php" enctype="multipart/form-data">
    <div class="col-12">
        <div class="form-outline">
            <input type="text" id="formName" name="name" class="form-control" placeholder="Recipe Name" required />
        </div>

        <br>

        <textarea id="formIngredients" name="ingredients" class="form-control" placeholder="Ingredients" required></textarea>

        <br>

        <textarea id="formSteps" name="steps" class="form-control" placeholder="Steps" required></textarea>

        <br>

        <input type="number" id="formDuration" name="duration" class="form-control" placeholder="Duration (in minutes)" required />

        <br>

        <label for="formPhoto">Photo:</label>
        <input type="file" id="formPhoto" name="photo" class="form-control" accept="image/*" />

        <br>

    </div>
    <div>
        <button type="submit" name="save" class="btn btn-outline-primary me-2">Save</button>
    </div>
    <div style="margin-left: 15px;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#todoListModal">
            Get tasks
        </button>

    </div>

    <div style="margin-left: 15px;">

    </div>
</form>

                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ';
      }
      ?>
      
      <!-- Modal -->
      <div class="modal fade" id="todoListModal" tabindex="-1" role="dialog" aria-labelledby="todoListModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="todoListModalLabel">To Do List</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="mb-4 table table-striped text-center">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ingredients</th>
                    <th scope="col">Steps</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$user_id = $_SESSION["id"];
$sqlTasks = "SELECT * FROM recette.recipes WHERE id_user = '$user_id'";
$resultTasks = mysqli_query($conn, $sqlTasks);

if (mysqli_num_rows($resultTasks) > 0) {
    // Output data of each row
    $i = 1;
    while ($row = mysqli_fetch_assoc($resultTasks)) {
        echo "<tr>";
        echo "<td>" . $i++ . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["ingredients"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["steps"]) . "</td>";
        echo "<td>" . $row["duration"] . " minutes</td>";
        echo "<td><img src='" . htmlspecialchars($row["photo"]) . "' alt='Recipe Photo' style='max-width: 100px; max-height: 100px;'></td>";
        echo "
            <td>
                <form method='post' action='learn.php'>
                    <input type='hidden' name='id_delete' value='{$row["id"]}'>
                    <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                </form>
            </td>
            <td>
                <form method='post' action='update.php'>
                    <input type='hidden' name='id_update' value='{$row["id"]}'>
                    <button type='submit' name='update' class='btn btn-warning'>Update</button>
                </form>
            </td>
        ";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No tasks found</td></tr>";
}

if (isset($_POST["delete"])) {
    $id_delete = $_POST["id_delete"];
    $deletesql = "DELETE FROM recette.recipes WHERE id='$id_delete'";
    $resdelete = mysqli_query($conn, $deletesql);

    if ($resdelete) {
        echo "<script>alert('Recipe deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting recipe: " . mysqli_error($conn) . "');</script>";
    }
}
?>

                </tbody>
                
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

</body>
</html>
