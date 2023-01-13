<?php

session_start();
session_unset();
session_destroy();

header("location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php");