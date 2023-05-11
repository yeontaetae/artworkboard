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
                $mysquery="SELECT * FROM About";
                $result=mysqli_query($conn,$mysquery); //query database
                if($result->num_rows>0){ // see anything is returned back.
                    while($row=$result->fetch_assoc()){//result as assoc. array
                        // Use the variables to get the text and image from table.
                        $text=$row["HomePage"];
                        $story=$row["Story"];
                        $image=$row["AboutImage"];

                        $output=<<<HTML
                            <!-- Header-->
                            <header class="py-5">
                                <div class="container px-5">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-xxl-6">
                                            <div class="text-center my-5">
                                                <h1 class="fw-bolder mb-3">Our mission is to make art accessible for everyone.</h1>
                                                <!-- put text from the database -->
                                                <p class="lead fw-normal text-muted mb-4">$text</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>

                            <!-- About section-->
                            <section class="py-5 bg-light" id="scroll-target">
                                <div class="container px-5 my-5">
                                    <div class="row gx-5 align-items-center">
                                        <!-- put image from the database -->
                                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="$image" alt="..." /></div>
                                        <div class="col-lg-6">
                                            <h2 class="fw-bolder">Our Story</h2>
                                            <!-- put story text from the database -->
                                            <p class="lead fw-normal text-muted mb-0">$story</p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        HTML;
                            
                        echo $output;
                    }
                    
                } else{
                    // if there is nothing to display
                    echo "Nothing here to display";
                }
                $conn->close(); // close connection

            ?>
            
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
