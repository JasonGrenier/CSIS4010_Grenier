<?php include("global.php");
$id = intval($_GET["id"]);
$price = floatval($_GET["servicePrice"]);
$service = mysqli_real_escape_string($connection, $_GET["serviceName"]);
$desc = mysqli_real_escape_string($connection, $_GET["serviceDescription"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K & M Beauty Lounge</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to the Knight Bootstrap template CSS file -->
    <link href="path_to_knight_template_css.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <h3 class="mb-3"><i>Service Entry</i></h3>
    <div class="row">
        <div class="col-md-8">
            <form action="edit_process.php" method="POST">
                <div class="form-group">
                    <label for="serviceName">Service Name:</label>
                    <input type="text" class="form-control" id="serviceName" name="serviceName" required value="<?php echo htmlspecialchars($service); ?>">
                </div>

                <div class="form-group">
                    <label for="serviceDescription">Description:</label>
                    <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" required><?php echo htmlspecialchars($desc); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="servicePrice">Price:</label>
                    <input type="number" class="form-control" id="servicePrice" name="servicePrice" required value="<?php echo htmlspecialchars($price); ?>">
                </div>

                <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <!-- Use the appropriate button classes provided by the Knight template -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="col-md-4">
            <?php if (isset($errormessage)) {
                echo '<div class="alert alert-danger" role="alert">';
                echo htmlspecialchars($errormessage);
                echo '</div>';
            }?>
        </div>
    </div>
</div>
</body>
</html>
