<?php
use Illuminate\Support\Facades\Auth;

function checkPermission($permissions){
    $userAccess = Auth::user()->role;

    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}
?>