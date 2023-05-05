<?php
require_once './php/db_connect.php';
$sql = "SELECT media.*, mediatype.mediatype AS media_type, author.name AS author_name, publisher.name AS publisher_name 
        FROM media 
        JOIN mediatype ON media.mediatype_id = mediatype.id
        JOIN author ON media.author_id = author.id
        JOIN publisher ON media.publisher_id = publisher.id";
$result = mysqli_query($connect, $sql);
$layout = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $layout .= "<tr>";
        $layout .= "<td class='lnh'>" . $row['id'] . "</td>";
        $layout .= "<td class='lnh'>" . "<img class='img-thumbnail' src='{$row['image']}'></img>" . "</td>";
        $layout .= "<td class='lnh'>" . $row['name'] . "</td>";
        $layout .= "<td class='lnh'>" . $row['description'] . "</td>";
        if ($row['status'] == '1') {
            $layout .= "<td class='lnh'>" . "<span class='badge bg-success'>availible</span>" . "</td>";
        } else {
            $layout .= "<td class='lnh'>" . "<span class='badge bg-danger'>reserved</span>" . "</td>";
        }
        $layout .= "<td>" . "<a class='btn btn-secondary text-decoration-none text-white' href='./php/details.php?id={$row['id']}'>details</a>" . "</td>";
        $layout .= "<td>" . "<a class='btn btn-primary text-decoration-none text-white' href='./php/edit.php?id={$row['id']}'>edit</a>" . "</td>";
        $layout .= "<td>" . "<a class='btn btn-danger text-decoration-none text-white' href='./php/delete.php?id={$row['id']}'>delete</a>" . "</td>";
        $layout .= "</tr>";
    }
} else {
    $layout = "<tr><td colspan='4'>No data found</td></tr>";
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
                    <th scope="col">description</th>
                    <th scope="col">status</th>
                    <th scope="col">details</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
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