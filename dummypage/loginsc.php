<?php
    //include ('../backend/connect.php');
    
    

    $name = $_POST['fname'] . ' ' . $_POST['lname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $message = "$name, <br /><br />
                
                Thank you for your interest in Logan's Haircut Shop. <br /><br />
                
                This email is to verify that you are indeed human, and that you do in fact want to schedule an appointment with us. To verify that you are one of mankind, please click on the link below. <br /><br />
                
                <a href='scheduling_app.timpogue.c9.io/dummypage/schedule.php?fname=$fname&lname=$lname&email=$email&phone=$phone&c=95173&human=yes'>scheduling_app.timpogue.c9.io/dummypage/schedule.php </a> <br /><br />
                
                And again, thanks for doing business with us. <br />
                -The Team at Logan's Haircut Shop";
                
    $subject = "Logan's Haircut Place Verification";
                
    $headers = "From:appt@loganshaircutplace.com" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    
    /*$insertQuest = "INSERT INTO users COLUMNS('name', 'email', 'phone') VALUES ('".$name."', '".$email."', '".$phone."')";
    
    if(mysql_query($insertQuery))
    { ?>
        <script type="text/javascript">
            console.log('Account added.');
        </script>
    <?php }
    else {
        die mysql_error();
    }*/
    

    require_once('header.php');
     ?>
        
        <html>
        <head>
        <style>
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
            }
            body {
                background-color: #f5f5f5;
            }
        </style>
        </head>
        
        <body>
        <?php include('nav_bar.php'); ?>
        <div class="form-signin">
            <?php if(mail($email, $subject, $message, $headers))
            { ?>
                <div class="alert alert-success">
                    Your email verification code was successfully sent! <br /><br />
                    If it is not in your inbox, check your spam folder. <br />
                    It may have been sorted into there!
                </div>
            <?php 
            } 
            elseif(!mail($email, $subject, $message, $headers))
            { ?>
                <div class="alert alert-warning">
                    There was an error when sending your email.
                </div>
            <?php }
            ?>
        </div>
        </body>
        
        </html>
    
    
    <?php 
                
?>
