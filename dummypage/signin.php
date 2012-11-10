

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
    <script type="text/javascript">
        $(document).ready(function() {
            
            var height = window.InnerHeight;
            var width = window.InnerWidth;
            
            $('.form-signin').css({'width', (window.InnerWidth*0.4)});
        
            
        });
    
        
        
    </script>


    <?php include('nav_bar.php'); ?>
    <div class="container">
    <div class="form-signin " id="formS">
        <form action="loginsc.php" method="post">
            <h1> Sign-Up to add an Event </h1> <br />
             <input type="text" placeholder="First Name" name="fname" class="span3"/> <input type="text" placeholder="Last Name" name="lname" class="span3" /><br />
             <input type="text" placeholder="Email" name="email" class="span3"/> <input type="text" placeholder="+1-111-111-1111" name="phone" class="span3" /><br />
            <input type="submit" value="Sign-Up" class="btn btn-large btn-primary"/>
            <br />
            <br />
            <div>
                
                <!-- Modal -->
                <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Why do we need this?</h3>
                    </div>
                    <div class="modal-body">
                        <p>We need this to make sure you are a human and to have more info for your scheduled appointment.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            <!--end of modal-->
    		<!--why do we need this-->
             <sub> <a show="false" data-toggle="modal" href="#myModal2" >Why do we need this?</a></sub>
                
                
        </form>
            <br /><br />
            <form action="login.php">
                <button class="btn btn-info" id="already" href="login.php">I have already done this.</button>
            </form>
            <br />
            <br />
    </div>
    </div>
    
    
    <?php require('bootstrap.php'); ?>
</body>

</html>