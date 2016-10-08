
<body style="background-color:white">

<!-- Navbar -->
<nav class="navbar navbar-success navbar-fixed-top" role="navigation">
	<div class="container-fluid">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
    		</button>
    	</div>

    	<div class="collapse navbar-collapse" id="navbar-collapse">
    		<ul class="nav navbar-nav">
				<li class="active" id="knowledgebase"><a href="<?php echo base_url(); ?>">Knowledgebase</a></li>
        		<li class="dropdown" id="assets">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Assets</a>
        			<ul class="dropdown-menu">
	        			<li><a href="#">Tools</a></li>
                        <li><a href="#" id="viewdevices">Devices<sup>[beta]</sup></a></li>
        			</ul>
        		</li>
        		<li class="dropdown" id="ipmanagement">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">IP Management</a>
        			<ul class="dropdown-menu">
        				<li><a href="#" data-toggle="modal" data-target="#newip" id="callnewip">New Assignment</a></li>
        				<li><a href="#" id="viewactive">View Active</a></li>
        				<li><a href="#">Detect Rouge</a></li>
                        <li><a href="#" id="viewLogs">Assignment Logs</a></li>
        			</ul>
        		</li>
    		</ul>

    		<ul class="nav navbar-nav navbar-right">
                <?php if($this->session->user_type =='admin'){ ?>
                    <li><a href="#" id="settings"><i class="fa fa-gear"></i></a></li>
                <?php } ?>
    			<li><a href="#" data-toggle="modal" data-target="#edituser">Logged in as <?php echo $this->session->name; ?></a></li>
    			<li><a href="<?php echo base_url('index.php/user/logout') ?>"><i class="fa fa-sign-out"></i></a></li>
    		</ul>
    	</div>
	</div>
</nav>
<!-- end navbar -->

<!-- Modal -->

<!-- New IP Assignment -->
<div class="modal fade" id="newip" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">New IP Assignment</h4>
            </div>
            <div class="modal-body" id="newassignment">
                <!-- AJAX for new IP assignment form will go here. -->
            </div>
        </div>
    </div>
</div>

<!-- Edit Assignment -->
<div class="modal fade" id="editip" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit IP Assignment</h4>
            </div>
            <div class="modal-body" id="editassignment">
                <!-- AJAX for new IP assignment form will go here. -->
            </div>
        </div>
    </div>
</div>

<!-- Edit User Info -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Update your info</h4>
            </div>
            <div class="modal-body text-center">
                <div class="form-group input-group">
                    <span class="input-group-addon">Username</span>
                    <input class="form-control" type="text" id="user_username" placeholder="<?php echo $this->session->username; ?>" value="<?php echo $this->session->username; ?>" />
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">New Password</span>
                    <input class="form-control" type="password" id="user_password" placeholder="**********" />
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">Retype Password</span>
                    <input class="form-control" type="password" id="user_cpassword" placeholder="**********" />
                </div>
                <button class="btn btn-raised btn-success" id="submituseredit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit User Password Using Admin -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Update password</h4>
            </div>
            <div class="modal-body">
                <span class="text-danger" id="newPasswordError" hidden>Please try again.</span>
                <input type="password" class="form-control" type="text" id="newPassword1" placeholder="password" />
                <input type="password" class="form-control" type="text" id="newPassword1Confirm" placeholder="confirm password" />
                <button class="btn btn-success btn-raised" id="submitNewPassword">Change</button>
            </div>
        </div>
    </div>
</div>

<!-- End of Modal -->

<div class="wrapper">
	<div class="row container" id="container-faq">
		<div class="col-xs-3 faq-category">
			<div class="form-group label-floating">
				<label class="control-label">Search for a keyword</label>
				<input type="text" class="form-control" id="search">
			</div>
            <div class="subjects"></div>
		</div>     

		<div class="col-xs-9 faq-content">
            <button class="btn btn-primary btn-raised" id="newfaq">Add New</button>

            <!-- loading image that should show on every AJAX calls -->
            <img src="assets/images/loading.gif" class"loading" hidden >

            <div id="new">
                <input id="subject" class="form-control" placeholder="Enter the title of this workaround" />
                <textarea id="content" rows="20" class="form-control" placeholder="Start typing your solution here."></textarea>
                <input id="tags" class="form-control" placeholder="e.g. Powershell, Network, etc" />
            </div>
<<<<<<< HEAD

            <button class="btn btn-success btn-raised" id="save">Save</button>
            <button class="btn btn-danger btn-raised" id="cancel">Cancel</button>

=======
            <button class="btn btn-success btn-raised" id="save">Save</button>
            <button class="btn btn-danger btn-raised" id="cancel">Cancel</button>
>>>>>>> 0ece67987b6f92ac81979e562536b9ef7e43407a
            <div class="body">
                <h2>Use the search box to look for answers.</h2>
            </div>
		</div>
	</div>
    <!-- these are the container divs for different modules -->
    <div id="container-active-ip" class="container"></div>
    <div id="container-devices" class="container"></div>
    <div id="container-settings" class="container"></div>
    <div id="container-logs" class="container"></div>
</div>

    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script> -->
    <script src="assets/js/custom.js" type="text/javascript"></script>
    <script src="assets/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({ 
            selector:'textarea',
<<<<<<< HEAD
            plugins: 'fullscreen image textcolor print preview searchreplace table code',
            toolbar: 'forecolor backcolor insert code table',
            browser_spellcheck:true,
            paste_data_images: true,
=======
            plugins: 'fullscreen image print preview searchreplace table code advlist',
            //toolbar: 'forecolor backcolor insert code table',
            //advlist_bullet_styles: 'default,circle,disc,square',
>>>>>>> 0ece67987b6f92ac81979e562536b9ef7e43407a
        });
    </script>
    <script type="text/javascript">

        /*
        * This block calls the ajax pages for
        * all active IP Addresses. It fades out the current faq view
        * then fades in the new ajax page
        */
        var view_active_ip = function(){
            $(".container").fadeOut("medium");
            $("#container-active-ip").load("<?php echo base_url('index.php/iplog') ?>");
            $("#container-active-ip").fadeIn("medium");
            $(".active").removeClass("active");
            $("#ipmanagement").addClass("active");
        }

        var viewSettings = function(){
            $(".container").fadeOut("medium");
            $("#container-settings").fadeIn("medium");
            $("#container-settings").load("<?php echo base_url('index.php/settings') ?>");
        }

        var viewLogs = function(){
            $(".container").fadeOut("medium");
            $("#container-logs").fadeIn("medium");
            $(".active").removeClass("active");
            $("#ipmanagement").addClass("active"); 
        }

        $(document).on("click","#changePasswordTrigger",function(){
            $("#submitNewPassword").attr("target",$(this).attr("target"));
        });

/*---------------CLEARING----------------*/
        function hide_forms(){
            $("#new").fadeOut("slow");
            $("#newfaq").fadeIn("slow");
            $("#save").hide();
            $("#cancel").hide();
            $("#newPasswordError").hide();
        }

        function clearUserForm(){
            $("#username").val("");
            $("#password").val("");
            $("#fullname").val("");
        }

        $(document).on("click","#clearUserForm",function(){
            clearUserForm();
        });
/*--------------End of Clearing----------*/

        $(document).ready(function(){

            $("#new").toggle("medium");
            $("#save").hide();
            $("#cancel").hide();

            /*
            * This block fades out the IP tables 
            * then shows up the knowledgebase
            */
            $(document).on("click","#knowledgebase",function(){
                $(".active").removeClass("active");
                $(this).addClass("active");
                $("#container-active-ip").fadeOut("medium");
                $("#container-settings").fadeOut();
                $("#container-faq").fadeIn("medium");
            });

            /*
            * This block unhides the form for creating new FAQ
            */
            $(document).on("click","#newfaq",function(){
                $("#new").toggle("slow");
                $("#newfaq").hide();
                $("#save").fadeIn("slow");
                $("#cancel").fadeIn("slow");
            });

            /*
            * whichever anchor tag is clicked inside the site
            * will cancel the new knowledgebase creation
            */
            $(document).on("click","a",function(){
                hide_forms();
            });

            /*
            * cancels the new knowledgebase creation
            */
            $(document).on("click","#cancel",function(){
                hide_forms();
            });

/*----------FUNCTIONS FOR VIEWING RECORDS----------------*/
/*-------------------------------------------------------*/            

            /*
            *This block is for new ip assignment modal. it loads the form itself
            */
            $(document).on("click","#callnewip",function(){
                $("#newassignment").load("<?php echo base_url('index.php/iplog/load_new_form') ?>");
            });

            $(document).on("click","#viewactive",view_active_ip);

            /* view devices *not finished yet. */
            $(document).on("click","#viewdevices",function(){
                $(".container").fadeOut("medium");
                $("#container-active-ip").load("<?php echo base_url('index.php/devices') ?>");
                $("#container-active-ip").fadeIn("medium");
                $(".active").removeClass("active");
                $("#assets").addClass("active");
            });
            /*
            * function to display the content of the FAQ based on selected title on the left
            */
            $(document).on("click",".title",function(){

                var id = $(this).attr("id");

                $.post("<?php echo base_url('index.php/faq/fetch_faq_content') ?>",{id:id},function(data){
                    $(".body").html(data);
                },"html");
            });
            
            /*
            * Submit search with Enter Key
            */
            $(document).on("keypress","#search",function(e){
                if(e.keyCode==13){

                    var keyword = $("#search").val();

                    $.post("<?php echo base_url('index.php/faq/search') ?>",{keyword:keyword},function(data){
                        $(".subjects").html(data);
                    },"html");
                }
            });

            /*
            * Ajax for loading all FAQ
            */
            $.post("<?php echo base_url('index.php/faq/load_faq') ?>",function(data){
                $(".subjects").html(data);
            },"html");

            /*
            * Function for viewing the IP Assignment logs
            */
            $(document).on("click","#viewLogs",function(){
                $.get("<?php echo base_url('index.php/iplog/loadLogs') ?>",function(data){
                    $("#container-logs").html(data);
                    viewLogs();
                },"html");
            })
/*-------------------------------------------------------*/

/*----------FUNCTIONS FOR ADDING NEW OBJECTS----------------*/
/*-------------------------------------------------------*/

            /*
            * this block opens is for assigning a new IP address
            * if calls a function that inputs the new information respective
            * to the given IP then changes the IP's status to active
            */
            $(document).on("click","#registernewip",function(){

                var ip = $("#ip").val();
                var computername = $("#computername").val();
                var username = $("#username").val();
                var macaddress = $("#macaddress").val();
                var device = $("#device").val(); 
                var department = $("#department").val();
                
                $.post("<?php echo base_url('index.php/iplog/new_assignment'); ?>",{ip:ip,computername:computername,username:username,macaddress:macaddress,device:device,department:department},function(data,status){
                    $("#newassignment").html("<p class='text-green'>A new IP address has been assigned. Don't forget to setup your proxy policy for this new one.</p>");
                    $("#container-active-ip").load("<?php echo base_url('index.php/iplog') ?>");
                });
            });


            /*
            * function for registering new device
            *
            */
            $(document).on("click","#btn_newdevice",function(){

                if($("#serial").val()=="" || $("#devicename").val()=="" || $("#processor").val()=="" || $("#memory").val()=="" || $("#harddrive").val()=="" || $("#nic").val()=="" || $("#vga").val()=="" ){
                    alert("All fields are required.");
                }else{
                    var devicename = $("#devicename").val();
                    var processor = $("#processor").val();
                    var memory = $("#memory").val();
                    var harddrive = $("#harddrive").val();
                    var nic = $("#nic").val();
                    var vga = $("#vga").val();
                    var serial = $("#serial").val();

                    $.post("<?php echo base_url() ?>/index.php/devices/add_device",{serial:serial,devicename:devicename,processor:processor,memory:memory,harddrive,nic:nic,vga:vga},function(data){
                        alert(data);
                        $("#devicename").val("");
                        $("#processor").val("");
                        $("#memory").val("");
                        $("#harddrive").val("");
                        $("#nic").val("");
                        $("#vga").val("");
                        $("#serial").val("");
                    });
                }

            });

            /*
            * function for submitting the new user info
            *
            */
            $(document).on("click","#newuser",function(){
                
                if($("#username").val()=='' || $("#password").val()=='' || $("#usertype").val()=='' || $("#fullname").val()==''){
                    alert("Please do not leave any field empty.");
                }else if($("#username").val().length < 6){
                    alert("Username must be 6 or more characters.");
                }else if($("#password").val().length < 6){
                    alert("Password must be 6 or more characters.");
                }else{
                    var username = $("#username").val();
                    var password = $("#password").val();
                    var usertype = $("#usertype").val();
                    var fullname = $("#fullname").val();

                    $.post("<?php echo base_url('index.php/user/addUser'); ?>",{username:username,password:password,usertype:usertype,fullname:fullname},function(data){
                            alert("A new user has been created.");
                            $("#username").val("");
                            $("#password").val('');
                            $("#usertype").val('');
                            $("#fullname").val('');    
                        });
                    //clearUserForm();
                    viewSettings();                   
                };

            });

            /*
            * function for creating new FAQ
            */
            $(document).on("click","#save",function(){

                if($("#subject").val() !="" || $("#content").val() != ""){

                    var subject = $("#subject").val();
                    var body = tinymce.get('content').getContent();
                    var tags = $("#tags").val();

                    $("#new").hide();
                    $(".loading").show();

                    $.post("<?php echo base_url('index.php/faq/add'); ?>",{subject:subject,body:body,tags:tags},function(data){
                        $(".loading").hide();
                        $("#new").show();
                        alert("A new workaround has been added successfully.");
                        $("#subject").val("");
                        $("#content").val("");
                        $("#tags").val("");
                        hide_forms();
                    });
                }else{
                    alert("You need to fill-out the title and the content.");
                }
            });

            /*
            * this function will load settings page
            */
            $(document).on("click","#settings",function(){
                viewSettings();
            });

/*----------END OF FUNCTIONS FOR ADDING NEW OBJECTS----------------*/

/*----------FUNCTIONS FOR MODIFYING OBJECTS----------------*/
/*-------------------------------------------------------*/


            /*
            * this block modifies the IP assignment information
            * it uses ajax using post method
            */
            $(document).on("click","#submitedit",function(){
                var ip = $("#edit_ip").val();
                var macaddress = $("#edit_macaddress").val();
                var username = $("#edit_username").val();
                var device = $("#edit_device").val();
                var computername = $("#edit_computername").val();
                var department = $("#edit_department").val();

                $.post("<?php echo base_url('index.php/iplog/edit_assignment'); ?>",{ip:ip,macaddress:macaddress,username:username,device:device,computername:computername,department:department},function(data){
                    $("#editassignment").html("<p>Successfully modified the IP Assignment.</p>");
                $("#container-active-ip").load("<?php echo base_url('index.php/iplog') ?>");
                })
            });

            /*
            * this line is for changing the user's login info
            * such as username and password
            */
            $(document).on("click","#submituseredit",function(){
                if($("#user_password").val()==$("#user_cpassword").val()){

                    var username = $("#user_username").val();
                    var password = $("#user_password").val();

                    $.post("<?php echo base_url('index.php/user/edit_user'); ?>",{username:username,password:password},function(data){
                        alert(data);
                        $("#user_password").val("");
                        $("#user_cpassword").val("");
                    });
                }else{
                    alert("Your passwords do not match.");
                }
            });

            /*
            * this block opens a new dialog that
            * displays an IP assignment information for editting
            */
            $(document).on("click",".edit",function(){
                var ip = $(this).attr("data");
                $.post("<?php echo base_url('index.php/iplog/show_assignment_details'); ?>",{ip:ip},function(data){
                    $("#editassignment").html(data);
                });
            });

            $(document).on("click","#submitNewPassword",function(){
                if($("#newPassword1").val().length < 6){
                    $("#newPasswordError").text("Please choose a longer password.");
                    $("#newPasswordError").show();
                }else if($("#newPassword1").val()!==$("#newPassword1Confirm").val()){
                    $("#newPasswordError").text("Password did not match.");
                    $("#newPasswordError").show();
                }else{
                    var newPassword = $("#newPassword1").val();
                    var userid = $(this).attr("target");
                    $.post("<?php echo base_url('index.php/user/updatePassword') ?>",{id:userid,password:newPassword},function(data){
                        $("#newPasswordError").text('The password has been successfully updated.');
                        $("#newPasswordError").removeClass("text-danger").addClass("text-success").show();
                        $("#newPassword1").val("");
                        $("#newPassword1Confirm").val("");
                    });
                }
            })

/*----------END OF FUNCTIONS FOR MODIFYING OBJECTS----------------*/

/*----------FUNCTIONS FOR DELETING OBJECTS----------------*/
/*-------------------------------------------------------*/

            /*
            * this block unassigns the currently selected IP
            * it only changes the status to "inactive"
            */
            $(document).on("click",".delete",function(){
                var ip = $(this).attr("data");
                var c = confirm("Are you sure you want to remove the assignment in " + ip + "?");
                if(c){
                    $.post("<?php echo base_url('index.php/iplog/set_inactive'); ?>",{ip:ip},function(data){
                        alert(ip + " is now unassigned.");
                        $("#container-active-ip").load("<?php echo base_url('index.php/iplog') ?>");
                    });                    
                }
            });

            /*
            * This block deletes the selected device
            */
            $(document).on("click",".del_device",function(){
                var confirmDelete = confirm("Are you sure you want to mark this device as obsolete?");
                if(confirmDelete){
                    var id = $(this).attr("data");
                    $.post("<?php echo base_url('index.php/devices/delete'); ?>",{id:id},function(data){
                        alert(id + " has been successfully removed.");
                        $("#container-active-ip").load("<?php echo base_url('index.php/devices') ?>");
                    });
                };
            });

            /*
            * This function will get the user/deactivate
            * @param id of the delete button clicked 
            */
            $(document).on("click","#deleteUser",function(){
                
                var c = confirm("Are you sure you want to disable this account?");
                if(c){
                    var link = "<?php echo base_url('/index.php/user/deactivate'); ?>" + "/" + $(this).attr('data-target');
                    
                    $.get(link, function(){
                        alert("The user has been deactivated.");
                        viewSettings();    
                    });
                }
            })

/*----------END OF FUNCTIONS FOR DELETING OBJECTS----------------*/

        });
    </script>
</body>

