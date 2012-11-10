<!--navbar fixed to top -->
    <div class="navbar navbar-fixed-top" style="box-shadow: 0px 5px 10px 5px #c6c6c6;">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">Logan's Haircut Shop</a>
    	  <!--for mobile collapse down-->
          <div class="nav-collapse">
            <ul class="nav">
           
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Contact us</h3>
  </div>
  <div class="modal-body">
    <p>email@email.com</br>
       (123) 123-1234
     </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
            <!--end of modal-->
			<!--real links in the navbar-->
              <li><a href="index.php">Home</a></li>
              <li><a href="signin.php">Schedule</a></li>
              <li><a show="false" data-toggle="modal" href="#myModal" >Contact</a><li>
			  </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <?php require_once("bootstrap.php"); ?>
    