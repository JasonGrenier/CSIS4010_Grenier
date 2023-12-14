<?php include("global.php");
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K & M Beauty Lounge</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addServiceForm" action="add_service.php" method="post">
                        <div class="form-group">
                            <label for="serviceName">Service Name</label>
                            <input type="text" class="form-control" id="serviceName" name="serviceName" required>
                        </div>
                        <div class="form-group">
                            <label for="serviceDescription">Description</label>
                            <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="servicePrice">Price</label>
                            <input type="number" class="form-control" id="servicePrice" name="servicePrice" required>
                        </div>
                    </form>

                    <form id="addServiceForm">
                        <!-- Form fields go here -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addServiceForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center">Services Available</h2>
    <p class="text-center text-muted"><i>View or update services.</i></p>
    <div class="row mb-3">
        <div class="col text-right">
            <a href="add_service.php" class="btn" style="background: #800020; color: white;" data-toggle="modal" data-target="#addServiceModal">Add New Service</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $is_admin = 1;
                // Queries the database for all services
                $res = mysqli_query($connection, "SELECT * FROM Service WHERE SalonID = 4;");
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row["ServiceID"];
                    $service = $row["ServiceName"];
                    $desc = $row["Description"];
                    $price = floatval($row["Price"]);
                    ?>
                    <tr>
                        <td><?php echo $service ?></td>
                        <td><?php echo $desc ?></td>
                        <td><?php echo $price ?></td>
                        <td>
                            <a href="edit_service.php?id=<?php echo $id; ?>&serviceDescription=<?php echo urlencode($desc);?>&servicePrice=<?php echo urlencode($price);?>&serviceName=<?php echo $service;?>" class="btn btn-sm">
                                <img src='assets/img/edit.png' alt='edit' style='height: 40px;'>
                            </a>
                        </td>
                        <td>
                            <a href="delete_process.php?id=<?php echo $id; ?>" class="btn btn-sm">
                                <img src='assets/img/delete.png' alt='delete' style='height: 40px;'>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('addServiceForm').addEventListener('submit', function(event) {
        var serviceName = document.getElementById('serviceName').value;
        var serviceDescription = document.getElementById('serviceDescription').value;
        var servicePrice = document.getElementById('servicePrice').value;

        var errorMessage = '';
        if (serviceName.length < 3) {
            errorMessage += 'Service name must be at least 3 characters long.\n';
        }
        if (!serviceDescription) {
            errorMessage += 'Description cannot be blank.\n';
        }
        if (isNaN(servicePrice) || servicePrice === '') {
            errorMessage += 'Price must be a number.\n';
        }

        if (errorMessage) {
            event.preventDefault();
            alert(errorMessage);
        }
    });
</script>
</body>
</html>
