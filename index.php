<?php
require 'connection.php';
$name = '';
$phone = '';
$email = '';

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $interstrs=$_POST['interested'];
   $servicers=$_POST['offer'];
   
   $query = "INSERT INTO customers(name,phone,email,service_id,interest_id) 
    values('$name','$phone','$email','$interstrs','$interstrs')";
	 mysqli_query($conn, $query);
    
    $name = '';
    $phone = '';
    $email = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>ITBoop Team</title>
</head>
<body>
 <div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="logo">
            <img src="logo_dark.png" alt="logo in company">
       

         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form">
               <form  method="post" action="">
                  <div class="form-group">
                       <label for="name">Name</label>
                       <input type="text" name="name" value="<?php echo $name; ?>" required class="form-control my-input" id="name" placeholder="Name">
                  </div>
                 <div class="form-group">
                       <label for="mobile">Mobile</label>
                       <input type="number" min="0" value="<?php echo $phone; ?>" required name="phone" id="phone"  class="form-control my-input" placeholder="Phone">
                  </div>
                   <div class="form-group">
                       <label for="Email">Email</label>
                       <input type="email" name="email"  value="<?php echo $email; ?>" required class="form-control my-input" id="email" placeholder="Email"> 
                  </div>
                   <!-- checkbox hidden -->
                  <div class="form-group">
                        <?php
                             $query  = "select * from servicers";
                             $result = mysqli_query($conn, $query);
                             while ($row = mysqli_fetch_assoc($result)) {
                                echo ' <input type="checkbox" name="offer" hidden id="offer'.$row['id'] .'"  value="' . $row['id'] . '" />';
                             }
                       ?>
                        <?php
                            $query  = "select * from interstrs";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                               echo ' <input type="checkbox" name="interested" hidden  id="interested'.$row['id'] .'" value="' . $row['id'] . '" />';
                            }
                       ?>
                    </div>
                    <!-- End checkbox  -->
                  <div class="text-center ">
                     <button  name="Next" class="btn btn-block g-button" id="btn" >Next</button>
                     <br>
                     <button type="submit" name="submit" class="btn btn-block g-button" style="background-color:#512570 !important;    margin-top: 1rem;">Send</button>
                     </div>
               </form>
            </div>
         </div>
     </div>
<!--  --><!-- end Container -->
   </div>
    <!-- Script -->
   
<script src="sweetalert2.all.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script >
     function checkOne() {
          document.getElementById("offer1").checked = true;
      } 
     function checkTwo() {
           document.getElementById("offer2").checked = true;
      }
     function checkThree() {
           document.getElementById("offer3").checked = true;
      }
     function checkFour() {
            document.getElementById("interested1").checked = true;
      }
     function checkFive() {
            document.getElementById("interested2").checked = true;
      }
     function checkSix() {
             document.getElementById("interested3").checked = true;
      }
    $(function(){
            $('#btn').click(function(e){
               var valid=this.form.checkValidity();
               if(valid){
               e.preventDefault();
               Swal.fire({
                       icon: 'question',
                       customClass: {
                         confirmButton: 'btn btn-next',
                         cancelButton: 'btn btn-danger-pop',
                       },
                       html: "<h4>Please select the services that you are interested in</h4>" +"<br>" +
                       '<input class="btn g-button-pop" type="button" onclick="checkOne()" value="Offer 1"> ' +
                       '<input class="btn g-button-pop" type="button" onclick="checkTwo()" value="Offer 2">'+ 
                       '<input class="btn g-button-pop" type="button" onclick="checkThree()" value="Offer 3">' + '<br>',
                       showCancelButton: true,
                       confirmButtonText:'Send',
                       cancelButtonText:'Close',
               }).then((result) => {
                       if (result.isConfirmed) {
                          Swal.fire({
                             html: "<h4>When Do you want to make the Order</h4>" +"<br>" +
                                 '<input class="btn g-button-pop" type="button" onclick="checkFour()" value="Within a Week"> '+
                                 '<input class="btn g-button-pop" type="button" onclick="checkFive()" value="Month"> ' +
                                 '<input class="btn g-button-pop" type="button" onclick="checkSix()" value="Not Interested"> ' +'<br>',
                              showDenyButton: false,
                              showConfirmButton: false,
                              showCancelButton: true,
                              cancelButtonText:'Close',
                             })
             }
              });
               }
    else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Enter Data Please!'
        });
    }
});
})
</script>
 <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>