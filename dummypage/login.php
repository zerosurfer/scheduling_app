<?php
    //include('../backend/connect.php');
    
    $fname = strtolower($_POST['fname']);
    $lname = strtolower($_POST['lname']);
    $name = $_POST['name'];
    $email = strtolower($_POST['email']);
        
        
    if($name == 'tim' || $name == 'ben' || $name == 'logan')
    {
        if($name == 'tim')
        {
            header('Location: http://scheduling_app.timpogue.c9.io/dummypage/schedule.php?fname=Tim&lname=Pogue&email=pogue.c.timothy@gmail.com&phone=$phone&c=95173&human=yes');
        }
        if($name == 'logan')
        {
            header('Location:  http://scheduling_app.timpogue.c9.io/dummypage/schedule.php?fname=Logan&lname=Farr&email=logantf17@gmail.com&phone=$phone&c=95173&human=yes');
        }
        if($name == 'ben')
        {
            header('Location: http://scheduling_app.timpogue.c9.io/dummypage/schedule.php?fname=Ben&lname=Engel&email=benengel94@gmail.com&phone=$phone&c=95173&human=yes');
        }
    }
    /*$selectQuery = "SELECT * FROM users WHERE name=".$name." AND email=" . $email;
    if($sq = mysql_query($selectQuery))
    {
        while($sa = mysql_fetch_array($sq))
        {
            if($sa['name'] == $name && $sa['email'] == $email)
            {
                header('Location: http://scheduling_app.timpogue.c9.io/dummypage/schedule.php?fname='.$fname.'&lname='.$lname.'&email='.$email.'&phone='.$sa['phone'].'&c=95173&human=yes');
            }
            else {
                die(mysql_error());
            }
        }
    }
    else {
        die(mysql_error());
    }*/

?>


<html>

<head>
    <?php require_once('header.php'); ?>
    
    <style>
        body {
            background-color: #f5f5f5;
        }
        .form-signin {
            background-color: white;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #d6d6d6;
            border-radius: 5px;
            padding-top: 40px;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 40px;
            box-shadow: 5px 10px #c6c6c6;
            text-align: center;
            position: relative;
        }
        input[type="text"] {
            height: 30px;
        }
        /* style="height:30px; width: 195px;" */
    </style>

</head>
<body>

    <?php include('nav_bar.php'); ?>
    <div class="container">
    <div class="form-signin span5">
        <h2 style="color:#0088cc"> Log-In </h2>
        <form action="login.php" method="post">
            <input type="text" name="name" class="span3" placeholder="Name" /> <br />
            <input type="text" name="email" class="span3" placeholder="Email"/> <br />
            <input type="submit" name="submit" class="btn btn-large btn-info" value="Log-In" />
        </form>
    </div>
    </div>

</body>
</html>