<?php
$con=mysqli_connect("localhost","root","","craftmarket");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
