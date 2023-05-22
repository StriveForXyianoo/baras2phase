$(document).ready(function() {
    // Attach click event handler to delete buttons
    $('.delete-button').click(function() {
      var id = $(this).data('id');
      
      // Display SweetAlert confirmation dialog
      swal({
        title: "Confirmation",
        text: "Are you sure you want to delete this data?",
        icon: "warning",
        buttons: ["Cancel", "Yes, delete it"],
        dangerMode: true,
      })
      .then(function(willDelete) {
        if (willDelete) {
          // Perform AJAX request to delete data
          $.ajax({
            url: 'controllers/deleteann.php', // Replace with your server-side delete script
            type: 'POST',
            data: { id: id },
            success: function(response) {
              // Display SweetAlert success message
              swal("Success", "Data deleted successfully", "success")
              .then(function() {
                // Reload the page
                location.reload();
              });
            },
            error: function(xhr, status, error) {
              // Handle error scenario
              swal("Error", "An error occurred while deleting the data", "error");
            }
          });
        }
      });
    });
  });
  