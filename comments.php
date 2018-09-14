<?php include 'db.php'; ?>
<div class="comments">
    <h3>Comments</h3><br>
    <ul>
    <?php 
        $sql1 = "SELECT comments.text, comments.author, comments.id FROM comments INNER JOIN posts ON comments.post_id = posts.id WHERE posts.id = {$_GET['post_id']}";
        $statement1 = $connection->prepare($sql1);
        $statement1->execute();
        $statement1->setFetchMode(PDO::FETCH_ASSOC);
        $comments = $statement1->fetchAll(); 
        
        
        foreach($comments as $comment){ 
    ?>
        <li>
            <p><strong><?php echo $comment['author']; ?></strong>: <?php echo $comment['text']; ?></p>
        </li>

        <form action="delete-comment.php" method="post" name="dltForm">
            <input name="postId" type="hidden" value="<?php echo $postId ?>">
            <input name="cmtId" type="hidden" value="<?php echo $comment['id'] ?>">
            <button id="dltBtn" type="submit" class="btn btn-default">Delete comment</button>
        </form>
        
        <hr>
        

    <?php }
    ?>
    </ul>
</div>