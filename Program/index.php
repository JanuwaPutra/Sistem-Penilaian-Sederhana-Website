<?php
session_start();
include "header.php";
include "nav.php";

$page = isset($_GET['page'])? $_GET['page']: "home";
switch ($page) {
    case 'tblmhs' : include "tblmhs.php"; break;
    case 'tblmatkul' : include "tblmatkul.php"; break;
    case 'tblnilai' : include "tblnilai.php"; break;
    case 'mhs_add' : include "mhs_add.php"; break;
    case 'mhs_edit' : include "mhs_edit.php"; break;
    case 'mhs_del' : include "mhs_del.php"; break;
    case 'matkul_add' : include "matkul_add.php"; break;
    case 'matkul_edit' : include "matkul_edit.php"; break;
    case 'matkul_del' : include "matkul_del.php"; break;
    case 'nilai_del' : include "nilai_del.php"; break;
    case 'nilai_entry' : include "nilai_entry.php"; break;
    case 'nilai_edit' : include "nilai_edit.php"; break;
    case 'aboutus' : include "aboutus.php"; break;
    case 'home':
    default : include "home.php";
}

include "footer.php";
?>