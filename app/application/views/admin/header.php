<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('sp-plugin/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('sp-plugin/font-awesome/css/font-awesome.min.css') ;?> ">
  <link rel="stylesheet" type="text/css" href="<?= base_url('sp-plugin/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  <script type="text/javascript" src='<?= base_url('sp-plugin/jquery/jquery.min.js'); ?>'></script>
  <script type="text/javascript" src='<?= base_url('sp-plugin/ckeditor/ckeditor.js'); ?>'></script>
  <script type="text/javascript" src='<?= base_url('sp-plugin/datatables.net/js/jquery.dataTables.min.js'); ?>'></script>
  <script type="text/javascript" src='<?= base_url('sp-plugin/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>'></script>
</head>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggl e navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">E-Voting</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?= base_url('admin/home'); ?>">Hasil</a></li>
        <li><a href="<?= base_url('admin/calon'); ?>">Kelola Calon</a></li>
        <li><a href="<?= base_url('admin/siswa'); ?>">Kelola Siswa</a></li>
        <li><a href="<?= base_url('admin/pwd'); ?>">Ubah Password</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="<?= base_url('welcome/logout'); ?>">Logout</a></li>
      </ul>
    </div>
</nav>
<section class="main">
	<div class="container">