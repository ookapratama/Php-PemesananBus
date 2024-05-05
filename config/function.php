<?php

include 'C:/laragon/www/Php-PemesananBus/db/koneksi.php';

function select($table) 
{
   global $conn;

   $query = "SELECT * FROM $table";
   $result = mysqli_query($conn, $query);
   return $result;
}

function insert($table, $values)
{
   global $conn;
   $query = "INSERT INTO $table VALUES $values";
   $result = mysqli_query($conn, $query);
   // $result
   return mysqli_affected_rows($conn);

}

function update($table, $values) 
{
   global $conn;
   $query = "UPDATE $table SET $values";
   // echo $values;
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}

function delete($table, $id) 
{
   global $conn;
   // var_dump($id);
   $query = "DELETE FROM $table WHERE id_$table = $id";
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}
