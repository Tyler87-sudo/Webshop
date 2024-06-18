<?php
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 50)) {
session_unset();
session_destroy();
}

function logout() : void {
    session_unset();
    session_destroy();
}

$_SESSION['LAST_ACTIVITY'] = time();

function user_id(): int
{
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        if(is_array($_SESSION['user']) && array_key_exists('id', $_SESSION['user'])) {
            return intval($_SESSION['user']['id']);
        } elseif(is_object($_SESSION['user']) && property_exists($_SESSION['user'], 'id')) {
            return intval($_SESSION['user']->id);
        }
    }
    return 0;
}


function isLoggedIn(): bool
{
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        if(is_array($_SESSION['user']) && array_key_exists('id', $_SESSION['user'])) {
            if(intval($_SESSION['user']['id']) > 0)
                return true;
        } elseif(is_object($_SESSION['user']) && property_exists($_SESSION['user'], 'id')) {
            if(intval($_SESSION['user']->id > 0))
                return true;
        }
    }

    return false;
}

function guest(): bool
{
    return !isLoggedIn();
}