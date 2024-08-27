<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->

<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/admin.js"></script>

<!-- datatable -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



<script>



$(document).ready(function () {
$('div#skb').delay(4000).slideUp();
});



$(document).ready(function() {
  $('.select2').select2();
});

$(document).ready(function(){
          $('#confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
          $('#message').html('Matching').css('color', 'green');
        } else 
          $('#message').html('Not Matching').css('color', 'red');
      });
  });
  //signup show password
$(document).ready(function(){
  $(".p-show-icon").click(function(){
    if($(".current_password_p").attr("type") == "password")
    { 
      $(this).css({color: "green"});
      $(".current_password_p").attr("type","text");
    }
    else
    { 
      $(this).css({color: "#ccc"});
      $(".current_password_p").attr("type","password");
    }
  });
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})();

function validateNumberInput(inputElement) {
      // Get the input value
      const inputValue = inputElement.value;

      // Use a regular expression to check if the input contains only numbers
      if (/^\d+$/.test(inputValue)) {
        // console.log('Valid input: ' + inputValue);
      } else {
        // If the input is not a valid number, remove non-numeric characters
        inputElement.value = inputValue.replace(/\D/g, '');
        alert("Sorry ! Only Numbers Allowed")
      }
    }


function copyInputValue(value) {
     var result = confirm("Are you sure you want to use as a whatsapp Number ?");
      // Check the result
      if (result) {
      document.getElementById('whatsapp_number').value = value;
      }      
    }


function getState(value){
    
			$.ajax({
				type: "POST",
				url: 'get_states.php',
				data: {
					value: value
				},
				beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
				success: function(response) {
				    $("#setloader").removeClass("pageloader");
				    $("#state_field").html(response);
			
				}
			});
}


function getCity(value){
    $.ajax({
				type: "POST",
				url: 'get_cities.php',
				data: {
					value: value
				},
				beforeSend: function() {
					$("#setloader").addClass("pageloader");
				},
				success: function(response) {
				    $("#setloader").removeClass("pageloader");
				    $("#city_field").html(response);
			
				}
			});
}
</script>

<script type="text/javascript">
  function deleteData(delete_id,delete_type) {
    $.ajax({
            type: "POST",
            url: 'send_otp_delete_action.php',
            success: function(data) {
              if(data.trim()=="success"){
                $('#delete_id').val(delete_id);
                $('#delete_type').val(delete_type);
                $('#delete_model').modal('show');
              }else{
                alert("Otp Sending Failed please contact adminstartor");
              }
            }
          });
  }
  
  
  function deleteAdminData(delete_id,delete_type){
      
      $.ajax({
            type: "POST",
            url: 'send_otp_delete_action_supar_admin.php',
            success: function(data) {
              if(data.trim()=="success"){
                $('#delete_id_supar_admin').val(delete_id);
                $('#delete_type_supar_admin').val(delete_type);
                $('#delete_supar_admin_model').modal('show');
              }else{
                alert("Otp Sending Failed please contact adminstartor");
              }
            }
          });
  }
</script>

<script>
    function resendOtp(){
        var usertype = $("#usertype").val();
        var email = $("#email").val();
        var password = $("#password").val();
        
        $.ajax({
		type: "POST",
		url: 'resend_otp.php',
		data: {
			usertype: usertype,
			email : email,
			password : password
		},
		success: function(data) {
			if(data.trim()=="yes"){
				window.location = location.href;
			}else{
			  alert("try again");
              } 
		
			}
		
	});
        
    }
</script>
