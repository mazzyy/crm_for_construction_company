<!DOCTYPE html>
<html>
<head>
    <title>Login Detail</title>
    <style>
        .table_style{
            width: 50%;
            border-spacing: 0px;
            border: 1px solid black;
        }
        .table_style tr{
            border: 1px solid black;
        }
        .table_style th{
            border: 1px solid black;
        }
        .table_style td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-lg-12" style="border-radius: 10px; background-color: #f5f5f5; padding: 15px;">
        <h2>Dear <b><?php echo $detail->name ?></b> here is your login credentials</h2>
        <hr>
        <table class="table_style">
            <tr>
                <th bgcolor="#4f81bd" colspan="2">Login Credentials.</th>
            </tr>
            <tr>
                <th bgcolor="#90afd5">Email</th>
                <th bgcolor="#dbe5f1"><?= $detail->email; ?></th>
            </tr>
            <tr>
                <th bgcolor="#90afd5">Password</th>
                <th bgcolor="#dbe5f1"><?= $pass; ?></th>
            </tr>
        </table>
        <p style="color: #000">
            Your account has been created. <a href="<?php echo base_url()?>">Click here</a> to Login
        </p>
        <br />
        <b>Thanks & Regard's,</b> <br />
        <b><?= $company_info['name']; ?></b><br /><br />
    </div>
</div>
</body>
</html>
