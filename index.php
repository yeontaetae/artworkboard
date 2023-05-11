<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Art by You</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <!-- Use including navigation.php for avoiding repeitation steps to modify navigation bar. -->
            <?php include '_includes/Navigation.php'?>

           
            
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <!-- Create php code for reading data from database. -->
                        <?php
                            //create the connection
                            require_once 'serverlogin.php';
                            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                            if($conn->connect_error){
                                die("Connection failed!".mysqli_connect_error());
                            }
                            mysqli_select_db($conn, $db_database) or die ("Unable to select database:". mysql_error());

                            
                            //create the query
                            $mysquery="SELECT HomePage, AboutImage FROM About";
                            $result=mysqli_query($conn,$mysquery); //query database
                            if($result->num_rows>0){ // see anything is returned back.
                                while($row=$result->fetch_assoc()){//result as assoc. array
                                    // Use the variables to get the text and image from table.
                                    $text=$row["HomePage"];
                                    $image=$row["AboutImage"];
                                    $output=<<<HTML
                                        <!-- Header-->
                                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                                            <div class="my-5 text-center text-xl-start">
                                                <h1 class="display-5 fw-bolder text-white mb-2">Art by You</h1>
                                                <!-- put text from the database -->
                                                <p class="lead fw-normal text-white-50 mb-4">$text</p>
                                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                                    <!-- changed the href to take user to the About page and sign-in page -->
                                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="createAccount.php">Sign up</a>
                                                    <a class="btn btn-outline-light btn-lg px-4" href="signin.php">Learn More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- put image from the database -->
                                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="$image" alt="..." /></div>
                                    HTML;
                                        
                                    echo $output;
                                }
                                
                            } else{
                                // if there is nothing to display
                                echo "Nothing here to display";
                            }
                            $conn->close(); // close connection

                        ?>

                    </div>
                </div>
            </header>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Art for you, by you.</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                                    <h2 class="h5">Featured Theme</h2>
                                    <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                                    <h2 class="h5">Featured Artist</h2>
                                    <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                                </div>
                            </div>
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
    </body>
</html>
