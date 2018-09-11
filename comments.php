<?php include 'db.php'; ?>
<div class="comments">
    <h3>Comments</h3><br>
    <ul>
    <?php 
        $sql = "SELECT comments.text, comments.author FROM comments INNER JOIN posts ON comments.post_id = posts.id WHERE posts.id = {$_GET['post_id']}";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $comments = $statement->fetchAll(); 

        foreach($comments as $comment){ 
    ?>
        <li>
            <p><strong><?php echo $comment['author']; ?></strong>: <?php echo $comment['text']; ?></p>
        </li><hr>

    <?php }
    ?>
    </ul>
</div>