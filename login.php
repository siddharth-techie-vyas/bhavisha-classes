<?php include('web/header.php'); include('class/Admin.php'); ?>
<link rel="stylesheet" href="<?php echo $base_url;?>theme/css/maruti-login.css" />
    <div id="loginbox">
        <form id="loginform" action="processlogin.php" class="form-vertical" method="post" >
            <div class="control-group normal_text">
                <h3><img src="<?php echo $base_url;?>doc/theme/img/logo.png" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-home"></i></span>
                        <select name="company_name" id="company_name" class="span4">
                            <option selected="" disabled="">-- Select Company --</option>
                            <?php 
                                $admin = new Admin();
                                foreach($company as $k => $value)
                                {
                                    echo "<option value='".$company[$k]['id']."''>".strtoupper($company[$k]['company_name'])."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-user"></i></span><input type="text"
                            placeholder="Username" name="uname" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-lock"></i></span><input type="password"
                            placeholder="Password" name="upassword"/>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost
                        password?</a></span>
                <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" name="btnlogin" /></span>
            </div>
        </form>
        <form id="recoverform" action="#" class="form-vertical">
            <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a
                password.</p>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on"><i class="icon-envelope"></i></span><input type="text"
                        placeholder="E-mail address" />
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to
                        login</a></span>
                <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover" /></span>
            </div>
        </form>
    </div>

    <script src="doc/theme/js/jquery.min.js"></script>
    <script src="doc/theme/js/maruti.login.js"></script>

<?php include('web/footer.php'); ?>
