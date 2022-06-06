<?php
include_once "./partial-files/header.php";
include_once "database.php";

$sql = "SELECT * FROM posts ORDER BY created_at DESC";

$posts = fetch($sql, $connection, true);

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

        <?php foreach ($posts as $post) {?>

            <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php?post-id=<?php echo $post['id'] ?>"><?php print_r($post['title']);?></a></h2>
                <p class="blog-post-meta"><?php echo "Post created: " . $post['created_at'] ?> by <a href="#"> <?php print_r($post['author'])?></a></p>

                <p> <?php print_r($post['body']);?> </p>
            </div><!-- /.blog-post -->
<?php }?>


        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

     </div><!-- /.blog-main -->

        <?php include_once "./partial-files/sidebar.php"?>




    </div><!-- /.row -->

</main><!-- /.container -->

<?php include_once "./partial-files/footer.php";?>
</body>
</html>
