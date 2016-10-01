
<body style="background-color:white;text-align:center;color:#F9F9F9">
    <!-- Header -->
    <div class="container" style="padding-top:200px">
            <div class="row">
            	<!-- Login Information -->
                <div class="col-lg-12">
                    <?php 

                        if(!empty(validation_errors())){
                           echo "<div class='alert alert-danger'>" . validation_errors() . "</div>"; 
                        }

                        if(!empty($login_error)){
                           echo "<div class='alert alert-danger'>" . $login_error . "</div>"; 
                        }

						echo form_open(base_url('index.php/user/authenticate'));

                    ?>
                    <div class="col-md-3"><h3>Login</h3></div>
                    <div class="col-md-6" style="text-align:right">
                    	<div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    		<input class="form-control" name="username" type="text" placeholder="e.g l.osorio"/>
                    	</div>
                    	<div class="form-group input-group">
                    		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" name="password" type="password" />
                    	</div>
                        <div>
                            <input name="submit" type="submit" value="Login" class="btn btn-primary" />
                            <a href="<?php echo base_url('index.php/user/register') ?>" class="btn btn-warning">Register</a>
                        </div>
					</div>	
                </div>
				</form>
            </div>
        </div>