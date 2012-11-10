
<!DOCTYPE html>
<html>
  <head>
    <title>FitMeIn - Instant Scheduling Plugin</title>
    <!-- Bootstrap -->
    <link href="../bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
  </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar" >
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="#">FitMeIn</a>
          <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="/download.php">Download</a></li>
              <li><a href="/dummypage">Demo</a></li>
            </ul>
          <div class="nav-collapse collapse">
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <div class="span3">
    <div class="container-fluid ">
      <div class="row-fluid">
            <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">About</li>
              <li class="active"><a href="#about">About</a></li>
              <li class="nav-header">Set Up</li>
              <li><a href="#database">Database Creation</a></li>
              <li><a href="#pagecreation">Schedule page creation</a></li>
              <li class="nav-header">Modification</li>
              <li><a href="#customerlogging">Customer Logging</a></li>
            </ul>
          </div><!--/.well -->
        </div>
    </div>
    </div>
        
        <div class="span8">
         <div id="about">
            <h1>About</h1>
            <p>FillMeIn is an opensource schedule system written in HTML, CSS, Javscript, and PHP. It is meant for small or large businesses to integrate easily into their websites in order for customers to schedule appointments easily and effectively.</p>
         </div>
         <br/><br/>
         <div id="setup">
            <h1>Set Up</h1>
            <br/>
            <h2>Database Creation</h2>
            <p>In order to run the scheduling plugin, you must have access to a MySQL database. When you have created one, import the <code>app/sql/events.sql</code> file in your database.</p>
        </div><!--/span-->
        <div id="pagecreation">
            <br/>
            <h2>Schedule Page Creation</h2>
            <p>After you have created the database structure, we must start creating our schedule page where the calendar will be located.</p>
            <p>The page structure looks like:</p>
            <pre>
&lt;!doctype html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;title&gt;My Schedule Page&lt;/title&gt;
        &lt;link rel=&quot;Stylesheet&quot; href=&quot;app/css/fullcalendar.css&quot; type=&quot;text/css&quot;&gt;
        &lt;link rel=&quot;Stylesheet&quot; href=&quot;app/css/event.css&quot; type=&quot;text/css&quot;&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/jquery.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/jquery-ui.min.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/fullcalendar.min.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot;&gt;
            ...
        &lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
        ...
    &lt;/body&gt;
&lt;/html&gt;
            </pre>
            <br/>
            <p>Now add the calendar object to our body where the calendar will be painted. 
            <br/>
            <code>&lt;div id=&quot;calendar&quot;&gt;&lt;/div&gt;</code>
            </p>
            <br/>
            <p>Now we are going to want to paint the calendar onto the div object, and give it some times.</p>
            <pre>
&lt;!doctype html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;title&gt;My Schedule Page&lt;/title&gt;
        &lt;link rel=&quot;Stylesheet&quot; href=&quot;app/css/fullcalendar.css&quot; type=&quot;text/css&quot;&gt;
        &lt;link rel=&quot;Stylesheet&quot; href=&quot;app/css/event.css&quot; type=&quot;text/css&quot;&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/jquery.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/jquery-ui.min.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/fullcalendar.min.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot;&gt;
        
            function updateCalendar(date, appointment_key) {
                date = $.fullCalendar.formatDate(date, "MM/dd/yyyy hh:mm TT");
                //We have to format the date for php's strtotime function
                
                //Now we throw a GET request to add the information to our database
                $.get("app/php/addevent.php", { "name" : name, "date" : date, "event_key" : appointment_key, "email" : email, "phone" : phone }, function(data) {
                    if(data.status == "Success") {
                        //Everything was successful
                        console.log("Success");
                    } else if(data.status = "DateError") {
                        //They tried to make an appointment in the past, silly goose.
                        console.log("DateError");
                    }
                }, "json");
            }
        
            $(document).ready(function() {
               var options = {
                 weekends: false, //Will hide saturday's and sunday's
                 allDaySlot: false, //Removes allday appointment option
                 defaultView: "agendaDay", //Best view for appointment making
                 droppable: true, //Allow appointments to be made
                 minTime: 9, //When your business opens
                 maxTime: 11, //When your business closes
                 events: { //Tell the script where the feed is
                    url: "app/php/feed.php"
                 },
                 drop: function(date, allDay) { //Define function to handle appointment drops
                    var appointment_type = $(this).attr("data-type");//Grab apointment time from drop attribute
                    var eventDrop = [];
                    
                    eventDrop.title = name; //Define the eventDrop array to add to the calendar
                    eventDrop.date = date;
                    eventDrop.allDay = allDay;
                    
                    updateCalendar(date, appointment_type); //We don't include the eventDrop values because they are of no use to this function
                    
                    $("#calendar").fullCalendar("renderEvent", eventDrop, true);
                    //This is where we actually "render" the event on the calendar and make it stick.      
                 }
               }
               
               $(".appointment_drop").draggable({
                    revert: true, //Make the droppable go back to its position
                    revertDuration: 0 //Right now.
               });
               
               $("#calendar").fullCalendar(options); //This is where we bring it all together.
            });
        &lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;div &quot;calendar&quot;&gt;&lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
            </pre>
            <br/>
            <p>Now we have to add some droppable appointment types. These are defined by:<br/> <code>&lt;div class=&quot;appointment_drop&quot; data-type=&quot;description&quot;&gt;Title&lt;/div&gt;</code>
            </p>
            <br/>
            <pre>
&lt;div class=&quot;droppables&quot;&gt;
  &lt;div class=&quot;appointment_drop&quot; data-type=&quot;hairwash&quot;&gt;Hair wash&lt;/div&gt;
  &lt;div class=&quot;appointment_drop&quot; data-type=&quot;haircut&quot;&gt;Hair cut&lt;/div&gt;
&lt;/div&gt;
            </pre>
            <br/>
            <p>The script still doesn't work, but its ok. We only have 2 more steps.</p>
            <p>In the bottom script tag of our head, it references to some variables called: name, email and phone. We haven't really defined those. Here we'll add some PHP script above our HTML to figure out what the customer's information is.
            </p>
            <pre>
&lt;?php

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];

?&gt;
            </pre>
            <p>Then we define our javascript variables right above our updateCalendar function.</p>
            <pre>
var name = &quot;&lt;?php print $name; ?&gt;&quot;;
var email = &quot;&lt;?php print $email; ?&gt;&quot;;
var phone = &quot;&lt;?php print $phone; ?&gt;&quot;;
            </pre>
            <br/>
            <br/>
            <p>Our ending product should look like this:</p>
            <pre>
&lt;?php

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];

?&gt;
&lt;!doctype html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;title&gt;My Schedule Page&lt;/title&gt;
        &lt;link rel=&quot;Stylesheet&quot; href=&quot;app/css/fullcalendar.css&quot; type=&quot;text/css&quot;&gt;
        &lt;link rel=&quot;Stylesheet&quot; href=&quot;app/css/event.css&quot; type=&quot;text/css&quot;&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/jquery.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/jquery-ui.min.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot; src=&quot;app/js/fullcalendar.min.js&quot;&gt;&lt;/script&gt;
        &lt;script type=&quot;text/javascript&quot;&gt;
        
            var name = &quot;&lt;?php print $name; ?&gt;&quott;;
            var email = &quot;&lt;?php print $email; ?&gt;&quot;;
            var phone = &quot;&lt;?php print $phone; ?&gt;&quot;;
        
            function updateCalendar(date, appointment_key) {
                date = $.fullCalendar.formatDate(date, "MM/dd/yyyy hh:mm TT");
                //We have to format the date for php's strtotime function
                
                //Now we throw a GET request to add the information to our database
                $.get("app/php/addevent.php", { "name" : name, "date" : date, "event_key" : appointment_key, "email" : email, "phone" : phone }, function(data) {
                    if(data.status == "Success") {
                        //Everything was successful
                        console.log("Success");
                    } else if(data.status = "DateError") {
                        //They tried to make an appointment in the past, silly goose.
                        console.log("DateError");
                    }
                }, "json");
            }
        
            $(document).ready(function() {
               var options = {
                 weekends: false, //Will hide saturday's and sunday's
                 allDaySlot: false, //Removes allday appointment option
                 defaultView: "agendaDay", //Best view for appointment making
                 droppable: true, //Allow appointments to be made
                 minTime: 9, //When your business opens
                 maxTime: 11, //When your business closes
                 events: { //Tell the script where the feed is
                    url: "app/php/feed.php"
                 },
                 drop: function(date, allDay) { //Define function to handle appointment drops
                    var appointment_type = $(this).attr("data-type");//Grab apointment time from drop attribute
                    var eventDrop = [];
                    
                    eventDrop.title = name; //Define the eventDrop array to add to the calendar
                    eventDrop.date = date;
                    eventDrop.allDay = allDay;
                    
                    updateCalendar(date, appointment_key); //We don't include the eventDrop values because they are of no use to this function
                    
                    $("#calendar").fullCalendar("renderEvent", eventDrop, true);
                    //This is where we actually "render" the event on the calendar and make it stick.      
                 }
               }
               
               $(".appointment_drop").draggable({
                    revert: true, //Make the droppable go back to its position
                    reverDuration: 0 //Right now.
               });
               
               $("#calendar").fullCalendar(options); //This is where we bring it all together.
            });
        &lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;div &quot;calendar&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;droppables&quot;&gt;
            &lt;div class=&quot;appointment_drop&quot; data-type=&quot;hairwash&quot;&gt;Hair wash&lt;/div&gt;
            &lt;div class=&quot;appointment_drop&quot; data-type=&quot;haircut&quot;&gt;Hair cut&lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
            </pre>
            </div><!--/span-->
            <div id="customerlogging">
                <h2>Customer Logging</h2>
                <p>To start off with a customer management system, you first need a sign-up form. For the styling, we used some custom CSS as well as the Bootstrap interface.</p>
                <pre>
&lt;form action="loginsc.php" method="post">
    &lt;input type="text" name="fname" placeholder="First Name"> &lt;input type="text" name="lname" placeholder="Last Name"> &lt;br />
    &lt;input type="text" name="email" placeholder="Email" />&lt;input type="text" name="phone" placeholder="Phone number" /> &lt;br />
    &lt;input type="submit" name="submit" value="Sign-Up!" />
&lt;/form>
                </pre>
                <p>Your successful login page (loginsc.php) would look something like this. </p>
                <pre>
&lt;?php 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
                
    (MySQL Lines)    
?>
                </pre>
                <p> These variables then go into a database. You would use something similar to the following commands to insert them into a MySQL database. </p>
                <pre>
&insertQuery = "INSERT INTO table_name COLUMNS('column_name1', 'column_name2', . . .) VALUES ('value1', 'value2')";
mysql_query($insertQuery); 
                </pre>
                <p> To be more purpose-specific, the following command inserts a record into a database with a name of "Tom" and an email of "Tom@gmail.com" </p>
                <pre>
$insertQuery = "INSERT INTO users COLUMNS ('name','email','phone') VALUES ('Tom', 'Tom@gmail.com', '+123456789')";
mysql_query($insertQuery);
                </pre>
                <p> After we have successfully stored our usernames and passwords into our database, the next thing to do is to write a log=in page.</p>
                <pre>
&lt;form action="checkin.php" method="post">
    &lt;input type="text" name="username" placeholder="Username"/> <br />
    &lt;input type="password" name="password" placeholder="password" /> <br />
    &lt;input type="submit" name="submit" value="Log-In" />
&lt;/form>
                </pre>
                <p> Checkin.php needs to connect to the database and retrieve the records that match the username and password entered. Then it needs to make sure that it matches.</p>
                <pre>
&lt;?php
    $username = $_POST['username'];
    $password= $_POST['password'];
                        
    $userQuery = "SELECT * FROM users WHERE username='.$username.'";
    if($mq = mysql_query($userQuery)) //Have to give it a variable inside the IF statement so it can be called on later.
    {
        while($ma = mysql_fetch_array($mq)) //Have to give it a variable inside the while loop so that it may be called upon later
        {
            if($password == $ma['password']) //Checks to see if the entered password is the same as the one in the database.
            {
                header('Location: YourURL.ext'); //The line to redirect to another page. (Note: you cannot relocate a header AFTER you put ANY HTML tags on the page.)
            }
        }
    }
?>
                </pre>
                <p> After that you should have a working sign-up and log-in system!</p>
            </div>
        </div><!--/row-->

      

      <div class="span9">
        <hr>
        <p>&copy; Team TLB 2012</p>
      </div>

    </div><!--/.fluid-container-->
    
        <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-transition.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-alert.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-modal.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-tab.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-popover.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-button.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap-typeahead.js"></script>
    <script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>