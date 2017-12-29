<!-- Start Nav Bar -->
<nav class="navbar navbar-inverse">
	<div class="container">
		<!-- Nav Header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
		    </button>
			<a class="navbar-brand" href="#">RECRUIT</a>
		</div>
		<!-- Nav taps -->
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Jobs</a></li>
				<li><a href="#">Job Seekers</a></li>
				<li><a href="#">Page4</a></li>
			</ul>
		    <!-- Search bar -->
			<form class="navbar-form navbar-left" action="/search.php">
			    <div class="input-group">
			        <input type="text" class="form-control" placeholder="Search">
		          	<div class="input-group-btn">
				        <button class="btn btn-default" type="submit">
				            <i class="glyphicon glyphicon-search"></i>
			            </button>
				    </div>
				</div>
		    </form>
		    <!-- Signing buttons -->
			<ul class="nav navbar-nav navbar-right">
				<button class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#logIn">LogIn</button>
				<button class="btn btn-success navbar-btn" data-toggle="modal" data-target="#signUp">SignUp</button>
			</ul>
		</div>
	</div>
</nav>
<!-- End Nav Bar -->
<!-- SignUp modal form -->
<div id="signUp" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <!-- ereorrs -->
      <?php
      if (isset($_SESSION['errors'])) {
      ?>

      <div class="alert alert-danger">
      	<?php 
      	foreach ($_SESSION['errors'] as $key => $value) {
      		echo "div>{$errors}</div>";
      	}
      	?>
      </div>

      <?php
      	unset($_SESSION['errors']);
      }
      ?>

      <div class="modal-body">
        <form class="form-horizontal" action="/action_page.php">
          <!-- First Name -->
          <div class="form-group">
            <label class="control-label col-sm-2">First Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Enter first name" name="firstName">
            </div>
          </div>
          <!-- Last Name -->
          <div class="form-group">
            <label class="control-label col-sm-2">Last Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Enter last name" name="lastName">
            </div>
          </div>
          <!-- Email -->
          <div class="form-group">
            <label class="control-label col-sm-2">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
          </div>
          <!-- Password -->
          <div class="form-group">
            <label class="control-label col-sm-2">Password:</label>
            <div class="col-sm-10"> 
              <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
          </div>
          <!-- Password confrmation -->
          <div class="form-group">
            <label class="control-label col-sm-2">Password confirmation:</label>
            <div class="col-sm-10"> 
              <input type="password" class="form-control" placeholder="Re-enter password" name="password_confirmation">
            </div>
          </div>
          <!-- Gender -->
          <div class="form-group">
            <label class="control-label col-sm-2">Gender:</label>
            <div class="col-sm-10">
              <label class="radio-inline"><input type="radio" name="gender">Male</label>
              <label class="radio-inline"><input type="radio" name="gender">Female</label>
            </div>
          </div>
          <!-- location -->
          <div class="form-group">
            <label class="control-label col-sm-2">location:</label>
            <div class="col-sm-10">
              <select class="form-control" name="location">
              	<option disabled="disabled" selected="selected">Select a country</option>
              	<option value="Algeria">Algeria</option>
              	<option value="Bahrain">Bahrain</option>
              	<option value="Egypt">Egypt</option>
              	<option value="Iraq">Iraq</option>
              	<option value="Jordan">Jordan</option>
              	<option value="Kwait">Kwait</option>
              	<option value="Lebenon">Lebenon</option>
              	<option value="Libya">Libya</option>
              	<option value="Moroco">Moroco</option>
              	<option value="Oman">Oman</option>
              	<option value="Palestine">Palestine</option>
              	<option value="Saudi Arabia">Saudi Arabia</option>
              	<option value="Sudan">Sudan</option>
              	<option value="Syria">Syria</option>
              	<option value="Tunisia">Tunisia</option>
              	<option value="Qatar">Qatar</option>
              	<option value="UAE">UAE</option>
              	<option value="Yemen">Yemen</option>
	           </select>
            </div>
          </div>
          <!-- Sign Up button -->
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default form-control">Sign Up</button>
            </div>
          </div>
        </form>
      </div>
      
    </div>

  </div>
</div>

<!-- SignIn modal form -->
<div id="logIn" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Log In</h4>
      </div>
      <div class="modal-body">
      	<!-- Email -->
      	<form class="form-horizontal" action="/action_page.php">
      	  <div class="form-group">
      	    <label class="control-label col-sm-2">Email:</label>
      	    <div class="col-sm-10">
      	      <input type="email" class="form-control" placeholder="Enter email" name="email">
      	    </div>
      	  </div>
      	<!-- Password -->
      	  <div class="form-group">
      	    <label class="control-label col-sm-2">Password:</label>
      	    <div class="col-sm-10"> 
      	      <input type="password" class="form-control" placeholder="Enter password" name="password">
      	    </div>
      	  </div>
      	<!-- Remember me -->
      	  <div class="form-group"> 
      	    <div class="col-sm-offset-2 col-sm-10">
      	      <div class="checkbox">
      	        <label><input type="checkbox" name="check" value="1"> Remember me</label>
      	      </div>
      	    </div>
      	  </div>
      	  <!-- SignIn button -->
      	  <div class="form-group"> 
      	    <div class="col-sm-offset-2 col-sm-10">
      	      <button type="submit" class="btn btn-default form-control">Sign In</button>
      	    </div>
      	  </div>
      	</form>
      </div>
    </div>

  </div>
</div>