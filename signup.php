<?php
    $conn = mysqli_connect("localhost" , "root","");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // open session
    session_start();

    // data validation function
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //
    if(isset($_POST["submit"])){

        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        $password = md5($password);

        // Email exists ?
        $sqlLogInEmail = "SELECT * FROM recette.users WHERE email ='$email';";
        $resultLogInEmail = mysqli_query($conn, $sqlLogInEmail);

        if(!mysqli_num_rows($resultLogInEmail)>0){
            // Email matching
            $sqlAddStudent = "INSERT INTO recette.users(name,email,password) VALUES('$name','$email','$password')";
            $resultAddStudent = mysqli_query($conn, $sqlAddStudent);
        }else{
            header("Location: learn.php?error=Email already taken !");
            exit();
        }
    }

    // add recipes

    if(isset($_POST["save"])){
        // Validation des champs
        $name = validate($_POST['name']);
        $ingredients = validate($_POST['ingredients']);
        $steps = validate($_POST['steps']);
        $duration = validate($_POST['duration']);    
        // Validation supplémentaire si nécessaire (par exemple, vérification de la validité de l'email, etc.)
    
        $id_user = $_SESSION["id"];
        
        if (isset($_POST["save"])) {
            // Validation des champs
            $name = validate($_POST['name']);
            $ingredients = validate($_POST['ingredients']);
            $steps = validate($_POST['steps']);
            $duration = validate($_POST['duration']);
        
            // Assurez-vous que votre formulaire a un champ pour la photo
            // Validation supplémentaire si nécessaire (par exemple, vérification de la validité de l'email, etc.)
            $id_user = $_SESSION["id"];
        
            // File upload handling
            $targetDirectory = "uploads/"; // Choose your target directory
        
            // Ensure that the "photo" key exists in the $_FILES array
            if (isset($_FILES["photo"]["name"])) {
                $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
                // Check if file already exists
                if (file_exists($targetFile)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
        
                // Check file size
                if ($_FILES["photo"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
        
                // Allow certain file formats
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                if (!in_array($imageFileType, $allowedExtensions)) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
        
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                        // File uploaded successfully
                        // Ajout de la recette dans la base de données
                        $sqlAddRecipe = "INSERT INTO recette.recipes (name, ingredients, steps, duration, photo, id_user) VALUES ('$name', '$ingredients', '$steps', '$duration', '$targetFile', '$id_user')";
                        $resultAddRecipe = mysqli_query($conn, $sqlAddRecipe);
        
                        if ($resultAddRecipe) {
                            echo "Recipe added successfully.";
                        } else {
                            echo "Error adding recipe: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                echo "File not found in the request.";
            }
        }
        
    }

    // Log in (Sauthentifier): --------------------------------------------------------------------------
    if( isset($_POST['Sauthentifier'])){

        // logIn data 
        $loginEmail = validate($_POST['loginEmail']);
        $loginPassword = validate($_POST['loginPassword']);

        // hashing password
        $loginPassword = md5($loginPassword);
        //$loginPassword = password_hash($loginPassword, PASSWORD_BCRYPT);

        // Email matching
        $sqlLogInEmail = "SELECT * FROM recette.users WHERE email ='$loginEmail';";
        $resultLogInEmail = mysqli_query($conn, $sqlLogInEmail);

        if(mysqli_num_rows($resultLogInEmail)>0){
            // Password matching
            $sqlLogInPassword = "SELECT * FROM recette.users WHERE email ='$loginEmail' AND password ='$loginPassword';";
            $resultLogInPassword = mysqli_query($conn, $sqlLogInPassword);

            if(mysqli_num_rows($resultLogInPassword)>0){
                // logged in successfully
                $_SESSION["isloggedin"] = true;
                // storing user data in session variables to use it latter
                while($row = $resultLogInPassword->fetch_assoc()) {
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["password"] = $row["password"];
                }

            }else{
                header("Location: learn.php?error=Mot de passe invalide !");
                exit();
            }

        }else{
            header("Location: learn.php?error=Email invalide !");
            exit();
        }
    }

    if(isset($_POST["logout"])){
        session_start(); //to ensure you are using same session
        session_destroy(); 
        header("Location: learn.php?success=logged out !");
        exit();
    }
?>