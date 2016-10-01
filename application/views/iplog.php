

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
				<li class="active"><a href="#">Knowledgebase</a></li>
        		<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Assets</a>
        			<ul class="dropdown-menu">
	        			<li><a href="#">Manage</a></li>
	        			<li><a href="#">Lend</a></li>
        			</ul>
        		</li>
        		<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">IP Management</a>
        			<ul class="dropdown-menu">
        				<li><a href="#">New Assignment</a></li>
        				<li><a href="#">View All</a></li>
        				<li><a href="#">Detect Rouge</a></li>
        			</ul>
        		</li>
    		</ul>

    		<ul class="nav navbar-nav navbar-right">
    			<li><a href="#">Logged in as ME</a></li>
    			<li><a href="#"><i class="fa fa-sign-out"></i></a></li>
    		</ul>
    	</div>
	</div>
</nav>
<!-- end navbar -->

<div class="wrapper">
	<div class="row">
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
</div>

    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $("#new").toggle("slow");
            $("#save").hide();
            $("#cancel").hide();

            $(document).on("click","#newfaq",function(){
                $("#new").toggle("slow");
                $("#newfaq").hide();
                $("#save").fadeIn("slow");
                $("#cancel").fadeIn("slow");
            });

            $(document).on("click","a",function(){
                $("#new").fadeOut("slow");
                $("#newfaq").fadeIn("slow");
                $("#save").hide();
                $("#cancel").hide();
            });

            $(document).on("click","#cancel",function(){
                $("#new").fadeOut("slow");
                $("#newfaq").fadeIn("slow");
                $("#save").hide();
                $("#cancel").hide();
            });

            $.post("<?php echo base_url('index.php/faq/load_faq') ?>",function(data){
                $(".subjects").html(data);
            },"html");

            $(document).on("keypress","#search",function(e){
                if(e.keyCode==13){

                    var keyword = $("#search").val();

                    $.post("<?php echo base_url('index.php/faq/search') ?>",{keyword:keyword},function(data){
                        $(".subjects").html(data);
                    },"html");
                }
            });

            $(document).on("click",".title",function(){

                var id = $(this).attr("id");

                $.post("<?php echo base_url('index.php/faq/fetch_faq_content') ?>",{id:id},function(data){
                    $(".body").html(data);
                },"html");
            });

            $(document).on("click","#save",function(){

                var subject = $("#subject").val();
                var body = $("#content").val();
                var tags = $("#tags").val();

                $.post("<?php echo base_url('index.php/faq/add'); ?>",{subject:subject,body:body,tags:tags},function(data){
                    alert("A new workaround has been added successfully.");
                    $("#subject").val("");
                    $("#content").val("");
                    $("#tags").val("");
                });
            });
        })
    </script>
</body>

