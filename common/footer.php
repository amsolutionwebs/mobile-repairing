<footer class="main-footer">
    <strong>Copyright &copy; MWB - 2023-2024 <a href="https://amsolution.in.net"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0-rc
    </div>
</footer>
<?php
$db->close();
$_SESSION['msg'] = '0';
?>
<?php ob_end_flush(); ?>