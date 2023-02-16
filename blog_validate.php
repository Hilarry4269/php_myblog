<?php
include('db.php');
$connect = dbConnect();

$method = $_GET['method'];

switch($method) {
    case 'delete':
        if(isset($_GET['blogId'])) {
            $blogId = $_GET['blogId'];
            $sql = "DELETE FROM blog WHERE id = $blogId";
            if(mysqli_query($connect, $sql)) {
                header('Location: blog.php');
            }else{
                echo "An error occured.";
            }
        }
        break;
    case 'add':
        if(isset($_POST['blog'])) {
            $blog = strip_tags($_POST['blog']);

            $sql = $connect->prepare("INSERT INTO blog(task) VALUES (?)");
            $sql->bind_param("s", $blog);
        
            if($sql->execute()) {
                echo "Blog Added!";
                header('Location: blog.php');
            }else{
                echo "An error occured.";
            }
        }
        break;
    case 'edit':
        if(isset($_POST['blogId'])) {
            $blogId = $_POST['blogId'];
            $blog = $_POST['blog'];
            $sql = "UPDATE blog SET task = '$blog' WHERE id = $blogId";
            if(mysqli_query($connect, $sql)) {
                header('Location: blog.php');
            }else{
                echo "An error occured.";
            }
        }
        break;
    default:
        echo "Unknown Method.";
}
?>

