<?php
if (!session_id()) session_start();
//call all file mvc
require_once '../app/init.php';


$app = new App;
