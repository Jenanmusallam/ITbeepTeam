<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" rel="stylesheet"/>
<title>Document</title>
<style>
    label.btn:not(.btn-flat) { 
  background-color: #35DDE0;
  color: #333;
}
</style>
</head>
<body>
    <?php
            $query  = "select * from interstrs";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
               echo ' <label class="waves-effect waves-light btn btn-flat"><input type="checkbox" name="countries[]" value="' . $row['name'] . '" />' . $row['name'] . '</label>';
            }
    ?>
     <?php
            $query  = "select * from servicers";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
               echo ' <label class="waves-effect waves-light btn btn-flat"><input type="checkbox" name="countries[]" value="' . $row['name'] . '" />' . $row['name'] . '</label>';
            }
    ?>


<script>
    $('label.btn').on('click','input', function(e){
  e.stopPropagation();
  $(this).attr('checked', !$(this).attr('checked'));
  $(e.target).closest('label').toggleClass('btn-flat');
});
</script>


</body>
</html>