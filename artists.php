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

            <!-- Artists Section -->
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="fw-bolder">Our artists</h2>
                        <p class="lead fw-normal text-muted mb-5">Dedicated to bringing art to out community</p>
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
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
                            $mysquery="SELECT * FROM Artists";
                            $result=mysqli_query($conn,$mysquery); //query database
                            if($result->num_rows>0){ // see anything is returned back.
                                while($row=$result->fetch_assoc()){//result as assoc. array
                                    // Use the variables to get the texts and image from table.
                                    $artist_name=$row["Name"];
                                    $image=$row["ArtistImage"];
                                    $type=$row["Type"];

                                    $output=<<<HTML
                                        <div class="col mb-5 mb-5 mb-xl-0">
                                            <div class="text-center">
                                                <!-- put image data from database -->
                                                <img class="img-fluid rounded-circle mb-4 px-4" src= $image alt="..." />
                                                <!-- put name data from database -->
                                                <h5 class="fw-bolder"><a href="aboutArtist.php?name=$artist_name">$artist_name</a></h5>
                                                <!-- put artist's job from database -->
                                                <div class="fst-italic text-muted">$type</div>
                                                <br><br>
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
