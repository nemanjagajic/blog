
<?php include 'header.php'; ?>
    
    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">

                <form name="postForm" action="create-post.php" method="post" onsubmit="return addPost()">
                    <label for="title">Title: </label><br>                    
                    <input type="text" name="title"><br><br>                    
                    <label for="body">Content: </label><br>                    
                    <textarea name="body" id="" cols="50" rows="20"></textarea><br>                    
                    <button class="btn btn-default" type="submit">Create post</button><br><br>                 
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