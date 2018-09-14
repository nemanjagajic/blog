<?php 
    include 'db.php';
    include 'header.php'; ?>

<main role="main" class="container">
    <div class="row">
        <?php 
        
        if(isset($_GET['post_id'])){ ?>
            <div class="col-sm-8 blog-main">
                <?php 

                    $sql = "SELECT posts.title, posts.body, posts.author, posts.created_at, users.id as userid, users.first_name, users.last_name FROM posts INNER JOIN users ON posts.author = users.id WHERE posts.id = {$_GET['post_id']} ORDER BY created_at DESC";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $singlePost = $statement->fetch();    
                    
                    $postId = $_GET['post_id'];
                    
                ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $singlePost['title']; ?></h2>
                    <p class="blog-post-meta"><?php echo $singlePost['created_at']; ?> by <a href="#"><?php echo $singlePost['first_name'] .' ' . $singlePost['last_name']?></a></p>
                    <p><?php echo $singlePost['body']; ?></p>
                    <br>

                    <form action="delete-post.php" method="post" name="dltPost">
                        <button id="dltBtn" type="submit" onclick="return areYouSure()">Delete this post</button>
                        <input name="postId" type="hidden" value="<?php echo $postId?>">
                    </form>
                    <br>

                </div><!-- /.blog-post --> 

            <script>
                function areYouSure(){
                    var sure = prompt('Are you sure? (yes/no)');
                    if(sure == 'yes' || sure == 'Yes'){
                        return true;
                    } else {
                        return false;
                    }
                }            
            </script>

            <form name="commForm" action="create-comment.php" onsubmit="return addComm()" method="post">
                <label for="author">Your Name: </label>
                <input type="text" name="author">
                <br>               
                <label for="text">Comment: </label>
                <input type="text" name="text">
                <input type="hidden" name="postId" value=<?php echo $postId?>>
                <br>
                <button id ="commBtn" type="submit" class="btn btn-default">Post comment</button>
                <br><br><br><br>                         
            </form>

            <script>
                function addComm(){
                    var authorInput = document.forms['commForm']['author'];
                    var textInput = document.forms['commForm']['text'];
                    var author = document.forms['commForm']['author'].value;
                    var text = document.forms['commForm']['text'].value;

                    if(!author || !text){
                        if(!author){
                            authorInput.classList.add('alert');
                            authorInput.classList.add('alert-danger');

                            authorInput.addEventListener('input', function(){
                                authorInput.classList.remove('alert');
                                authorInput.classList.remove('alert-danger');
                            })
                        } 

                        if(!text) {
                            textInput.classList.add('alert');
                            textInput.classList.add('alert-danger');

                            textInput.addEventListener('input', function(){
                                textInput.classList.remove('alert');
                                textInput.classList.remove('alert-danger');
                            })
                        }

                        alert('Both fields are required!');
                        return false;
                    }
                }                
            </script>

            <button class="btn btn-default" id='hideBtn'>Hide comments</button>
            <br><br>
            
            <?php include 'comments.php'; ?>

            <script>
                var myBtn = document.querySelector('#hideBtn');
                var comments = document.querySelector('.comments');

                myBtn.addEventListener('click', function() {
                    if(myBtn.innerText == 'Hide comments') {  
                        myBtn.innerText = 'Show comments';
                        comments.classList.add('hidden');
                    } else {
                        myBtn.innerText = 'Hide comments';
                        comments.classList.remove('hidden');
                    }
                });
            </script>

        </div><!-- /.blog-main -->
        <?php } else {
            echo 'Id posta nije prosledjen kroz GET!';
        }        
        include 'sidebar.php'; ?>
    </div><!-- /.row -->         
</main>    
   
<?php  include 'footer.php'; ?>