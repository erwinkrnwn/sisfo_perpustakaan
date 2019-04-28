    <div class="container-fluid" style="background-image: url('<?= base_url(); ?>assets/img/bg_landing.jpg'); position:fixed; height: 100%; align-items: center; padding-top: 12vh;">
        <div class="jumbotron" style="width: 65vh; margin: auto;">
            <h1 class="text-center">OpenLib Manage</h1>
            <hr>
            <p><small>administrator and staff only</small></p>
            <?php echo form_open('Login/validate');?>
            <?= $this->session->flashdata('pesan'); ?>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary float-right">Login</button>
            </form>
        </div>
    </div>
