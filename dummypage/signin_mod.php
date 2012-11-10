<html>

<head>
    <?php require_once('header.php'); ?>
    <style>
        body {
            background-color: #f5f5f5;
        }
        .form-signin {
            background-color: white;
            width: 40%;
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
        }
        input[type="text"] {
            height: 30px;
        }
        /* style="height:30px; width: 195px;" */
    </style>
</head>

<body>
    <?php include('nav_bar.php'); ?>
    <div class="form-signin">
        <form action="loginsc.php" method="post">
            <h1> Sign-In to add an Event </h1> <br />
            <input type="text" placeholder="First Name" name="fname" class="span3"/> <input type="text" placeholder="Last Name" name="lname" class="span3" /><br />
            <input type="text" placeholder="Email" name="email" class="span3"/> <input type="text" placeholder="+1-111-111-1111" name="phone" class="span3" /><br />
            <input type="submit" value="Sign-In" class="btn btn-large btn-primary"/>
        </form>
    </div>
    
    
    <?php require('bootstrap.php'); ?>
</body>

</html>