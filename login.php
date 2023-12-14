<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-button {
            color: #fff;
            background-color: #800020;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <img src="assets/img/kmbeauty.png" class="card-img-top" alt="KMBEAUTY">
                <div class="card-body">
                    <form method="post" action="login_process.php">
                        <div class="mb-3">
                            <label for="salon" class="form-label">Salon</label>
                            <input type="text" class="form-control" id="salon" name="salon" required>
                        </div>
                        <div class="mb-3">
                            <label for="uuid" class="form-label">Salon UUID</label>
                            <input type="number" class="form-control" id="uuid" name="uuid" required>
                        </div>
                        <button type="submit" class="btn login-button">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
