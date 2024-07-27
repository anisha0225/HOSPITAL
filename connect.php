<?php


$conn = mysqli_connect("localhost:3307","root","anisha@2502","healthcare");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
?>