<?php
session_name('gestdgt+');
session_start();
session_destroy();
header('Location: index.php');
exit;

?>