<?php
session_start();      // ✅ Session start
session_unset();      // ✅ All session variables unset
session_destroy();    // ✅ Destroy the session completely

// ✅ Redirect to homepage (index.php)
header("Location: index.php");
exit();
?>
