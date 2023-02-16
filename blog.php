<?php
include('db.php');
$connect = dbConnect();

if(isset($_GET['title']) && isset($_GET['content'])){
    $title = mysqli_real_escape_string($connect, $_GET['title']);
    $content = mysqli_real_escape_string($connect, $_GET['content']);
    $created_at = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO posts (title, content, created_at) VALUES ('$title', '$content', '$created_at')";
    mysqli_query($connect, $sql);
}

$sql = "SELECT * FROM posts";
$query = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
  <header class="bg-dark py-3">
      <div class="container">
           <nav class="navbar navbar-light">
            <a class="navbar-brand" href="#"></a>    
    
            <h1 class="text-light">MY SIMPLE BLOG PAGE</h1>
           </nav>
       </div>
    
  </header>
    
    <div class="container">
        <div class="card">
           <form action="" method="GET">
                <label for="title">Blog Title:
                    <input type="text" name="title">
                </label>
                <label for="content">Blog Content:
                    <input type="text" name="content">
                </label>
                <button type="submit">Add</button>
                    
            </form>
            <hr />
            <ul>
                <?php
                    if(mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_assoc($query)) {
                            echo "<li>
                            <h2>$row[title]</h2>
                            <p>$row[content]</p>
                            <p>Created at: $row[created_at]</p>
                            </li>";
                        }
                    }else{
                        echo "<li>No result</li>";
                    }
                ?>
            </ul>
        </div>
    </div>
     <footer class="bg-light py-3">
     <div class="container">
     <p class="text-center">
       <i class="fas fa-heart"></i>KODEGO ACTIVITY</p>
     </div>
    <p>Copyright &copy; 2023 My Simple Blog Page</p>
     </footer>
</body>
</html>
