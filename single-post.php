<?php
include_once "./partial-files/header.php";
include_once "./database.php";

// Checking if user clicked on the specific post

if (isset($_GET['post-id'])) {

    $postID = $_GET['post-id'];

    $sql_post = "SELECT * FROM posts WHERE id = '$postID'";
    $singlePost = fetch($sql_post, $connection, false);

    $sql_comment = "SELECT * FROM comments WHERE post_id = '$postID'";
    $comments = fetch($sql_comment, $connection);

    // var_dump($comments);

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

    <!-- ION SCOUT icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title><?php echo $singlePost['title'] ?></title>
</head>
<body>

    <main role="main" class="container">
    <a href="posts.php"><i class="uil uil-arrow-left"></i>Back to homepage</a><br><br>


    <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $singlePost['title'] ?></h2>
        <p class="blog-post-meta">Created at: <?php echo $singlePost['created_at'] ?> by <a href="#"><?php echo $singlePost['author'] ?></a></p>

        <p><?php echo $singlePost['body'] ?></p>

    </div><!-- /.blog-post -->

    <h4><u>Comments</u></h4><br><br>
<?php foreach ($comments as $comment) {?>
    <div class="comments">
        <ul>
            <li><h5><?php echo $comment['author'] ?></h5></li>
            <p> <?php echo $comment['text'] ?></p>
            <hr>
        </ul>
    </div>
<?php }?>

</div>
</div>
</main>
<?php include_once "./partial-files/sidebar.php";?>
<?php include_once "./partial-files/footer.php";?>

</body>
</html>


