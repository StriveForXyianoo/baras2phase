<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Access</title>
    <link rel="stylesheet" href="style/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <style>
      .imahe{
       /*set the image to the center of the page*/
        display: block;
        margin-left: auto;
        margin-right: auto;
        /*remove the margin buttom*/
        margin-bottom: 0px;
        width: 250px;
        height: 250px;

      }
    </style>
</head>
<body>
<img src="images/bpp2nhs.png" class="imahe">  

    <div class="login-page">
        <div class="form">
        <h2>Admin Access</h2>
        <form class="login-form"  id="login-form" autocomplete="OFF">
            <input type="email" name="email" id="email" placeholder="Email" required/>
            <input type="password" name="password" id="password" placeholder="Password" required/>
            <button  type="submit" name="login">Login</button>
            
        </form>
        </div>
    </div>
    
        <script>
            $(document).ready(function() {
  $('#login-form').submit(function(e) {
    e.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();
    $.ajax({
      type: 'POST',
      url: 'controllers/login.php',
      data: { email: email, password: password },
      dataType: 'json',
      success: function(response) {
        if (response.status == 'success') {
          Swal.fire({
            title: 'Logged in successfully!',
            text : 'Redirecting...',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
          }).then(function() {
            window.location.href = 'success.php';
          });
        } else {
          Swal.fire({
            title: 'Invalid email or password!',
            icon: 'error'
          }).then(function() {
            window.location.href = 'index';
          })
        }
      },
      error: function() {
        Swal.fire({
          title: 'An error occurred!',
          icon: 'error'
        });
      }
    });
  });
});

</script>
      
</body>
</html>