<?php 
    session_start();
    include('db.php');
    
    $errorflg =0;
    $errormsg ='';



    if(isset($_POST['loginForm']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        if(isset($_POST['username'],$_POST['password'])&&
        $username !='' && $password !='')
        {
            $sql = "SELECT id,first_name,last_name,email,password from users where email='$username'";
            // echo $sql;die;

            try {
                //code...
            
                $result = $conn->query($sql);

                // 3. Fetch data as an associative array
                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();


                    if($data['password'] == $password){
                        // Login successful, store user data in session
                        $_SESSION['user_id'] = $data['id'];         // Store user ID
                        $_SESSION['username'] = $data['first_name'].' '.$data['last_name'];   // Store username
                        $_SESSION['email'] = $data['email'];         // Store email
                        $_SESSION['login'] = TRUE;
                        // Redirect to dashboard or home page
                        header("Location: index.php");
                        exit();
                    }
                    else
                    {
                        $errorflg = 1;
                        $errormsg = 'Password missmatch';
                    }
                    
                }
                else
                {
                    $errorflg = 1;
                    $errormsg = 'No user found';
                }

            } catch (\Throwable $th) {
                // Handle the error, you can log it or display a user-friendly message
                $errorflg = 1;
                $errormsg = $th->getMessage();
            }
        }
        else
        {
            $errorflg = 1;
            $errormsg = 'All fields are mandatory';
        }
    }


    if(isset($_SESSION['login']))
    {
        // Unset all session variables
        session_unset();
        
        // Destroy the session
        session_destroy();
    }
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background: url('images/signupbackground.jpg') no-repeat center center/cover;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="row w-75 shadow-lg rounded">
            <!-- Login Section -->
            <div class="col-md-6 bg-white p-4 rounded-start">
                <h3 class="text-center text-primary mb-4">Login</h3>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <?php if($errorflg==1){ ?>

                        <div class="alert alert-danger text-center mb-0"><?= $errormsg ?></div>

                    <?php } ?>
                    <button type="submit" name="loginForm" class="btn btn-primary w-100">Login</button>
                    <p class="mt-3 text-center">Don't have an account? <a href="signup.php" id="showSignup">Sign Up</a></p>
                </form>
            </div>

            <div class="col-md-6 d-flex align-items-center justify-content-center p-0">
            <img src="images/loginside.jpg" class="img-fluid rounded-end" alt="loginside image"
                style="height: 100%; width: 100%; object-fit: cover;">
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
