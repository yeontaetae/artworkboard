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

            <section class="py-5 bg-light" id="scroll-target">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <!--added the php codes for display artists information from database.--> 
                        <?php
                            $name=$_GET['name'];
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
                                    $des=$row["Description"];
                                    
                                    // if the artistname from database is matched to the artist name that I clicked, display that artist information.
                                    if($name==$artist_name){
                                        $output=<<<HTML
                                            <!-- put image of artist from database -->
                                            <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="$image" alt="..." /></div>
                                            <div class="col-lg-6">
                                                <!-- display artist name and their job from database -->
                                                <h2 class="fw-bolder">$artist_name - $type</h2>
                                                <p class="lead fw-normal text-muted mb-0">$des</p>
                                            </div>
                    
                                        HTML;
                                            echo $output;
                                    }
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
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <!-- Added the php codes for displaying artwork of each artist from database -->
                    <?php

                        //create the connection
                        require_once 'serverlogin.php';
                        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                        if($conn->connect_error){
                            die("Connection failed!".mysqli_connect_error());
                        }
                        mysqli_select_db($conn, $db_database) or die ("Unable to select database:". mysql_error());
                        
                        //create the query and connect artists table and artwork table.
                        $mysquery="SELECT Artists.*, Artwork.* FROM Artists, Artwork WHERE Artists.ArtistID = Artwork.ArtistID";
                        $result=mysqli_query($conn,$mysquery); //query database

                        $name = $_GET['name'];

                        if($result->num_rows>0){ // see anything is returned back.
                            while($row=$result->fetch_assoc()){//result as assoc. array
                                // Use the variables to get the texts and image from table.
                                $artist_name=$row["Name"];
                                $title=$row["Title"];
                                $artwork_img=$row["ArtImage"];
                                
                                // if the artistname from database is matched to the artist name that I clicked, display that artist's artwork.
                                if($name==$artist_name){
                                    $output=<<<HTML
                                        <div class="col-lg-4 mb-5">
                                            <div class="card h-100 shadow border-0">
                                                <!-- put image of artwork from database -->
                                                <img class="card-img-top" src="$artwork_img" alt="..." />
                                                <div class="card-body p-4">
                                                    <!-- put title from database -->
                                                    <p class="card-text mb-0">$title</p>
                                                </div>
                                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                </div>
                                            </div>
                                        </div>
                                    HTML;
                                        echo $output;
                                }
                            }
                        }else{
                            // if there is nothing to display
                            echo "Nothing here to display";
                        }
                        $conn->close(); // close connection

                    ?>

                </div>
            </div>
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
