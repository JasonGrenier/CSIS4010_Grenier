<?php
include "Backend/global.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>K&M Beauty Lounge - Login</title>
  <!-- Link to Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS for the modern salon color scheme -->
  <style>
    body {
      background-color: #f3f3f3; /* Light gray background */
      color: #333; /* Dark text color */
    }
    .container {
      background-color: #fff; /* White background for the form */
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
      max-width: 400px; /* Smaller width */
      margin: 0 auto; /* Center the form horizontally */
    }
    .btn-salon {
      background-color: #ff6f61; /* Coral color button */
      color: #fff; /* White text color */
      border: none;
    }
    .btn-salon:hover {
      background-color: #ff4e40; /* Darker coral color on hover */
      color: #fff;
    }
  </style>
</head>
<body>
<?php
if($loginResponse["errorCode"] == 1){
    echo '<div class="alert alert-danger" role="alert">';
    echo $loginResponse["errorMessage"];
    echo '</div>';
}
?>
<div class="container mt-5">
  <h2 class="text-center">K&M Beauty Lounge</h2>
  <p class="text-center">Professional Salon Services</p>
  <form action="<?php echo "$root/Backend/login_process.php"?>" method="POST">
      <div class="form-group">
          <label for="username">Username:</label><input class="form-control" placeholder="Enter username"
                  value="<?php echo htmlspecialchars($_POST["username"], ENT_QUOTES); ?>"
                  type="text" name="username" id="username" required>
      </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password"
             value="<?php echo htmlspecialchars($_POST["password"], ENT_QUOTES); ?>"
             placeholder="Enter password" required>
    </div>
    <button type="submit" class="btn btn-salon btn-block">Login</button>
  </form>
  <div class="text-center mt-3">
    <a href="password_reset.html">Forgot Password?</a> | <a href="register.html">Sign Up</a>
  </div>
</div>

<!-- Link to Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
