<?php
include_once "./partial-files/header.php";
include_once "database.php";

// Fetches authors and posts from the database

$sql = "SELECT * FROM posts as p
        INNER JOIN author as a
        ON p.author_id = a.id
        ORDER BY created_at DESC";

$posts = fetch($sql, $connection, true);

// Fetches only authors from the database

$sql_fetchNewAuthor = "SELECT * FROM author";

$authors = fetch($sql_fetchNewAuthor, $connection);

// Fetches authors and posts from the database

if (isset($_POST['choose-author'])) {

    $authorID = $_POST['author'];

    $sql_fetchSelectedAuthor = "SELECT * FROM posts as p
                                INNER JOIN author as a
                                ON p.author_id = a.id
                                WHERE id = '$authorID'
                                ORDER BY created_at DESC";

    $filteredPosts = fetch($sql_fetchSelectedAuthor, $connection);

    // var_dump($filteredPosts);

}

$allPostsOption = "allposts";

// var_dump($posts);

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



    <div class="row">

     <div class="col-sm-8 blog-main">

<!-- Filter posts by author -->

    <label for="author">Filter posts by author: </label><br>

    <form action="" method="post">
        <select required name="author" id="author" class="custom-select my-1 mr-sm-2">
        <option value="" disabled selected >Author</option>
        <option value=<?php echo "allposts" ?> class="all-posts-option">All authors</option>

<?php foreach ($authors as $author) {?>
        <option value="<?php echo $author['id'] ?>" class="<?php echo $author['gender'] ?>">
<?php echo $author['first_name'] . " " . $author['last_name'] ?></option>

<?php }?>
        </select><br><br>
        <button class="btn btn-primary" type="submit" name="choose-author" id="choose-author">Choose author</button><br><br>

    </form>

<!-- SHOWS ALL THE POSTS FROM THE DATABASE -->

<?php

// If author or "All posts" option is selected this code is going to be executed

if (!isset($authorID) || $authorID == 'allposts') {
    foreach ($posts as $post) {
        ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><a href="single-post.php?post-id=<?php echo $post['postid'] ?>"><?php print_r($post['title']);?></a></h2>
        <p class="blog-post-meta"><?php echo "Post created: " . $post['created_at'] ?> by <a href="#"> <?php echo $post['first_name'] . " " . $post['last_name'] ?></a></p>

        <p> <?php print_r($post['body']);?> </p>
    </div><!-- /.blog-post -->

<!-- SHOWS FILTERED POSTS ONLY -->

<?php }} else {
    foreach ($filteredPosts as $fpost) {?>
        <div class="blog-post">
        <h2 class="blog-post-title"><a href="single-post.php?post-id=<?php echo $fpost['postid'] ?>"><?php print_r($fpost['title']);?></a></h2>
        <p class="blog-post-meta"><?php echo "Post created: " . $fpost['created_at'] ?> by <a href="#"> <?php echo $fpost['first_name'] . " " . $fpost['last_name'] ?></a></p>

        <p> <?php print_r($fpost['body']);?> </p>
        </div><!-- /.blog-post -->

<?php }}
?>




        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

     </div><!-- /.blog-main -->

        <?php include_once "./partial-files/sidebar.php"?>




    </div><!-- /.row -->
    <script src="./main.js"></script>


</main><!-- /.container -->

<?php include_once "./partial-files/footer.php";?>
</body>
</html>
