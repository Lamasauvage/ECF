<!-- Header + Navbar -->
<?php include_once '../templates/header.php'; ?>
<style>
<?php include "../../../css/style.css"; ?>
</style>

<form action="reserve.php" method="post">
    <label for="date">Date de réservation :</label>
    <input type="date" id="date" name="date"><br><br>
    <label for="time">Heure de réservation :</label>
    <input type="time" id="time" name="time"><br><br>
    <label for="covers">Nombre de couverts :</label>
    <select id="covers" name="covers">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br><br>
    <input type="submit" value="Réserver">
</form>

