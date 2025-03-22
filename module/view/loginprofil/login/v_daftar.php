<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <!-- Brand -->
        <div class="text-center" style="margin-bottom:20px;">
            <span class="logo-figure inverse"></span>
                <h4 class="semibold text-muted mt-5">Monitoring Material</h4>
        </div>
        <!--/ Brand -->

        <!-- Register form -->
        <form class="panel" name="form-register" id="form-register" action="" method="post" data-parsley-validate>
            <div class="panel-body">
                <h4>Daftar Pengguna</h4>
                <hr>
                <div class="form-group">
                    <label class="control-label">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="USERNAME" placeholder="Username" data-parsley-required>
                </div>
                <div class="form-group">
                    <label class="control-label">Password  <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="USERPASSWORD" name="USERPASSWORD" placeholder="Password" data-parsley-required>
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Pengguna  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="NAMA" name="NAMA" placeholder="Nama Pengguna" data-parsley-required>
                </div>
                <div class="form-group">
                    <label class="control-label">Email  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="email" name="EMAIL" placeholder="Email" data-parsley-required>
                </div>
            </div>
            <hr class="nm">
            <div class="panel-footer">
                <button type="submit" name="daftar" class="btn btn-block btn-primary" id="daftar"><span class="semibold">Daftar</span></button>
            </div>
        </form>
        <!-- Register form -->

        <hr><!-- horizontal line -->

        <p class="text-center">
            <span class="text-muted">Sudah terdaftar user? <a class="semibold" href="index.php">Klik di sini untuk login</a></span>
        </p>
    </div>
</div>