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
        <!-- Added the php codes to upload the data to allData.csv file. (Adding a new data, not overwrite) -->
        <?php
            session_start();
            //create the connection
            require_once 'serverlogin.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if($conn->connect_error){
                die("Connection failed!".mysqli_connect_error());
            }
            mysqli_select_db($conn, $db_database) or die ("Unable to select database:". mysql_error());
            
            if(isset($_SESSION["signin"]) && $_SESSION["signin"] === true){ // once it logged in, 
                //check that the submit is selected
                if(isset($_POST['submit'])){
                    $title=$_POST['title'];
                    $theme=$_POST['theme'];
                    $file_name=$_POST['file'];
                    $file_path='files/' . $theme . '/' . $file_name;
                    
                    $artistID=$_SESSION["artistid"];
                    
                    // create the name query
                    $artist_name_query="SELECT `Name` FROM `Artists` WHERE `ArtistID`=`$artistID`";
                    $result3=$conn->query($artist_name_query);
                    $row2=$result3->fetch_assoc();
                    $artist_name=$row2['Name'];
                    $_SESSION["name"]=$artist_name;

                    //theme query
                    $theme_ID_query="SELECT `ThemeID` FROM `Themes` WHERE `Theme`=`$theme`";
                    $result2=$conn->query($theme_ID_query);
                    $theme_ID=$result2->fetch_assoc();

                    //put values into the table.
                    $statement=$conn->prepare("INSERT INTO Artwork(Title, ArtImage, ThemeID, ArtistID) VALUES (?,?,?,?)");
                    $statement->bind_param("ssii",$title,$file_path,$theme_ID['ThemeID'],$artistID);
                    $statement->execute();
                    
                    // close the statement and connection.
                    $statement->close();
                        
                }
            }else{
                // Until it is not logged in, it heads to signin page.
                header('location: signin.php');
            }
            $conn->close();
        ?>
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <!-- Use including navigation.php for avoiding repeitation steps to modify navigation bar. -->
            <?php include '_includes/Navigation.php'?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- post form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">
                                <?php 
                                    // display artist name using session variables.
                                    echo $_SESSION['name']. " Upload New Art";
                                ?>
                            </h1>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form method="post" action="post.php" id="post_form">
                                    <!-- Art Title input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="art_title" name="title" type="text" placeholder="Art Title" data-sb-validations="required" />
                                        <label for="title">Art Title</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Art Title is required.</div>
                                    </div>
                                    <!-- Theme input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="theme" name="theme" type="text" placeholder="Theme" data-sb-validations="required" />
                                        <label for="theme">Theme</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Theme is required.</div>
                                    </div>
                                    <!-- File Name input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="file_name" name="file" type="text" placeholder="File Name" data-sb-validations="required" />
                                        <label for="file">File Name</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">File Name is required.</div>
                                    </div>
                                    <!--Commented out the useless script. -->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <!-- <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            To activate this form, sign up at
                                            <br />
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div> -->
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <!-- <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div> -->
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" name="submit" type="submit">Submit</button></div>
                                </form>
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
    </body>
</html>
