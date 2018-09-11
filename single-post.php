
<?php include 'db.php'; ?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>

<?php include 'header.php'; ?>

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
            
            
            ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $singlePost['title']; ?></h2>
                <p class="blog-post-meta"><?php echo $singlePost['created_at']; ?> by <a href="#"><?php echo $singlePost['first_name'] .' ' . $singlePost['last_name']?></a></p>
                <p><?php echo $singlePost['body']; ?></p>
            </div><!-- /.blog-post --> 

            <form action="create-comment.php" method="post">
                
            
            
            
            
            </form>

            <button class="btn btn-default" id='hideBtn'>Hide comments</button>
            <br>
            <br>
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