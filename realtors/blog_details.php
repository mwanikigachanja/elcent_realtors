<?php
session_start();
require 'admin/config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = mysqli_real_escape_string($link, $_GET['id']);
$query = "SELECT * FROM blogs WHERE id = '$id'";
$result = mysqli_query($link, $query);
$blog = mysqli_fetch_assoc($result);

if (!$blog) {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details - Elcent Realtors</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <img src="<?php echo $blog['image']; ?>" class="img-fluid" alt="<?php echo $blog['title']; ?>">
                <h1 class="mt-4"><?php echo $blog['title']; ?></h1>
                <p class="text-muted">Posted on <?php echo date('F j, Y', strtotime($blog['created_at'])); ?></p>
                <p><?php echo nl2br($blog['content']); ?></p>
            </div>
            <div class="col-md-4">
                <h3>Related Posts</h3>
                <?php
                $relatedQuery = "SELECT * FROM blogs WHERE id != '$id' ORDER BY created_at DESC LIMIT 5";
                $relatedResult = mysqli_query($link, $relatedQuery);
                while ($related = mysqli_fetch_assoc($relatedResult)) {
                    echo '<div class="mb-3">';
                    echo '<h5><a href="blog_details.php?id=' . $related['id'] . '">' . $related['title'] . '</a></h5>';
                    echo '<p class="text-muted">' . date('F j, Y', strtotime($related['created_at'])) . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
