<?php
session_start();
if (!isset($_SESSION["usuario_id"])) {
    header("location: login.php");
    exit();
}
include_once("../db/conexao.php");

