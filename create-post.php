<?php
include_once "./partial-files/header.php";
include_once "database.php";

if (isset($_POST['publish-post'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];

    $currentDate = date('Y-m-d H:i:s');

    // Creates a new author of the new post

    $sql_author = "INSERT INTO author (first_name, last_name, gender)
                    VALUES ('$firstname', '$lastname', '$gender')";

    $author = fetch($sql_author, $connection);

    // Fetches the new author from the database and selects its ID

    $sql_fetchNewAuthor = "SELECT id FROM author WHERE first_name = '$firstname' AND last_name = '$lastname'";

    $newAuthor = fetch($sql_fetchNewAuthor, $connection);
    $newAuthorID = $newAuthor[0]['id'];

    // Creates new post into the database with the new author fetched from database.

    $sql_newPost = "INSERT INTO posts (title, body, created_at, author_id)
                    VALUES ('$title', '$body', '$currentDate','$newAuthorID')";

    $newPost = fetch($sql_newPost, $connection);
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
        <link rel="stylesheet" href="./styles/styles.css">

        <!-- Favicon  -->
        <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>
</head>
<body>


<main role="main" class="container">

    <?php
// Used for notifying user that the post has been published.

if (isset($_POST['publish-post'])) {
    echo "<h5>Post published successfully</h5>";

}?>

<!-- CREATE NEW POST SECTION -->

    <a href="posts.php"><i class="uil uil-arrow-left"></i>Back to homepage</a><br><br>
    <div class="row">

    <div class="createPost">
        <h3>Publish a post </h3>
        <hr><br>
        <form action="" method="post">
            <label for="title">Title</label><br>
            <input required type="text" id="title" name="title" placeholder="Title"><br>
            <label for="body">Body</label><br>
            <textarea required name="body" id="body" cols="70" rows="10"></textarea><br>
            <label for="author">Your firstname</label><br>
            <input required type="text" id="firstname" name="firstname" placeholder="Firstname"><br><br>
            <label for="author">Your lastname</label><br>
            <input required type="text" id="lastname" name="lastname" placeholder="Author"><br><br>
            <label for="author">Gender</label><br>
            <input required type="radio" name="gender" value="Male">Male
            <input required type="radio" name="gender" value="Female">Female<br><br>


            <button class="publish-post" type="submit" name="publish-post" id="publish-post">Publish</button>
        </form>
    </div>



        <?php include_once "./partial-files/sidebar.php"?>




    </div><!-- /.row -->

</main><!-- /.container -->

<?php include_once "./partial-files/footer.php";?>
</body>
</html>
