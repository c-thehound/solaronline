 <div class="login-box" style="min-width: 400px;">
        <div class="logo">
            <a href="javascript:void(0);">Solar Online</a>
            <small>Data Entry System</small>
        </div>
        <div class="card">
            <div class="body">
            <?php if((int)$success === 1) : ?>
                Passsword changed successfully. <a href="<?php echo base_url('/user');?>">Click here to login</a>
            <?php else: ?>
                <?php echo form_open('user/change_password/' . $hash, array('id' => 'recover', 'method' => 'post'));?>
                    <div class="m-b-10 text-center">
                        Please enter your new password below
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="confirm" type="password" class="form-control" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">CHANGE PASSWORD</button>
                </form>
            <?php endif; ?>
            </div>
        </div>
    <script type="text/javascript">
        $(function () {
            $("#recover").on("submit", function () {
                if($("#password").val() !== $("#confirm").val()) {
                    swal("Hold Up!", "Passwords do not match. Please review and submit again.", "error");
                    return false;
                }
                return true;
            });
        });
    </script>