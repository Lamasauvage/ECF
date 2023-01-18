<!-- CREATE TABLE restaurantHours (
    id INT PRIMARY KEY AUTO_INCREMENT,
    day VARCHAR(10) NOT NULL,
    open_morning TIME NOT NULL,
    close_morning TIME NOT NULL,
    open_evening TIME NOT NULL,
    close_evening TIME NOT NULL,
    status TINYINT NOT NULL
); -->


<?php

include_once '../includes/dbh.inc.php';

$days = array(
    'Monday' => array('morning' => array('open' => $_POST['mondayOpenMorning'], 'close' => $_POST['mondayCloseMorning']),
                      'evening' => array('open' => $_POST['mondayOpenEvening'], 'close' => $_POST['mondayCloseEvening']),
                      'status' => $_POST['mondayStatus']),
                      
    'Tuesday' => array('morning' => array('open' => $_POST['tuesdayOpenMorning'], 'close' => $_POST['tuesdayCloseMorning']),
                        'evening' => array('open' => $_POST['tuesdayOpenEvening'], 'close' => $_POST['tuesdayCloseEvening']),
                        'status' => $_POST['tuesdayStatus']),

    'Wednesday' => array('morning' => array('open' => $_POST['wednesdayOpenMorning'], 'close' => $_POST['wednesdayCloseMorning']),
                          'evening' => array('open' =>  $_POST['wednesdayOpenEvening'], 'close' => $_POST['wednesdayCloseEvening']),
                          'status' => $_POST['wednesdayStatus']),

    'Thursday' => array('morning' => array('open' => $_POST['thursdayOpenMorning'], 'close' => $_POST['thursdayCloseMorning']),
                        'evening' => array('open' => $_POST['thursdayOpenEvening'], 'close' => $_POST['thursdayCloseEvening']),
                        'status' => $_POST['thursdayStatus']),

    'Friday' => array('morning' => array('open' => $_POST['fridayOpenMorning'], 'close' => $_POST['fridayCloseMorning']),
                      'evening' => array('open' => $_POST['fridayOpenEvening'], 'close' => $_POST['fridayCloseEvening']),
                      'status' => $_POST['fridayStatus']),

    'Saturday' => array('morning' => array('open' => $_POST['saturdayOpenMorning'], 'close' => $_POST['saturdayCloseMorning']),
                        'evening' => array('open' => $_POST['saturdayOpenEvening'], 'close' => $_POST['saturdayCloseEvening']),
                        'status' => $_POST['saturdayStatus']),

    'Sunday' => array('morning' => array('open' => $_POST['sundayOpenMorning'], 'close' => $_POST['sundayCloseMorning']),
                      'evening' => array('open' => $_POST['sundayOpenEvening'], 'close' => $_POST['sundayCloseEvening']),
                      'status' => $_POST['sundayStatus']),

);

// Condition pour éviter d'écraser les données non modifié 

    foreach ($days as $day => $hours) {
        $openMorning = (!empty($hours['morning']['open'])) ? $hours['morning']['open'] : false;
        $closeMorning = (!empty($hours['morning']['close'])) ? $hours['morning']['close'] : false;
        $openEvening = (!empty($hours['evening']['open'])) ? $hours['evening']['open'] : false;
        $closeEvening = (!empty($hours['evening']['close'])) ? $hours['evening']['close'] : false;
        $status = (isset($hours['status']) && ($hours['status'] == 0 || $hours['status'] == 1)) ? $hours['status'] : 1;

        if ($openMorning === false && $closeMorning === false && $openEvening === false && $closeEvening === false) {
            continue;
        }

    $query = "SELECT * FROM restauranthours WHERE day='$day'";
    $result = mysqli_query($conn, $query);
    $row_count = mysqli_num_rows($result);
    if ($status == 0) {
        continue;
    }
    if ($row_count == 0) {
        // INSERT
        $query = "INSERT INTO restauranthours (day, open_morning, close_morning, open_evening, close_evening, status) VALUES ('$day', '$open_morning', '$close_morning', '$open_evening', '$close_evening', '$status')";
    } else {
        // UPDATE
            $query = "UPDATE restauranthours SET open_morning='$openMorning', close_morning='$closeMorning', open_evening='$openEvening', close_evening='$closeEvening', status='$status' WHERE day='$day'";
            var_dump($query);  
    }
    $result = mysqli_query($conn, $query);
}


header("Location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php");
mysqli_close($conn);


