<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Art by You</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <?php
            // start the session
            session_start();
            if(isset($_SESSION["signin"]) && $_SESSION["signin"] === true){
                header("location: post.php");
                exit;
            }                //create the connection
                require_once 'serverlogin.php';
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                if($conn->connect_error){
                    die("Connection failed!".mysqli_connect_error());
                }
                mysqli_select_db($conn, $db_database) or die ("Unable to select database:". mysql_error());
                
                // Add the verifying username and password function to the sign in page.
                if(isset($_POST["signin_submit"])) {
                    
                    // create a query for username
                    $username = trim($_POST["username"]);
                    $username_query="SELECT * FROM `Signin` WHERE `Username`='$username'";
                    $result=mysqli_query($conn, $username_query);
                    // login is unsuccessful (user invalid); leads to page with error message.
                    if (mysqli_num_rows($result) == 0) {
                        header('location: signin.php?error=baduser');
                    } else { // Username verification successful!
                        $row = $result->fetch_assoc();
                        $pw = $row["Password"];
                        if ($pw == $_POST["password"]) { // Login successful; password passed
                            session_start();
                            $password=trim($_POST["password"]);
                            $_SESSION["username"] = $username;
                            $_SESSION["signin"] = true;

                            $artistID_query="SELECT ArtistID FROM `Signin` WHERE `Username`='$username'";
                            $result2=mysqli_query($conn, $artistID_query);
                            $row2=$result2->fetch_assoc();
                            $artistID=$row['ArtistID'];
                            $_SESSION["artistid"]=$artistID;

                            // after logged in, leads user to post page.
                            header('location: post.php');
                        } else {
                            // login is unsuccessful (password invalid); leads to page with error message.
                            header('location: signin.php?error=badpass');
                        }
                    }
                    
                }
            
        ?>
        <main class="flex-shrink-0">
            <!-- Use including navigation.php for avoiding repeitation steps to modify navigation bar. -->
            <?php include '_includes/Navigation.php'?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Sign-in form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Sign In</h1>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form id="signin_form" method="post" action="signin.php">
                                    <!-- Username input-->
                                    <div class="form-floating mb-3">
                                        <input required class="form-control" id="username" name="username" type="text" placeholder="Enter your username..." data-sb-validations="required" />
                                        <label for="username">Username</label>
                                        <div class="invalid-feedback" data-sb-feedback="username:required">An username is required.</div>
                                    </div>
                                    <!-- Password input-->
                                    <div class="form-floating mb-3">
                                        <input required class="form-control" id="password" name="password" type="password" placeholder="Enter your password..." data-sb-validations="required" />
                                        <label for="password">Password</label>
                                        <div class="invalid-feedback" data-sb-feedback="password:required">A password is required.</div>
                                    </div>
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <!-- <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            To activate this form, sign up at
                                            <br />
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>
                                    Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <!-- <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div> -->
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="signin_submit" name="signin_submit" type="submit">Submit</button></div>
                                </form>
                                
                                
                                    <?php
                                        // display error message
                                        if (isset($_GET["error"])) {
                                            echo "<div class='errorMessage my-4 p-2 bg-danger text-white rounded'>";
                                            // username error message
                                            if ($_GET["error"] == "baduser") {
                                                echo "Username is incorrect, please try again";
                                            } else if ($_GET["error"] == "badpass") { // password error message
                                                echo "Password is incorrect, please try again";
                                            }
                                            echo "</div>";
                                        }
                                    
                                    ?>

                                <p class=" fw-normal text-muted mb-0">Don't have an account?</p>
                                <p class=" fw-normal text-muted mb-0">Join now and start posting your artwork.</p>
                                <div class="d-grid col-6"><button class="btn btn-primary btn-lg" id="createAccountButton" type="button" onclick="link()">Create Account</button></div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script> 
            function link(){
                window.location.href="createAccount.php"
            }
        </script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
