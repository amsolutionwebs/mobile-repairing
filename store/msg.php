<?php
if (empty($_SESSION['msg'])) {

} else {
$e_msg = $_SESSION['msg'];

?>

<div class="col-md-8">

<style>
#skb { position: absolute; z-index:999933; width:100%; border-radius:5px; border:0; margin-top:5px; text-align:center; margin-left: 250px; }
.alert {
padding:5px 10px;
font-size:12px;
}
.alert-success {
color: #fff;
background-color: #4CB844;
border-color: #468847;
}
.alert-warning {
color: #fff;
background-color: #FB7E02;
border-color: #DF7C00;
}
.alert-danger,
.alert-error {
color: #fff;
background-color: #DC494C;
border-color: #b94a48;
}
</style>
<?php if ($e_msg === md5('1')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully logout. </div>
<?php } ?>
<?php if ($e_msg === md5('2')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your username and password don't match. </div>
<?php } ?>		 <?php if ($e_msg === md5('notadmin')) { ?>      <div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> your are not the admin. </div>    <?php } ?>
<?php if ($e_msg === md5('otp')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your OTP don't match. </div>
<?php } ?>
<?php if ($e_msg === md5('user_error')) { ?>
<div class="alert alert-warning" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Employee details Already exists. </div>
<?php } ?>
<?php if ($e_msg === md5('3')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your password has been changed successfully! Thank you. </div>
<?php } ?>
<?php if ($e_msg === md5('4')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your password has been reset successfully. </div>
<?php } ?>
<?php if ($e_msg === md5('5')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Added. </div>
<?php } ?>
<?php if ($e_msg === md5('6')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Updated. </div>
<?php } ?>
<?php if ($e_msg === md5('7')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Removed. </div>
<?php } ?>

<?php if ($e_msg === md5('failed')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Failed try again. </div>
<?php } ?>

<?php if ($e_msg === md5('trashed')) { ?>
<div class="alert alert-warning" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Trashed. </div>
<?php } ?>
<?php if ($e_msg === md5('restored')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Restored. </div>
<?php } ?>
<?php if ($e_msg === md5('8')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Task added successfully. </div>
<?php } ?>
<?php if ($e_msg === md5('p_error')) { ?>
<div class="alert alert-warning" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Already exists. </div>
<?php } ?>
<?php if ($e_msg === md5('9')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> You have successfully logged in. </div>
<?php } ?>
<?php if ($e_msg === md5('10')) { ?>
<div class="alert alert-warning" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your password and confirm password don't match. </div>
<?php } ?>
<?php if ($e_msg === md5('11')) { ?>
<div class="alert alert-warning" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Something went wrong. </div>
<?php } ?>
<?php if ($e_msg === md5('12')) { ?>
<div class="alert alert-warning" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Sorry Entry already Done ! Please delete entry again indent and mill . </div>
<?php } ?>
<?php if ($e_msg === md5('13')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Thank you for contacting us. We will be in touch with you very soon. </div>
<?php } ?>
<?php if ($e_msg === md5('14')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Disable. </div>
<?php } ?>
<?php if ($e_msg === md5('15')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Enable. </div>
<?php } ?>
<?php if ($e_msg === md5('16')) { ?>
<div class="alert alert-warning" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your E-mail Id don't match. </div>
<?php } ?>
<?php if ($e_msg === md5('17')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Thank you for contacting us. We will be in touch with you very soon. </div>
<?php } ?>

<?php if ($e_msg === md5('18')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Registration Succesfull. </div>
<?php } ?>

<?php if ($e_msg === md5('19')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Addmission Succesfull. </div>
<?php } ?>

<?php if ($e_msg === md5('login')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Login. </div>
<?php } ?>

<?php if ($e_msg === md5('wrong_data')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Wrong Credentials . </div>
<?php } ?>


<?php if ($e_msg === md5('wrong_otp')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Wrong Otp . </div>
<?php } ?>

<?php if ($e_msg === md5('allready_shipped')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Allready Shipped. </div>
<?php } ?>

<?php if ($e_msg === md5('success_otp')) { ?>
<div class="alert alert-success" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> An otp has been sent on your email. </div>
<?php } ?>

<?php if ($e_msg === md5('failed_otp')) { ?>
<div class="alert alert-danger" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Otp sending failed try again latter. </div>
<?php } ?>


<?php if ($e_msg === md5('not_match')) { ?>
<div class="alert alert-warning" id="skb"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your password and current password don't match. </div>
<?php } ?>


</div>

<?php } ?>
