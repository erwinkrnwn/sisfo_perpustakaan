  <div class="container-fluid" style="padding-top: 9.5vh;">
    <div class="row">
      <div id="sidebar" class="col-md-2 px-0 bg-light" style="height: 90.5vh;">
        <div class="list-group">
          <a href="<?= base_url(); ?>Member" class="list-group-item list-group-item-secondary">Books</a>
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
            </thead>
            <tbody>
              <?php foreach($book as $bk){ ?><tr>
                <td><?php echo $bk['ISBN']; ?></td>
                <td><?php echo $bk['name']; ?></td>
                <td><?php echo $bk['author']; ?></td>
                <td><?php echo $bk['edition']; ?></td>
                <td><?php echo $bk['stock']; ?></td>
                <td><a href="<?= base_url(); ?>Member/borrow/<?= $bk['id'] ?>" class="badge badge-success float-center" id='button_borrow' name="button_borrow">Borrow</a></td>
              </tr><?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_login" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login</h5>
            <button class="close" type="button" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <?= form_open('Login/validate_member'); ?>
            <?= $this->session->flashdata('pesan'); ?>
            <form method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <button type="submit" name="insert" class="btn btn-success">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_registration" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Registration</h5>
            <button class="close" type="button" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <?= form_open('Member/insert'); ?>
            <?= $this->session->flashdata('pesan'); ?>
            <form method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
              </div>
              <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Age">
              </div>
              <div class="form-group">
                <label for="birthdate">Birth Date</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
              </div>
              <button type="submit" name="insert" class="btn btn-success">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
