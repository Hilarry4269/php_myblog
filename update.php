<?php
include('db.php');
$connect = dbConnect();

$sql = "SELECT * FROM posts WHERE id = $_GET[postsId]";
$query = mysqli_query($connect, $sql);

$todo = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <form action="validate.php?method=edit" method="POST">
                <label for="blog">Update Blog:
                    <input type="hidden" name="blogId" value="<?php echo $blog['id']; ?>">
                    <input type="text" name="blog" value="<?php echo $blog['task']; ?>">
                    <button type="submit">Update</button>
                </label>
            </form>
        </div>
    </div>
</body>
</html>