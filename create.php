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
            <div class="col-sm-8 blog-main">

                <form name="postForm" action="create-post.php" method="post" onsubmit="return addPost()">
                    <label for="title">Title: </label>
                    <br>
                    <input type="text" name="title">
                    <br><br>
                    <label for="body">Content: </label>
                    <br>
                    <textarea name="body" id="" cols="50" rows="20">
                    </textarea>
                    <br>
                    <button class="btn btn-default" type="submit">Create post</button>  
                    <br>
                    <br>        
                
                </form>

            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </main>

    <script>
        function addPost(){            
            var title = document.forms['postForm']['title'].value;
            var body = document.forms['postForm']['body'].value;
            
            if(!title || !body){              
                alert('Both fields are required!');
                return false;
            }
        }
                
        </script>

<?php  include 'footer.php'; ?>