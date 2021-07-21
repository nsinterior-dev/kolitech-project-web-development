<?php
// this is to sign out from dashboard
session_start();
session_unset();
session_write_close();
header("location: index.php");