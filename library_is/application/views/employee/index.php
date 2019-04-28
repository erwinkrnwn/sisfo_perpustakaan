  <div class="container-fluid CFadminpage">
  	<div class="row">
  		<div id="sidebar" class="col-md-2 px-0 bg-light" style="height: 90.5vh;">
  			<div class="list-group">
  				<a href="#" class="list-group-item list-group-item-secondary">Book Manage</a>
          <a href="<?= base_url(); ?>Employee/return_book_manage" class="list-group-item list-group-item-secondary">Return Book</a>
  			</div>
  		</div>
  		<div class="col-md" style="padding: 0">
  			<div class="table-responsive" style="height: 90.5vh;">
  				<table class="table">
  					<thead>
  						<th>ISBN</th>
  						<th>Name</th>
  						<th>Author</th>
  						<th>Edition</th>
  						<th>Stock</th>
  						<th></th>
  						<th></th>
  					</thead>
  					<tbody>
  						<?php foreach($book as $bk){ ?><tr>
  							<td><?php echo $bk['ISBN']; ?></td>
  							<td><?php echo $bk['name']; ?></td>
  							<td><?php echo $bk['author']; ?></td>
  							<td><?php echo $bk['edition']; ?></td>
  							<td><?php echo $bk['stock']; ?></td>
  							<td><a href="<?= base_url(); ?>Employee/delete/<?= $bk['id'] ?>" class="badge badge-danger float-center collapse" id='button_delete' name="button_delete">Delete</a></td>
  							<td><a data-id="<?= $bk['id'] ?>" data-isbn="<?= $bk['ISBN'] ?>" data-name="<?= $bk['name'] ?>" data-author="<?= $bk['author'] ?>" data-edition="<?= $bk['edition'] ?>" data-stock="<?= $bk['stock'] ?>" href="#modal_update" class="badge badge-warning float-center collapse" id='button_update' name="button_update" data-toggle="modal">Update</a></td>
  							</tr><?php } ?>
  						</tbody>
  					</table>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog">
  		<div class="modal-dialog" role="document">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h5 class="modal-title">Insert Book</h5>
  					<button class="close" type="button" data-dismiss="modal">&times;</button>
  				</div>
  				<div class="modal-body">
  					<?= form_open('Employee/insert'); ?>
            <?= $this->session->flashdata('pesan'); ?>
  					<form method="post">
  						<div class="row">
  							<div class="col-md-2">
  								<div class="form-group">
  									<label for="id">ID</label>
  									<input type="text" class="form-control" id="id" name="id" placeholder="ID" readonly>
  								</div>
  							</div>
  							<div class="col">
  								<div class="form-group">
  									<label for="isbn">ISBN</label>
  									<input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN">
  								</div>
  							</div>
  						</div>
  						<div class="form-group">
  							<label for="name">Name</label>
  							<input type="text" class="form-control" id="name" name="name" placeholder="Name">
  						</div>
  						<div class="form-group">
  							<label for="author">Author</label>
  							<input type="text" class="form-control" id="author" name="author" placeholder="Author">
  						</div>
  						<div class="form-group">
  							<label for="edition">Edition</label>
  							<input type="text" class="form-control" id="edition" name="edition" placeholder="Edition">
  						</div>
  						<div class="form-group">
  							<label for="stock">Stock</label>
  							<input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
  						</div>
  						<button type="submit" name="insert" class="btn btn-success">Insert</button>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="modal fade" id="modal_update" tabindex="-1" role="dialog">
  		<div class="modal-dialog" role="document">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h5 class="modal-title">Update Book</h5>
  					<button class="close" type="button" data-dismiss="modal">&times;</button>
  				</div>
  				<div class="modal-body">
  					<?= form_open('Employee/update'); ?>
  					<form method="post">
  						<div class="row">
  							<div class="col-md-2">
  								<div class="form-group">
  									<label for="id">ID</label>
  									<input type="text" class="form-control" id="id" name="id" placeholder="ID" readonly>
  								</div>
  							</div>
  							<div class="col">
  								<div class="form-group">
  									<label for="ISBN">ISBN</label>
  									<input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN">
  								</div>
  							</div>
  						</div>
  						<div class="form-group">
  							<label for="name">Name</label>
  							<input type="text" class="form-control" id="name" name="name" placeholder="Name">
  						</div>
  						<div class="form-group">
  							<label for="author">Author</label>
  							<input type="text" class="form-control" id="author" name="author" placeholder="Author">
  						</div>
  						<div class="form-group">
  							<label for="edition">Edition</label>
  							<input type="text" class="form-control" id="edition" name="edition" placeholder="Edition">
  						</div>
  						<div class="form-group">
  							<label for="stock">Stock</label>
  							<input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
  						</div>
  						<button type="submit" name="insert" class="btn btn-warning">Update</button>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
