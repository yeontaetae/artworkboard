<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">Art by You</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                <li class="nav-item"><a class="nav-link" href="artists.php">Artists</a></li>
                <li class="nav-item"><a class="nav-link" href="collections.php">Collections</a></li>
                
                <!-- Created dropdown menu for sign in and sign out -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownSignIn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sign in</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownSignIn">
                        <li><a class="dropdown-item" href="signin.php">Sign In</a></li>
                        <!-- Added sign out part with link to signout.php for functionality -->
                        <li><a class="dropdown-item" href="_includes/Signout.php">Sign Out</a></li>
                    </ul>
                </li>
                <!-- <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li> -->

            </ul>
        </div>
    </div>
</nav>