<?php
include_once "./partial-files/header.php";
include_once "database.php";

// Fetches authors from database

$sql_fetchNewAuthor = "SELECT * FROM author";

$authors = fetch($sql_fetchNewAuthor, $connection);

if (isset($_POST['publish-post'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $authorid = $_POST['author'];

    $currentDate = date('Y-m-d H:i:s');

    // Creates new post into the database with the author id  fetched from database.

    $sql_newPost = "INSERT INTO posts (title, body, created_at, author_id)
                      VALUES ('$title', '$body', '$currentDate','$authorid')";

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
    echo "<h5><u>Post published successfully</u></h5>";

}?>

<!-- CREATE NEW POST SECTION -->

    <div class="row">

        <div class="col-sm-8 blog-main">



            <div class="createPost">
                    <a href="index.php" class="back-to-homepage"><i class="uil uil-arrow-left"></i>Back to homepage</a><br><br>


                    <h3>Publish a post </h3>
                    <hr><br>
                    <form action="" method="post">
                        <label for="title">Title</label><br>
                        <input required type="text" class="form-control" id="title" name="title" placeholder="Title"><br>
                        <label for="body">Body</label><br>
                        <textarea required name="body" class="form-control" id="body" cols="70" rows="10" placeholder="Your post content..."></textarea><br><br>
                        <label for="author">Author:</label><br>

                        <select required name="author" id="author" class="custom-select my-1 mr-sm-2">
                                <option value="" disabled selected >Select an author</option>

                            <?php foreach ($authors as $author) {?>

                                <option value="<?php echo $author['id'] ?>" class="<?php echo $author['gender'] ?>">
                                <?php echo $author['first_name'] . " " . $author['last_name'] ?></option>

                            <?php }?>
                        </select><br><br>

                        <button class="btn btn-primary" type="submit" name="publish-post" id="publish-post">Publish</button>
                    </form>
                </div>
            </div><!-- /.blog-main -->
            <?php include_once "./partial-files/sidebar.php"?>
    </div><!-- /.blog-row -->
    <script src="./main.js"></script>







    </div><!-- /.row -->

</main><!-- /.container -->

<?php include_once "./partial-files/footer.php";?>
</body>
</html>
