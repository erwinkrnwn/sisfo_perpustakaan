	<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark justify-content-between">
  		<ul class="navbar-nav">
	  		<li class="nav-item">
		  		<a class="btn btn-outline-secondary" data-toggle="collapse" role="button" href="#sidebar"><span class="navbar-toggler-icon"></span></a>
	  		</li>
	  		<li class="nav-item">
				<a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>/assets/img/logo1.png" width="50" height="30"><small>OpenLib</small></a>
	  		</li>
  		</ul>
		<form class="form-inline" method="post">
			<div class="input-group">
		    	<input class="form-control input-group-prepend" type="search" placeholder="Search" name="search">
		   		<button class="btn btn-outline-success input-group-append" type="submit">Search</button>
		   	</div>
  		</form>
		<ul class="navbar-nav">
	  		<li class="nav-item">
		  		<a class="nav-link" data-toggle="modal" role="button" href="#modal_insert">Insert</a>
	  		</li>
	  		<li class="nav-item">
	  			<a class="nav-link" data-toggle="collapse" role="button" href="#button_delete">Delete</a>
	  		</li>
	  		<li class="nav-item">
	  			<a class="nav-link" data-toggle="collapse" role="button" href="#button_update">Update</a>
	  		</li>
  		</ul>
  		<ul class="navbar-nav">
  			<li class="nav-item">
  				<a class="nav-link disabled">Hello, <?= $this->session->userdata('username'); ?></a>
  			</li>
	  		<li class="nav-item">
		  		<a class="nav-link" href="<?= base_url(); ?>Login/logout">Logout</a>
	  		</li>
  		</ul>
	</nav>
