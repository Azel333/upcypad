<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets_mdb/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets_mdb/img/favicon.png'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>
    Upcypad
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url('assets_mdb/css/material-dashboard.css?v=2.1.1'); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('assets_mdb/demo/demo.css'); ?>" rel="stylesheet" />
  <!-- fontawesome-->
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome/'); ?>css/font-awesome.css">
</head>
<body class="">
<div class="wrapper ">

    <div class="sidebar" data-color="purple" data-background-color="purple" data-image="<?= base_url('assets_mdb/img/sidebar-1.jpg'); ?>">
          <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
        -->
          <div class="logo btn btn-primary">
            <a class="simple-text logo-normal">
              <i class="fa fa-tachometer-alt"></i> Upcypad
            </a>
          </div>


          <div class="sidebar-wrapper">
            <ul class="nav">
              <!-- QUERY DARI MENUU -->
                      <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = " SELECT `user_menu`.`id`, `menu`, `icon_menu`
                          FROM `user_menu`
                          JOIN `user_access_menu`
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                          WHERE `user_access_menu`.`role_id` = $role_id
                          ORDER BY `user_access_menu`.`menu_id` ASC
                        ";

                        $menu = $this->db->query($queryMenu)->result_array();
                      ?>

              <?php foreach ($menu as $m): ?>
              <li class="active">
                <a class="d-block">
                  <i class="<?= $m['icon_menu']; ?>"></i>
                  <p><?= $m['menu']; ?></p>
                </a>
                <ul class="nav">
                              <?php
                                $menuId = $m['id'];
                                $querySubMenu = " SELECT *
                                  FROM `user_sub_menu`
                                  JOIN `user_menu`
                                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                  WHERE `user_sub_menu`.`menu_id` = $menuId
                                  AND `user_sub_menu`.`is_active` = 1
                                ";
                                $subMenu = $this->db->query($querySubMenu)->result_array();
                              ?>
                  <?php foreach ($subMenu as $sm): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                      <i class="<?= $sm['icon']; ?>"></i>
                      <p><?= $sm['title']; ?></p>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
    </div>
<div class="main-panel">
    