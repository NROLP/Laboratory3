<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register Page</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('css/login_style.css') ?>">
</head>

<div>
    <h4 class="modal-title">Register</h4>
</div>

<div class="modal-body">
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('register') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Register</button>
        </div>
    </form>
</div>
