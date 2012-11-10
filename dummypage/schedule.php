<?php
    /* PLEASE UNCOMMENT THIS WHEN THE PROJECT IS NEAR THE END SO THAT VERIFICATION WORKS. THANKS. */
    
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $email = $_GET['email'];
    $verify =$_GET['c'];
    $human = $_GET['human'];
    $phone = $_GET['phone'];
    
    
    if(isset($fname) && isset($lname) && isset($email) && isset($verify) && isset($human) && isset($phone))
    {
        if($verify != 95173)
        {
            header('Location: signin.php');
        }
        if($human != 'yes')
        {
            header('Location: signin.php');
        }
        
        
    }
    else
    {
        header('Location: signin.php');
    }
    
?>

<!DOCTYPE html>
<html>
  <head>
  <!-- makes the calendar really happen -->
    <title>Schedule</title>
    <?php require_once("bootstrap.php"); ?>
    <script type="text/javascript" src="http://scheduleapp.comlu.com/api/files/fullcalendar.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <link rel="Stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="Stylesheet" href="http://scheduleapp.comlu.com/api/files/fullcalendar.css" type="text/css">
    <link rel="Stylesheet" href="http://scheduleapp.comlu.com/api/files/event.css" type="text/css">
    <script type="text/javascript">
        var name = "<?php echo $fname . ' ' . $lname; ?>";
        var email = "<?php echo $email; ?>";
        var phone = "<?php echo $phone; ?>";
    </script>
    <script type="text/javascript" src="main.js"></script>
    <?php require_once("header.php"); ?>
  </head>
  <body>
  
  <!-- Modal -->
  <!-- makes a pop out it mkae sure you have made the even -->
<div id="successModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">You're done!</h3>
  </div>
  <div class="modal-body" >
    <div class="alert alert-success">
    <p>We have your information and will contact you to remind you of your apointment.</br>   
     </p>
     </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
	</div>
  
  <!-- give us the nav bar  -->
    <?php require_once("nav_bar.php"); ?>
    <div style="width: 75%; float: right; margin-right: 10px;" id="calendar"></div>
    <div class="span2">
     <!-- makes the box on the left before you drag the event -->
     <div style="float: left; width: 150px; padding: 0 10px; border: 2px solid #CCC; background: #EEE; text-align: left;">
<h4>Draggable Events</h4>

     
 <div class="event" data-type="HairCut">Hair cut</div>
 <div class="event" data-type="HairDye">Hair dye</div>
    </div>
    </div>
  </body>
</html>