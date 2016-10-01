
<body style="background-color:white">

<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
				<li class="active" id="knowledgebase"><a href="#">Knowledgebase</a></li>
        		<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Assets</a>
        			<ul class="dropdown-menu">
	        			<li><a href="#">Manage</a></li>
	        			<li><a href="#">Lend</a></li>
                        <li><a href="#">Return</a></li>
        			</ul>
        		</li>
        		<li class="dropdown" id="ipmanagement">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">IP Management</a>
        			<ul class="dropdown-menu">
        				<li><a href="#" data-toggle="modal" data-target="#newip" id="callnewip">New Assignment</a></li>
        				<li><a href="#" id="viewactive">View Active</a></li>
        				<li><a href="#">Detect Rouge</a></li>
        			</ul>
        		</li>
    		</ul>

    		<ul class="nav navbar-nav navbar-right">
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
            <div class="modal-body">
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
                <button class="btn btn-success" id="submituseredit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- End of Modal -->

<div class="wrapper">
	<div class="row" id="container-faq">
		<div class="col-xs-3 faq-category">
			<div class="form-group label-floating">
				<label class="control-label">Search for a keyword</label>
				<input type="text" class="form-control" id="search">
			</div>
            <div class="subjects"></div>
		</div>
		<div class="col-xs-9 faq-content">
            <button class="btn btn-primary btn-raised" id="newfaq">Add New</button>
            <button class="btn btn-success btn-raised" id="save">Save</button>
            <button class="btn btn-danger btn-raised" id="cancel">Cancel</button>
            <div id="new">
                <input id="subject" class="form-control" placeholder="Enter the title of this workaround" />
                <textarea id="content" rows="20" class="form-control" placeholder="Start typing your solution here."></textarea>
                <input id="tags" class="form-control" placeholder="e.g. Powershell, Network, etc" />
            </div>
            <div class="body">
                <h2>Use the search box to look for answers.</h2>
            </div>
		</div>
	</div>
    <div id="container-active-ip"></div>
</div>

    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
   <!-- <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function(){

            $("#new").toggle("slow");
            $("#save").hide();
            $("#cancel").hide();

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

            /* -- This block is for new ip assignment modal. it loads the form itself -- */
            $(document).on("click","#callnewip",function(){
                $("#newassignment").load("<?php echo base_url('index.php/iplog/load_new_form') ?>");
            });

            /*
            * This block calls the ajax pages for
            * all active IP Addresses. It fades out the current faq view
            * then fades in the new ajax page
            */
            $(document).on("click","#viewactive",function(){
                $("#container-faq").fadeOut("medium");
                $("#container-active-ip").load("<?php echo base_url('index.php/iplog') ?>");
                $("#container-active-ip").fadeIn("medium");
                $(".active").removeClass("active");
                $("#ipmanagement").addClass("active");
            });

            /*
            * This block fades out the IP tables 
            * then shows up the knowledgebase
            */
            $(document).on("click","#knowledgebase",function(){
                $(".active").removeClass("active");
                $(this).addClass("active");
                $("#container-active-ip").fadeOut("medium");
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
                $("#new").fadeOut("slow");
                $("#newfaq").fadeIn("slow");
                $("#save").hide();
                $("#cancel").hide();
            });

            /*
            * cancels the new knowledgebase creation
            */
            $(document).on("click","#cancel",function(){
                $("#new").fadeOut("slow");
                $("#newfaq").fadeIn("slow");
                $("#save").hide();
                $("#cancel").hide();
            });

            /*
            * this block opens a new dialog that
            * displays an IP assignment information for editting
            */
            $(document).on("click",".edit",function(){
                var ip = $(this).attr("data");
                $.post("<?php echo base_url('index.php/iplog/show_assignment_details'); ?>",{ip:ip},function(data){
                    $("#editassignment").html(data);
                })
            });

            /*
            * this block unassigns the currently selected IP
            * it only changes the status to "inactive"
            */
            $(document).on("click",".delete",function(){
                var ip = $(this).attr("data");
                $.post("<?php echo base_url('index.php/iplog/set_inactive'); ?>",{ip:ip},function(data){
                    alert(ip + " is now unassigned.");
                    $("#container-active-ip").load("<?php echo base_url('index.php/iplog') ?>");
                });
            });

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
            * Ajax for loading all FAQ
            */
            $.post("<?php echo base_url('index.php/faq/load_faq') ?>",function(data){
                $(".subjects").html(data);
            },"html");
            
            /*
            * Submit action with Enter Key
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
            * function to display the content of the FAQ based on selected title on the left
            */
            $(document).on("click",".title",function(){

                var id = $(this).attr("id");

                $.post("<?php echo base_url('index.php/faq/fetch_faq_content') ?>",{id:id},function(data){
                    $(".body").html(data);
                },"html");
            });


            /*
            * function for creating new FAQ
            */
            $(document).on("click","#save",function(){

                if($("#subject").val() !="" || $("#content").val() != ""){

                    var subject = $("#subject").val();
                    var body = $("#content").val();
                    var tags = $("#tags").val();

                    $.post("<?php echo base_url('index.php/faq/add'); ?>",{subject:subject,body:body,tags:tags},function(data){
                        alert("A new workaround has been added successfully.");
                        $("#subject").val("");
                        $("#content").val("");
                        $("#tags").val("");
                    });
                }else{
                    alert("You need to fill-out the title and the content.");
                }
            });

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
            })
        })
    </script>
</body>

