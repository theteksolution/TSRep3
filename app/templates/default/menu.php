<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CLOB</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		<li><a href="<?php echo DIR ?>home/index">Home</a></li>
		<?php if (\helpers\session::get('CurrentObservationID')) { ?>
		
        <li class="divider-vertical"></li>
		<li><a href="<?php echo DIR ?>observation/backgroundInformation">Background Information</a></li>
        <li><a href="<?php echo DIR ?>observation/observationDetail">Observation Detail</a></li>            
        <li><a href="<?php echo DIR ?>observation/studentDirected">Student Directed</a></li>
        <li><a href="<?php echo DIR ?>observation/teacherDirected">Teacher Directed</a></li>       
        <li><a href="<?php echo DIR ?>observation/scienceContent">Science Content</a></li>        
        <li><a href="<?php echo DIR ?>observation/leadershipPractices">Leadership Practices</a></li>
		<?php } ?>
      </ul>
	  
	  <?php if (\helpers\session::get('CurrentUserID') == null) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" id="menuLogin">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                        <div class="dropdown-menu" style="padding:17px;">
                            <form   action="<?php echo DIR ?>home/index" method="post">
                                <input name="username" id="username" placeholder="Username" type="text"> 
                                <input name="password" id="password" placeholder="Password" type="password"><br>
                                <input type="submit" id="btnLogin" class="btn" value="Login">
                            </form>
                        </div>
                    </li>
                </ul>
				
		<?php } ?>	

		<?php 
		
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		if(strpos($actual_link,"home/index") && \helpers\session::get('CurrentUserID') != null)
		{
		?>
		
			<ul class="nav navbar-nav navbar-right">
                        <li id="newCLOB"><a href="<?php echo DIR ?>observation/backgroundInformation">New</a></li>
                        <li id="rpts"><a href="<?php echo DIR ?>reports/index">Reports</a></li>
                    </ul>
		
	<?php	} ?>
		
		
		
         
           
 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
   