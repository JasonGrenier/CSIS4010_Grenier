<?php include("global.php");?>

<div class="container mt-4">
    <h3><i>Service Entry</i></h3>
    <div class="row">
        <div class="col-md-8">
            <form action="edit_process.php" method="POST" class="needs-validation" novalidate>

                <div class="form-group">
                    <label for="serviceName">Service Name:</label>
                    <input type="text" class="form-control" id="serviceName" name="serviceName" value="<?php echo $_POST["serviceName"]?>" required>
                </div>

                <div class="form-group">
                    <label for="serviceDescription">Description:</label>
                    <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" required><?php echo $_POST["serviceDescription"]?></textarea>
                </div>

                <div class="form-group">
                    <label for="servicePrice">Price:</label>
                    <input type="number" class="form-control" id="servicePrice" name="servicePrice" value="<?php echo $_POST["servicePrice"] ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="col-md-4">
            <?php if (isset($errormessage)) {
                echo '<div class="alert alert-danger" role="alert">';
                echo $errormessage;
                echo '</div>';
            }  else {
                header("Location: index.php");
            }?>
        </div>
    </div>
</div>
