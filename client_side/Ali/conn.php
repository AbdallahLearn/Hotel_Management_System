<?php
$conn = mysqli_connect('127.0.0.1', 'root' , 'root' , 'aaam');

if(!$conn){
    echo 'Error: ' . mysqli_connect_error();
}