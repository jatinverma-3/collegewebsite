<?php

//DATABASE CONNECTION

$conn = mysqli_connect("localhost","root","","college");

if(!$conn)
{
    die("Error in connection!");
}

?>