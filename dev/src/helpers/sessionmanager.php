<?php

//if (isset($_SESSION['logoutmessage'])) {
//    unset($_SESSION['logoutmessage']);
//}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1)) {
    session_unset();
    session_destroy();
//    echo "<p>". $_SESSION['logoutmessage'] = "You have been logged out, please login again!" . "</p>";
}

function logout() : void {
    session_unset();
    session_destroy();
}

$_SESSION['LAST_ACTIVITY'] = time();
