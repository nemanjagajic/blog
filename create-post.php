<?php include 'db.php';

    if(isset($_POST['title'])){
        $title = $_POST['title'];
    }

    if(isset($_POST['body'])){
        $body = $_POST['body'];
    }

    $author = rand(1, 5); // 5 je broj usera koji trenutno postoji u tabeli, bez sign up-a ne moze lepse

    if(isset($title) && isset($body)){

        $sql = "INSERT INTO posts (title, body, author) VALUES ('$title', '$body', '$author')";
        $statement = $connection->prepare($sql);
        $statement->execute();

        header("Location: index.php");
    }

    