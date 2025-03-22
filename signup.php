<?php
    include('db.php');


    $errorflg =0;
    $errormsg ='';

    if(isset($_POST['signupForm']))
    {
        $firstName          = $_POST['first_name'];
        $lastName           = $_POST['last_name'];
        $gender             = $_POST['gender'];
        $phone              = $_POST['phone'];
        $email              = $_POST['email'];
        $password           = $_POST['password'];
        $confirmPassword    = $_POST['confirmpassword'];


        if(isset($_POST['first_name'], $_POST['last_name'], $_POST['gender'], $_POST['phone'], $_POST['email'], $_POST['password'], $_POST['confirmpassword']) &&
                $firstName !='' && $lastName !='' && $gender !='' && $phone !='' && $email !='' && $password !='' && $confirmPassword !='' )
        {

            // check the email and phone no is existed
            

            if($password == $confirmPassword)
            {
                
                $sql = "INSERT INTO users (`first_name`, `last_name`, `gender`, `phone`, `email`, `password`, `created_at`) VALUES 
                
                        ('$firstName', '$lastName', '$gender', '$phone', '$email', '$password', now())";
                try {
                    // 4. Execute the query
                    if ($conn->query($sql) === TRUE) {
                        header("Location: login.php");exit();
                    } 
                    
                } catch (\Throwable $th) {
                    $errorflg=1;
                    $errormsg ='Registration Failed';
                }
            }
            else
            {
                $errorflg=1;
                $errormsg ='Password missmatch';
            }

        }
        else
        {
            $errorflg=1;
            $errormsg ='All fields are required.';
        }
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="row w-75 shadow-lg rounded bg-light">
            <!-- Signup Section -->
            <div class="col-md-12 p-4 rounded" id="signupSection">
                <h3 class="text-center text-success mb-4">Sign Up</h3>

                <form action="signup.php" method="POST">
                    <div class="row">
                        <!-- Left Side: First Name, Last Name, Gender -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter your first name" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Enter your last name" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="" selected disabled>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone number" required>
                            </div>
                        </div>

                        <!-- Right Side: Email, Password, Phone Number -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="signup_password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="signup_password" name="password"
                                    placeholder="Create a password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirmpassword"
                                    placeholder="Re-type your password" required>
                            </div>
                            
                        </div>
                    </div>

                    <?php if($errorflg==1){ ?>

                        <div class="alert alert-danger text-center mb-0"><?= $errormsg ?></div>

                    <?php } ?>

                    <!-- Submit Button -->
                    <button type="submit" name="signupForm" class="btn btn-success w-100 mt-3">Sign Up</button>
                    <p class="mt-3 text-center">Already have an account? <a href="login.php" id="showLogin">Login</a></p>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
