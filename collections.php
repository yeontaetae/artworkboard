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
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <!-- Use including navigation.php for avoiding repeitation steps to modify navigation bar. -->
            <?php include '_includes/Navigation.php'?>
            <!-- Collection Section -->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Collection by Themes</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <!-- Added the php codes to display the list of themes from the theme csv file. -->
                        <?php

                            //create the connection
                            require_once 'serverlogin.php';
                            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                            if($conn->connect_error){
                                die("Connection failed!".mysqli_connect_error());
                            }
                            mysqli_select_db($conn, $db_database) or die ("Unable to select database:". mysql_error());     
                                                   
                            //create the query
                            $mysquery="SELECT * FROM Themes";
                            $result=mysqli_query($conn,$mysquery); //query database
                            
                            if($result->num_rows>0){ // see anything is returned back.
                                while($row=$result->fetch_assoc()){//result as assoc. array
                                    // Use the variables to get the texts and image from table.
                                    $theme=$row["Theme"];
                                    $image=$row["ThemeImage"];

                                    $output=<<<HTML
                                        <div class="col-lg-4 mb-5">
                                            <div class="card h-100 shadow border-0">
                                                <!-- put image from database -->
                                                <img class="card-img-top" src="$image" alt="..." />
                                                <div class="card-body p-4">
                                                    <!-- put theme from database -->
                                                    <a class="text-decoration-none link-dark stretched-link" href="theme.php?theme=$theme"><h5 class="card-title mb-3">$theme</h5></a>
                                                </div>
                                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                </div>
                                            </div>
                                        </div>
                                    HTML;
                                    echo $output;
                                }
                            }else{
                                // if there is nothing to display
                                echo "Nothing here to display";
                            }
                            $conn->close(); // close connection

                        ?>
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
