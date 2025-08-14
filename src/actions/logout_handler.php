<?php

require_once __DIR__ . '/../helpers/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logout();
}

redirect('/baby_name/admin/control.php');