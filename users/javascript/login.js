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
  