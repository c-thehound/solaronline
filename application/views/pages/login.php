    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Solar Online</a>
            <small>Data Entry System</small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open('user/login');?>
                    <div class="m-b-10 text-center <?php echo $success === 'wrong_details' ? 'text-danger' : '' ?>">
                        <?php echo $success === 'wrong_details' ? 'Wrong username or password' : 'Sign in to start your session'; ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">language</i>
                        </span>
                        <select class="form-control show-tick" id="county" name="portal">
                            <option value="solar">Solar</option>
                            <option value="stoves">Stoves</option>      
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <input type="hidden" name="return_to" value="<?php echo isset($_GET['return_to']) ? $_GET['return_to'] : ''; ?>">
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12 align-right">
                            <a href="<?php echo base_url('/user/password_recovery'); ?>">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>