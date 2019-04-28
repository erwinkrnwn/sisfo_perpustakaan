<?= $this->session->flashdata('pesan'); ?>
  <div class="container-fluid CFadminpage">
    <div class="row">
      <div id="sidebar" class="col-md-2 px-0 bg-light">
        <div class="list-group">
          <a href="<?= base_url(); ?>Administrator" class="list-group-item list-group-item-secondary">Staff Manage</a>
          <a href="<?= base_url(); ?>Administrator/report" class="list-group-item list-group-item-secondary">Report</a>
        </div>
      </div>
      <div class="col-md">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>Username</th>
              <th>Password</th>
              <th>Position</th>
              <th>Full Name</th>
              <th>Age</th>
              <th>Birth Date</th>
              <th>Address</th>
              <th></th>
              <th></th>
            </thead>
            <tbody>
              <?php foreach($employee as $emp){ ?><tr>
                <td><?php echo $emp['username']; ?></td>
                <td><?php echo $emp['password']; ?></td>
                <td><?php echo $emp['position']; ?></td>
                <td><?php echo $emp['fullname']; ?></td>
                <td><?php echo $emp['age']; ?></td>
                <td><?php echo $emp['birthdate']; ?></td>
                <td><?php echo $emp['address']; ?></td>
                <td><a href="<?= base_url(); ?>Administrator/delete/<?= $emp['id'] ?>" class="badge badge-danger float-center collapse" id='button_delete' name="button_delete">Delete</a></td>
                <td><a data-id="<?= $emp['id'] ?>" data-username="<?= $emp['username'] ?>" data-password="<?= $emp['password'] ?>" data-position="<?= $emp['position'] ?>" data-fullname="<?= $emp['fullname'] ?>" data-age="<?= $emp['age'] ?>" data-birthdate="<?= $emp['birthdate'] ?>" data-address="<?= $emp['address'] ?>" href="#modal_update" class="badge badge-warning float-center collapse" id='button_update' name="button_update" data-toggle="modal">Update</a></td>
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
            <h5 class="modal-title">Insert Employee</h5>
            <button class="close" type="button" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <?= form_open('Administrator/insert'); ?>
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
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position" placeholder="Position">
              </div>
              <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Age">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="birthdate">Birth Date</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="YYYY-MM-DD">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
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
            <h5 class="modal-title">Update Employee</h5>
            <button class="close" type="button" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <?= form_open('Administrator/update'); ?>
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
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position" placeholder="Position">
              </div>
              <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Age">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="birthdate">Birth Date</label>
                    <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="YYYY-MM-DD">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
              </div>
              <button type="submit" name="insert" class="btn btn-warning">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
