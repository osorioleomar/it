<body style="background-color:white;text-align:center">
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
                    <div class="col-md-5"></div>
                    <div class="col-md-2" style="text-align:right">
                    	<div class="form-group label-floating">
                            <label class="control-label">Username</label>
                    		<input class="form-control" name="username" type="text" placeholder="e.g l.osorio"/>
                    	</div>
                    	<div class="form-group label-floating">
                            <label class="control-label">Password</label>
							<input class="form-control" name="password" type="password" placeholder="********" />
                    	</div>
                        <div>
                            <input name="submit" type="submit" value="Login" class="btn btn-primary" />
                        </div>
					</div>	
                </div>
				</form>
            </div>
        </div>

</body>
