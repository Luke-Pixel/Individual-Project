<?php

$_SESSION['s_ID'] = $_POST["search_btn"];
header("Location: ../searched_user.php");