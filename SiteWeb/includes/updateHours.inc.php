<!-- CREATE TABLE restaurantHours (
    id INT PRIMARY KEY AUTO_INCREMENT,
    day VARCHAR(10) NOT NULL,
    open_morning TIME NOT NULL,
    close_morning TIME NOT NULL,
    open_evening TIME NOT NULL,
    close_evening TIME NOT NULL,
); -->


<?php

include_once '../includes/dbh.inc.php';

$days = array(
    'Monday' => array('morning' => array('open' => $_POST['mondayOpenMorning'], 'close' => $_POST['mondayCloseMorning']),
                      'evening' => array('open' => $_POST['mondayOpenEvening'], 'close' => $_POST['mondayCloseEvening'])),

    'Tuesday' => array('morning' => array('open' => $_POST['tuesdayOpenMorning'], 'close' => $_POST['tuesdayCloseMorning']),
                        'evening' => array('open' => $_POST['tuesdayOpenEvening'], 'close' => $_POST['tuesdayCloseEvening'])),

    'Wednesday' => array('morning' => array('open' => $_POST['wednesdayOpenMorning'], 'close' => $_POST['wednesdayCloseMorning']),
                          'evening' => array('open' =>  $_POST['wednesdayOpenEvening'], 'close' => $_POST['wednesdayCloseEvening'])),

    'Thursday' => array('morning' => array('open' => $_POST['thursdayOpenMorning'], 'close' => $_POST['thursdayCloseMorning']),
                        'evening' => array('open' => $_POST['thursdayOpenEvening'], 'close' => $_POST['thursdayCloseEvening'])),

    'Friday' => array('morning' => array('open' => $_POST['fridayOpenMorning'], 'close' => $_POST['fridayCloseMorning']),
                      'evening' => array('open' => $_POST['fridayOpenEvening'], 'close' => $_POST['fridayCloseEvening'])),

    'Saturday' => array('morning' => array('open' => $_POST['saturdayOpenMorning'], 'close' => $_POST['saturdayCloseMorning']),
                        'evening' => array('open' => $_POST['saturdayOpenEvening'], 'close' => $_POST['saturdayCloseEvening'])),

    'Sunday' => array('morning' => array('open' => $_POST['sundayOpenMorning'], 'close' => $_POST['sundayCloseMorning']),
                      'evening' => array('open' => $_POST['sundayOpenEvening'], 'close' => $_POST['sundayCloseEvening'])),
);

foreach ($days as $day => $hours) {
    $openMorning = $hours['morning']['open'];
    $closeMorning = $hours['morning']['close'];
    $openEvening = $hours['evening']['open'];
    $closeEvening = $hours['evening']['close'];

    $query = "UPDATE restauranthours SET open_morning='$openMorning', close_morning='$closeMorning', open_evening='$openEvening', close_evening='$closeEvening' WHERE day='$day'";

$result = mysqli_query($conn, $query);

}

header("Location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php");
exit();
mysqli_close($conn);

