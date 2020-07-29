<?php
// first need o check for those data
if (!empty($_GET['tid'] && !empty($_GET['product']))) {
  // filter the get array and pass in get array
  $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

  $tid = $GET['tid'];
  $product = $GET['product'];
} else {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Thank You</title>
</head>

<body>
  <div class="container mt-4">
    <h2>Thank you for purchasing <?php echo $product; ?></h2>
    <hr>
    <p>Your transaction ID is <?php echo $tid; ?></p>
    <p>Check your email for more info</p>
    <p><a href="index.php" class="btn btn-light mt-2">Go Back</a></p>
  </div>
</body>

</html>