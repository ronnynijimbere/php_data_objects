<?php 
    $host = 'localhost';
    $user = 'root';
    $password = 'test1111';
    $dbname = 'pdoposts';

    //Set DSN (data source name)
    $dsn = 'mysql:host='. $host . ';dbname=' . $dbname;

    //create a PDO instance
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    //create a PDO query
    //$statement = $pdo->query('SELECT * FROM posts');

    /*while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        echo $row['title'] . '<br>';
    }*/

    //example using the fetch object option
    /*while($row = $statement->fetch(PDO::FETCH_OBJ)){
        echo $row->title . '<br>';
    }*/

    /*while($row = $statement->fetch()){
        echo $row->title . '<br>';
    }*/

    //PREPARED STATEMENTS (prepare & execute)

    //UNSAFE
    //$sql = "SELECT * FROM posts WHERE author = '$author'";

    //Fetch Multiple Posts

    //User Input
    $author = 'Ronny Nijimbere';
    $is_published = true;
    $id = 1;

    //positinal parameters
    $sql = 'SELECT * FROM posts WHERE author = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute([$author]);
    $posts = $statement->fetchAll();

    //Named Parameter 1
    // $sql = 'SELECT * FROM posts WHERE author = :author';
    // $statement = $pdo->prepare($sql);
    // $statement->execute(['author' => $author]);
    // $posts = $statement->fetchAll();

    //Named Parameter 2
    // $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
    // $statement = $pdo->prepare($sql);
    // $statement->execute(['author' => $author, 'is_published' => $is_published]);
    // $posts = $statement->fetchAll();

    // //var_dump($posts);
     foreach($posts as $post){
         echo $post->title . '<br>';
     }

    //fetch single post

    // $sql = 'SELECT * FROM posts WHERE id = :id';
    // $statement = $pdo->prepare($sql);
    // $statement->execute(['id' => $id]);
    // $post = $statement->fetch();

    // echo $post->body;

    //get row count
    // $statement = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
    // $statement->execute([$author]);
    // $postCount = $statement->rowCount();

    // echo $postCount;

    //insert Data
    // $title = 'Post Five';
    // $body = 'Who is Keen to Learn PDO';
    // $author = 'Ronny Nijimbere';


    // $sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
    // $statement = $pdo->prepare($sql);   
    // $statement->execute(['title' => $title, 'body' => $body, 'author' => $author]);
    // echo 'Post Added'; 

    // update data
    // $id = '1';
    // $body = 'How to Learn PDO in one day';

    // $sql = 'UPDATE posts SET body = :body WHERE id = :id';
    // $statement = $pdo->prepare($sql);   
    // $statement->execute(['body' => $body, 'id' => $id]);
    // echo 'Post updated'; 

    //delete data   
    
    //  $id = '5';
    

    //  $sql = 'DELETE FROM posts WHERE id = :id';
    //  $statement = $pdo->prepare($sql);   
    //  $statement->execute(['id' => $id]);
    //  echo 'Post deleted';

    //search data using like operator
    // $search = "%post%";
    // $sql = 'SELECT * FROM posts WHERE title LIKE ?';
    // $statement = $pdo->prepare($sql);   
    // $statement->execute([$search]);
    // $posts = $statement->fetchAll();

    // foreach($posts as $post) {
    //     echo $post->title . '<br>';
    // }


?>

<!-- <h1><?php echo $post->title; ?></h1>
<h1><?php echo $post->author; ?></h1>
<h1><?php echo $post->body; ?></h1> -->
