
<?php include 'db.php';
    
    $sql = "SELECT posts.id as postid, posts.title, posts.body, posts.author, posts.created_at, users.id as userid, users.first_name, users.last_name FROM posts INNER JOIN users ON posts.author = users.id  ORDER BY created_at DESC";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();

    foreach($posts as $post){ ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="single-post.php?post_id='<?php echo $post['postid']; ?>'"><?php echo $post['title']; ?></a></h2>
            <p class="blog-post-meta"><?php echo $post['created_at']; ?> by <a href="#"><?php echo $post['first_name']; ?> <?php echo $post['last_name']; ?></a></p>
            <p><?php echo $post['body']; ?> </p>
        </div>
<?php } ?>                
