
<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        body {
            text-align: center;
            
        }
        
        .tier {
            padding: 8px;
            border: 1px solid black;
            border-radius: 6px;
            height: 200px;
            box-shadow: 10px 10px #c6c6c6;
            
        }
        .holder {
            text-align: left;
            margin-left: auto;
            margin-right: auto;
        }
        .holder h2 {
            text-align: center;
        }
        body h1, h2, h3, h4, h5, h6 {
            color: #0088cc;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap/css/bootstrap.css" />
     
    <?php include('bootstrap.php'); ?>
</head>

<body>
<div class="container">
    <div class="header"><br /><br /><br />
    </div>
    <br />
    
    <?php require_once("nav_bar.php"); ?>
    
    <div class="span8">
        <div class="hero-unit">
            <h1 style="color: black;"> Logan's Haircutting Place </h1>
            <br />
            <div class="span3">
                To schedule an appointment, click on the button to the right:
            </div>
            
            <div class="span3">
                <a href="signin.php"><button class="btn btn-large btn-primary">Schedule An Appointment</button></a>
            </div>
        </div>
    </div>
    <div class="span12">
        <br />
        <h1> How It Works </h1>
        <br />
    </div>
    <div class="holder span11">
        <div class="tier span3">
            <h2 style="color: #0088cc;"> Sign In </h2> <br />
            We need to verify that you are indeed human, and that you are not some bot trying to spam our system!<br />
            We ask for your contact information so that we many send you a reminder about your appointment, and to contact you if anything were to come up.
        </div>
        <div class="tier span3">
            <h2 style="color: #0088cc;"> Verify Your Event </h2> <br />
            We will send you a verification email with a URL in it that leads to the calendar so that you may schedule your event.
        </div>
        <div class="tier span3">
            <h2 style="color: #0088cc;"> Create Your Event! </h2><br />
            That's it! Create your event and drag it on to our calednar! We will recieve the event and call you to remind it when it is coming up.
        </div>
    </div>
</div>

</body>

</html>