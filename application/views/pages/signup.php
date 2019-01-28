 <div class="signup-box" style="min-width: 400px;">
        <div class="logo">
            <a href="javascript:void(0);">Solar Online</a>
            <small>Data Entry System</small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open('user/create_account');?>
                    <div class="m-b-10 text-center <?php echo $success === 'user_exists' ? 'text-danger' : '' ?>">
                        <?php echo $success === 'user_exists' ? 'User already exists' : 'Create a new data entry account'; ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user_firstname" placeholder="First Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user_lastname" placeholder="Last Name" required autofocus>
                        </div>
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
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                           <input type="tel" pattern="[0-9]{9}" id="phone_number" name="user_phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1 p-l-0 p-r-0">
                            <i class="material-icons m-l-10 m-t-25">language</i>
                        </div>
                        <div class="col-xs-11">
                            <label>County </label>
                            <select multiple data-max-options="1" class="form-control show-tick" id="county" name="County" data-live-search="true">
                                <?php foreach($counties as $county): ?>
                                    <option value="<?php echo $county['County']; ?>"><?php echo $county['County'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1 p-l-0 p-r-0">
                            <i class="material-icons m-l-10 m-t-25">language</i>
                        </div>
                        <div class="col-xs-11">
                            <label>Sub County</label>
                            <select multiple data-max-options="1" class="form-control show-tick" id="sub_county" name="SubCounty" data-live-search="true">
                                <?php foreach($sub_counties as $sub_county): ?>
                                    <option value="<?php echo $sub_county['SubCounty']; ?>"><?php echo $sub_county['SubCounty'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1 p-l-0 p-r-0">
                            <i class="material-icons m-l-10 m-t-25">language</i>
                        </div>
                        <div class="col-xs-11">
                            <label>Cluster</label>
                            <select multiple data-max-options="1" class="form-control show-tick" id="cluster" name="Cluster" data-live-search="true">
                                <?php foreach($clusters as $cluster): ?>
                                    <option value="<?php echo $cluster['Cluster']; ?>"><?php echo $cluster['Cluster'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="user_email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>
                </form>
            </div>
        </div>