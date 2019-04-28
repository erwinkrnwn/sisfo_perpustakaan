  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark justify-content-between">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-outline-secondary" data-toggle="collapse" role="button" href="#sidebar"><span class="navbar-toggler-icon"></span></a>
        </li>
        <li class="nav-item">
        <a class="navbar-brand" href="#"><img src="<?= base_url(); ?>/assets/img/logo1.png" width="50" height="30"><small>Brand name here!</small></a>
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
          <a class="nav-link disabled">Hello, <?= $this->session->userdata('username'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>Login/logout">Logout</a>
        </li>
      </ul>
  </nav>
  <div class="container-fluid" style="padding-top: 9.5vh;">
  	<div class="row">
  		<div id="sidebar" class="col-md-2 px-0 bg-light" style="height: 90.5vh;">
  			<div class="list-group">
  				<a href="<?= base_url(); ?>Employee" class="list-group-item list-group-item-secondary">Book Manage</a>
          <a href="#" class="list-group-item list-group-item-secondary">Return Book</a>
  			</div>
  		</div>
  		<div class="col-md" style="padding: 0">
  			<div class="table-responsive" style="height: 90.5vh;">
  				<table class="table">
  					<thead>
  						<th>Member ID</th>
  						<th>Book ID</th>
  						<th>Date Borrowed</th>
  						<th>Date Returned</th>
              <th>Charge</th>
  						<th></th>
  					</thead>
  					<tbody>
  						<?php foreach($borrow as $brw){ ?><tr>
  							<td><?php echo $brw['member_id']; ?></td>
  							<td><?php echo $brw['book_id']; ?></td>
  							<td><?php echo $brw['date_borrowed']; ?></td>
  							<td><?php echo $brw['date_returned']; ?></td>
                <td><?php echo $brw['charge'];#echo date_create_from_format('Y-m-d', $brw['date_borrowed'])->diff(date_create_from_format('Y-m-d', date('Y-m-d')))->days*1000; ?></td>
  							<td><?php if($brw['date_returned']==NULL){ ?><a href="<?= base_url(); ?>Employee/return_book/<?= $brw['id'] ?>" class="badge badge-success float-center" id='button_return' name="button_return">Return</a><?php } ?></td>
  							</tr><?php } ?>
  						</tbody>
  					</table>
  				</div>
  			</div>
  		</div>
  	</div>
