<?php
require_once 'db_connect.php';

// Retrieve data from mediatype, author, publisher table
$mediaTypesResult = mysqli_query($connect, "SELECT * FROM mediatype");
$authorResult = mysqli_query($connect, "SELECT * FROM author");
$publisherResult = mysqli_query($connect, "SELECT * FROM publisher");

if ($_POST) {
    $image = $_POST['image'];
    $name = $_POST['name'];
    $media_type = $_POST['media_type'];
    $description = $_POST['description'];
    $author_name = $_POST['author_name'];
    $publisher_name = $_POST['publisher_name'];
    $publish_date = $_POST['publish_date'];
    $status = $_POST['status'];
    $isbn = $_POST['isbn'];
    $sql = "INSERT INTO media (image, name, mediatype_id, description, author_id, publisher_id, publish_date, status, isbn) VALUES ('$image', '$name', '$media_type', '$description', '$author_name', '$publisher_name', '$publish_date', '$status', '$isbn')";
    if (mysqli_query($connect, $sql) === true) {
        header("Location: ../index.php");
    } else {
        echo "Error updating record : " . $connect->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryCRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="display-1">LibraryCRUD</h1>
        <form method="POST">
            <div class="form-group my-5">
                <input class="form-control my-2 text-center" type="text" placeholder="please specify an image url" name="image">
                <input class="form-control my-2 text-center" type="text" placeholder="please specify a name" name="name">
                <select class="form-control my-2 text-center" id="exampleFormControlSelect2" name="media_type">
                    <?php while ($mediaType = mysqli_fetch_assoc($mediaTypesResult)) : ?>
                        <option value="<?php echo $mediaType['id']; ?>"><?php echo $mediaType['mediatype']; ?></option>
                    <?php endwhile; ?>
                </select>
                <input class="form-control my-2 text-center" type="text" placeholder="please specify a description" name="description">
                <select class="form-control my-2 text-center" id="exampleFormControlSelect2" name="author_name">
                    <?php while ($author = mysqli_fetch_assoc($authorResult)) : ?>
                        <option value="<?php echo $author['id']; ?>"><?php echo $author['name']; ?></option>
                    <?php endwhile; ?>
                </select>
                <select class="form-control my-2 text-center" id="exampleFormControlSelect2" name="publisher_name">
                    <?php while ($publisher = mysqli_fetch_assoc($publisherResult)) : ?>
                        <option value="<?php echo $publisher['id']; ?>"><?php echo $publisher['name']; ?></option>
                    <?php endwhile; ?>
                </select>
                <input class="form-control my-2 text-center" type="date" placeholder="please specify a publish date" name="publish_date">
                <select class="form-control my-2 text-center" id="exampleFormControlSelect2" name="status">
                    <option value="0">reserved</option>
                    <option value="1">availible</option>
                </select>
                <input class="form-control my-2 text-center" type="text" placeholder="please specify an isbn" name="isbn">
                <button class='btn btn-success text-decoration-none text-white w-100' type="submit" value="submit">submit</button>
                <a class='btn btn-secondary text-decoration-none text-white w-100 my-1' href='../index.php'>back</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>