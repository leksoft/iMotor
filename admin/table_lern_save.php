<?php
ob_start();
include_once('../db/connection.php');
include_once('../db/function.php');
if (sql_save("tb_table_lern", "id")) {
    header("location: index.php?url=table_lern.php");
} else {
    echo sql_error();
}
?>