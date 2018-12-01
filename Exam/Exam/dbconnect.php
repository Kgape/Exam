<?php

$conn = mysqli_connect("localhost","root","","me");

if (!$conn)
{
    die("Database Connection Failed".mysqli_error($conn));
}

$select_db = mysqli_select_db($conn, 'me');

if (!$select_db)
{
    die("Database Selection Failed".mysqli_error($conn));
}
