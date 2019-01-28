    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Solar Online</a>
            <small>Data Entry System</small>
        </div>
        <div class="card">
            <div class="body">
            <?php if((int)$success === 1) : ?>
                An email has been sent to you. Please log in to your email account to retrieve the password reset link.
            <?php else if((int)$success === 3) : ?>
                Error sending the recovery email
            <?php else: ?>
                <?php echo form_open('user/send_recovery_email');?>
                    <div class="m-b-10 text-center <?php echo (int)$success === 2 || (int)$success === 3 ? 'bg-red' : '';?>">
                        <?php if((int)$success === 2) : ?>
                            The email address you entered is not in our system. Try again?
                        <?php else: ?>
                            Please enter your email address below and we'll send you the password recovery link.
                        <?php endif; ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 m-l-30">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SEND LINK</button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
            </div>
        </div>
    </div>