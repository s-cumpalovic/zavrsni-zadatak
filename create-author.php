<?php
include_once "./partial-files/header.php";
include_once "database.php";

if (isset($_POST['create-author'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];

    // Creates a new author of the new post

    $sql_author = "INSERT INTO author (first_name, last_name, gender)
                   VALUES ('$firstname', '$lastname', '$gender')";

    $author = fetch($sql_author, $connection);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

         <!-- Custom styles for this template -->
        <link href="styles/blog.css" rel="stylesheet">
        <link href="styles/styles.css" rel="stylesheet">

        <!-- Favicon  -->
        <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>
</head>
    <body>

        <main role="main" class="container">
            <div class="row">
                <div class="createAuthor">
                <?php
// Used for notifying user that the author has been registered.

if (isset($_POST['create-author'])) {
    echo "<h5>Author registered successfully</h5>";

}?>

                    <a href="posts.php"><i class="uil uil-arrow-left"></i>Back to homepage</a><br><br>

                    <h3>Register an author</h3>
                    <hr><br>

                    <form action="" method="post">
                        <label for="author">Your firstname</label><br>
                        <input required type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"><br><br>
                        <label for="author">Your lastname</label><br>
                        <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Author"><br><br>
                        <label for="author">Gender</label><br>
                        <input class="gender-button-male" required type="radio"  name="gender" value="Male"> Male
                        <input class="gender-button-female" required type="radio"  name="gender" value="Female"> Female<br><br>

                        <button class="btn btn-primary" type="submit" name="create-author" id="create-author">Register</button>

                    </form>

                </div>

                <?php include_once "./partial-files/sidebar.php"?>
            </div>
        </main><!-- /.container -->


        <?php include_once "./partial-files/footer.php";?>
    </body>
</html>
