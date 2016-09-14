<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <style>
        .container {
            border-top: 7px solid #337ab7;
            padding-top: 30px;
        }

        .table th:first-child {
            width: 70px;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo base_url('admin/customers');?>">Customers</a></li>
                <li><a href="<?php echo base_url('admin/countries');?>">Countries</a></li>
                <li><a href="<?php echo base_url('admin/log_off');?>">Log off</a></li>
            </ul>
        </div>

        <div class="col-sm-10">
            <ol class="breadcrumb">
                <?php foreach($breadcrumbs as $key=>$breadcrumb) :?>
                    <?php if (!empty($breadcrumb)) :?>
                        <li><a href="<?php echo $breadcrumb;?>"><?php echo $key;?></a></li>
                    <?php else :?>
                        <li class="active"><?php echo $key;?></li>
                    <?php endif;?>
                <?php endforeach;?>
            </ol>

            <!--successfully message -->
            <?php if (!empty($this->session->flashdata('message'))) { ?>
                <div class="alert alert-success" role="alert">
                    <a href="#" class="alert-link">
                        <?php
                        echo $this->session->flashdata('message');
                        ?>
                    </a>
                </div>
                <?php
            }
            ?>

            <!--error message -->
            <?php if (!empty($this->session->flashdata('error'))) { ?>
                <div class="alert alert-danger" role="alert">
                    <a href="#" class="alert-link">
                        <?php
                        echo $this->session->flashdata('error');
                        ?>
                    </a>
                </div>
                <?php
            }
            ?>



