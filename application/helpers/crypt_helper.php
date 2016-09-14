<?php

function generate_hash($password)
{
    return password_hash($password, PASSWORD_BCRYPT, array(
        'cost' => 10
    ));
}

function verify($existed, $password)
{
    return password_verify($password, $existed);
}

