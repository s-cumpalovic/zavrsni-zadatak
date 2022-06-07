<?php

if (isset($_GET['post-id'])) {

    $postID = $_GET['post-id'];
// Fetching comments from database

    $sql_comment = "SELECT * FROM comments as c
        LEFT JOIN author as a
        ON c.author_id = a.id
        WHERE post_id = '$postID'";

    $comments = fetch($sql_comment, $connection);

}

foreach ($comments as $comment) {?>
    <div class="comments">
        <ul>
            <li><h5><?php echo $comment['first_name'] . " " . $comment['last_name'] ?></h5></li>
            <p> <?php echo $comment['text'] ?></p>
            <hr>
        </ul>
    </div>
<?php }?>