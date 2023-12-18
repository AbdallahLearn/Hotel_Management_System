<?php
$conn = mysqli_connect('localhost', 'root' , "" , 'aaam');

if(!$conn){
    echo 'Error: ' . mysqli_connect_error();
}