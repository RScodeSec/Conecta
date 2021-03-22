<?php
session_start();
if (!isset($_SESSION['empresa'])) {
  header('Location: ../../vistas/index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css" />  
  <link rel="stylesheet" href="../../public/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../public/css/sweetalert2.min.css">
  <link rel="stylesheet" href="../../public/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" href="../../public/plugins/datatables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css">

  <script src="https://kit.fontawesome.com/c702fce202.js" crossorigin="anonymous"></script>
