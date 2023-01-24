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
    'Lundi' => array('morning' => array('open' => $_POST['lundiOpenMorning'], 'close' => $_POST['lundiCloseMorning']),
                      'evening' => array('open' => $_POST['lundiOpenEvening'], 'close' => $_POST['lundiCloseEvening']),
                      'status' => $_POST['lundiStatus']),

    'Mardi' => array('morning' => array('open' => $_POST['mardiOpenMorning'], 'close' => $_POST['mardiCloseMorning']),
                        'evening' => array('open' => $_POST['mardiOpenEvening'], 'close' => $_POST['mardiCloseEvening']),
                        'status' => $_POST['mardiStatus']),

    'Mercredi' => array('morning' => array('open' => $_POST['mercrediOpenMorning'], 'close' => $_POST['mercrediCloseMorning']),
                          'evening' => array('open' =>  $_POST['mercrediOpenEvening'], 'close' => $_POST['mercrediCloseEvening']),
                          'status' => $_POST['mercrediStatus']),

    'Jeudi' => array('morning' => array('open' => $_POST['jeudiOpenMorning'], 'close' => $_POST['jeudiCloseMorning']),
                        'evening' => array('open' => $_POST['jeudiOpenEvening'], 'close' => $_POST['jeudiCloseEvening']),
                        'status' => $_POST['jeudiStatus']),

    'Vendredi' => array('morning' => array('open' => $_POST['vendrediOpenMorning'], 'close' => $_POST['vendrediCloseMorning']),
                      'evening' => array('open' => $_POST['vendrediOpenEvening'], 'close' => $_POST['vendrediCloseEvening']),
                      'status' => $_POST['vendrediStatus']),

    'Samedi' => array('morning' => array('open' => $_POST['samediOpenMorning'], 'close' => $_POST['samediCloseMorning']),
                        'evening' => array('open' => $_POST['samediOpenEvening'], 'close' => $_POST['samediCloseEvening']),
                        'status' => $_POST['samediStatus']),

    'Dimanche' => array('morning' => array('open' => $_POST['dimancheOpenMorning'], 'close' => $_POST['dimancheCloseMorning']),
                      'evening' => array('open' => $_POST['dimancheOpenEvening'], 'close' => $_POST['dimancheCloseEvening']),
                      'status' => $_POST['dimancheStatus']),

);

// Condition pour éviter d'écraser les données non modifié

    foreach ($days as $day => $hours) {

        // Check if morning & evening hours have been filled in
        $openMorning = (!empty($hours['morning']['open'])) ? $hours['morning']['open'] : false;
        $closeMorning = (!empty($hours['morning']['close'])) ? $hours['morning']['close'] : false;
        $openEvening = (!empty($hours['evening']['open'])) ? $hours['evening']['open'] : false;
        $closeEvening = (!empty($hours['evening']['close'])) ? $hours['evening']['close'] : false;
        $status = (isset($hours['status']) && ($hours['status'] == 0 || $hours['status'] == 1)) ? $hours['status'] : 1;

        $query = "SELECT * FROM restauranthours WHERE day='$day'";
        $result = mysqli_query($conn, $query);
        $row_count = mysqli_num_rows($result);

        // Check if status has been filled in & if it's valide (0/1)
        if ($status == 0) {
            if ($row_count > 0) {
                $query = "UPDATE restauranthours SET status='$status' WHERE day='$day'";
                $result = mysqli_query($conn, $query);
            }
            continue;
        }
        if ($openMorning === false && $closeMorning === false && $openEvening === false && $closeEvening === false) {
            continue;
        }
        if ($row_count == 0) {
            // INSERT
            $query = "INSERT INTO restauranthours (day, open_morning, close_morning, open_evening, close_evening, status) VALUES ('$day', '$openMorning', '$closeMorning', '$openEvening', '$closeEvening', '$status')";
        } else {
            // UPDATE
            $query = "UPDATE restauranthours SET open_morning='$openMorning', close_morning='$closeMorning', open_evening='$openEvening', close_evening='$closeEvening', status='$status' WHERE day='$day'";
        }
        $result = mysqli_query($conn, $query);
    }



header("Location: http://localhost/STUDI/ECF/SiteWeb/front/src/pages/index.php");
mysqli_close($conn);