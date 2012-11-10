<?php
    
    require('/twilio/Services/Twilio.php');
    
    /* if(isset($_POST['submit']))
    {
        $phone = $_POST['phone'];
        
        require('/twilio/Services/Twilio.php');
    
        $SID = 'AC7f5a74e1131ccbd314d44f114a6b9c99';
        $token = '680fa6485e83b8e1866f13f56aa656cf';
    
        $client = new Services_Twilio($SID, $token);
        $message = $client->account->sms_messages->create(
        '14352151327', 
        '$phone',
        "This is a test");
    
        print $message->sid;
    } */
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
            width: 30%;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #d6d6d6;
            border-radius: 5px;
            padding-top: 40px;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 40px;
            box-shadow: 5px 10px #c6c6c6;
            vertical-align: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include('nav_bar.php'); ?>
    <div class="form-signin">
        <form action="https://api.twilio.com/2010-04-01/Accounts/AC7f5a74e1131ccbd314d44f114a6b9c99/SMS/Messages" method="post">
            <h1> Please enter your phone number </h1> <br />
            <input type="text" placeholder="+1-111-111-1111" name="to" style="height:37px; width: 195px;">
            <input type="hidden" name="from" value="+14352151327" />
            <input type="hidden" name="message" value="Your verification code is 95173" />
            <input type="submit" value="Text me!" class="btn btn-large btn-primary"/>
        </form>
    </div>
    <?php require('bootstrap.php'); ?>
</body>

</html>