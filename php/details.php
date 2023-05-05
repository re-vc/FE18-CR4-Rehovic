<?php
require_once 'db_connect.php';
$id = $_GET['id'];
$sql = "SELECT media.*, mediatype.mediatype AS media_type, author.name AS author_name, publisher.name AS publisher_name
        FROM media
        JOIN mediatype ON media.mediatype_id = mediatype.id
        JOIN author ON media.author_id = author.id
        JOIN publisher ON media.publisher_id = publisher.id
        WHERE media.id = {$id}";
$result = mysqli_query($connect, $sql);
$layout = "";
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $layout .= "<tr>";
        $layout .= "<td class='lnh'>" . $row['id'] . "</td>";
        $layout .= "<td class='lnh'>" . "<img class='img-thumbnail' src='{$row['image']}'></img>" . "</td>";
        $layout .= "<td class='lnh'>" . $row['name'] . "</td>";
        $layout .= "</tr>";

        $layout .= "<table class='table'>";
        $layout .= "<thead>";
        $layout .= "<tr>";
        $layout .= "<th scope='col'>media type</th>";
        $layout .= "<th scope='col'>description</th>";
        $layout .= "<th scope='col'>author</th>";
        $layout .= "<th scope='col'>publisher</th>";
        $layout .= "<th scope='col'>publish date</th>";
        $layout .= "<th scope='col'>status</th>";
        $layout .= "<th scope='col'>isbn</th>";
        $layout .= "</tr>";
        $layout .= "</thead>";

        $layout .= "<tbody>";
        $layout .= "<tr>";
        $layout .= "<td class='lnh'>" . $row['media_type'] . "</td>";
        $layout .= "<td class='lnh'>" . $row['description'] . "</td>";
        $layout .= "<td class='lnh'>" . $row['author_name'] . "</td>";
        $layout .= "<td class='lnh'>" . $row['publisher_name'] . "</td>";
        $layout .= "<td class='lnh'>" . $row['publish_date'] . "</td>";
        if ($row['status'] == '1') {
            $layout .= "<td class='lnh'>" . "<span class='badge bg-success'>available</span>" . "</td>";
        } else {
            $layout .= "<td class='lnh'>" . "<span class='badge bg-danger'>reserved</span>" . "</td>";
        }
        $layout .= "<td class='lnh'>" . $row['isbn'] . "</td>";
        $layout .= "</tr>";
        $layout .= "</tbody>";

        $layout .= "</table>";

        $layout .= "<div class='d-flex justify-content-between'>";
        $layout .= "<a class='btn btn-secondary text-decoration-none text-white w-100 mx-1' href='../index.php'>back</a>";
        $layout .= "<a class='btn btn-primary text-decoration-none text-white w-100 mx-1' href='./php/edit.php?id={$row['id']}'>edit</a>";
        $layout .= "<a class='btn btn-danger text-decoration-none text-white w-100 mx-1' href='./php/delete.php?id={$row['id']}'>delete</a>";
        $layout .= "</div>";
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
    <style>
        .lnh {
            line-height: 2.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="display-1">LibraryCRUD</h1>
        <a class='btn btn-success text-decoration-none text-white w-100 my-5' href="./php/create.php">create</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">image</th>
                    <th scope="col">name</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $layout; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>