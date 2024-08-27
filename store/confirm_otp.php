<?php 
include 'config/config.php';
include 'config/helper.php';
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Welcome Back | Login</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<!-- JQVMap -->
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
		<!-- Theme style -->
		<link rel="stylesheet" href="dist/css/adminlte.min.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<!-- Daterange picker -->
		<!-- summernote -->
		<link rel="stylesheet" href="plugins/fontawesome-free/css/font-awesome.min.css">
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<style>
		.panel {
			padding: 15px;
			margin-bottom: 20px;
			background-color: #fff;
			border: 1px solid transparent;
			border-radius: 4px;
			-webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
			box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
		}
		
		@media only screen and (max-width: 600px) {
			body {
				padding-left: 35px;
				padding-right: 35px;
			}
		}
		
		@media only screen and (max-width: 768px) {
			body {
				padding-left: 60px;
				padding-right: 60px;
			}
		}
		</style>

		<body>
			<section class="login_section .bg_image">
				<?php include_once 'msg.php'; ?>
				<div class="container">
					
					<div class="row d-flex justify-content-center align-items-center">

						<div class="col-md-4 col-md-offset-6" style="margin-top:50px;">
							<div class="logo d-flex justify-content-center align-items-center">    <h1 style="font-weight: bolder;color: #fff;
    text-shadow: 3px 2px black;"><i class="fa fa-gear fa-spin"></i> EMPLOYEE PANEL</h1> </div>
							<div class="login-panel panel panel-default text-center"> <img src="dist/img/enquiry.png" class="img-responsive center-block rounded-circle mb-4" alt="Logo" width="100px" style="border-radius: 50%;border:1px solid #ccc;" />
								<div class="panel-body text-center">
									<form class="form-signin" method="post" action="loginaction_two.php" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
										<fieldset>
										

											<div class="form-group">
									<input name="usertype" type="hidden" value="<?php echo $_SESSION['usertype'];?>">
									<input name="email" type="hidden" value="<?php echo $_SESSION['email'];?>">
									<input name="password" type="hidden" value="<?php echo $_SESSION['password'];?>">
												<input class="form-control" placeholder="Please Enter Otp" name="otp" type="text" autofocus title="Please Enter Otp" required=""> </div>
										<a href="#" class="btn btn-link pull-right" type="button" data-toggle="modal" data-target="#chang_password">Resend Otp</a>
											<button class="btn btn-success btn-block" type="submit"> Login in</button>
											<input type="hidden" name="submit" value="Login"> </fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="content mb-3">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="modal fade" id="chang_password">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">
										<div class="col-sm-12 text-center mb-2">
											<center> <img src="dist/img/enquiry.png" style="width:80px;height: 80px; border-radius:50%;" /> </center>
										</div>
										<div class="col-sm-12">
											<h5 class="ml-4"><i class="fas fa-envelope text-success"></i> PLEASE FILL CAREFULLY DETAILS HERE !</h5></div>
										<form class="form-horizontal" action="pay_fee_action.php" method="post" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group">
													<input type="text" name="paid_by" class="form-control" placeholder="Current Password"> </div>
												<div class="form-group">
													<input type="text" name="amount" class="form-control" id="amount" placeholder="New Password"> </div>
												<div class="form-group ">
													<input type="text" name="total_dues" class="form-control" id="dues_amount" placeholder="Confirm Password"> </div>
												<div class="form-group ">
													 </div>
												<div class="form-group ">
													<input type="submit" name="payfees" class="btn form-control" style="background-color: yellowgreen;color:white;"> </div>
											</div>
											<!-- /.card-body -->
											<!-- /.card-footer -->
										</form>
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->
					</div>
				</div>
			</section>
<?php 
require_once("common/script.php");
?>
<script>
$(document).ready(function () {
$('div#skb').delay(7000).slideUp();
});

var bgimages = ['bg-01.webp','bg-02.webp','bg-03.webp','bg-04.webp','bg-05.webp','bg-06.webp','bg-07.webp','bg-08.webp','bg-09.webp','bg-10.webp','bg-11.webp','bg-12.webp','bg-13.webp','bg-14.webp','bg-15.webp','bg-16.webp','bg-17.webp','bg-18.webp','bg-19.webp','bg-20.webp','bg-21.webp','bg-22.webp','bg-23.webp','bg-24.webp','bg-25.webp','bg-26.webp','bg-27.webp','bg-28.webp','bg-29.webp','bg-30.webp','bg-31.webp','bg-32.webp','bg-33.webp','bg-34.webp'];
var number = Math.floor(Math.random()*34)+0;
document.body.style.background = "url(dist/bg-img/"+bgimages[number]+")";
document.body.style.backgroundSize = "cover";


</script>
</body>
</html>