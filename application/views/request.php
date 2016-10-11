<!DOCTYPE html>
<html>
<head>
	<title>Download Request</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
</head>
<body style="text-align:center;margin-top:20px">
	<div class="container-fluid">
		<div class="col-sm-12">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<h1>My Download Request</h1>
				<p>&nbsp;</p>
				<textarea class="form-control" id="url" placeholder="Paste the urls here"></textarea>
				<p>&nbsp;</p>
				<p style="text-align:left">Tell us why you need this download.</p>
				<textarea id="explanation" class="form-control" placeholder="Tell us why do you need this download."></textarea>
				<p>&nbsp;</p>
				<div class="col-sm-4">
					<p style="text-align:left">When do you need this?</p>
				</div>
				<div class="col-sm-8" style="padding:0">
					<select id="urgency" class="form-control">
						<option value="today">Today</option>
						<option value="this week">This week</option>
						<option value="this month">This Month</option>
						<option value="can wait">It can wait</option>
					</select>
				</div>
				<p>&nbsp;</p>
				<input id="requestor" placeholder="Tell us your name" class="form-control" />
				<p>&nbsp;</p>
				<div id="submitButtons">
					<button class="btn btn-sm btn-success" id="submit">Submit this request</button>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>

    <script src="<?php echo base_url('/assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/js/tinymce/tinymce.min.js'); ?>"></script>
    <script>
        tinymce.init({ 
            selector:'#explanation',
        });

        $(document).on("click","#submit",function(){

        	if(!$("#url").val()){
        		alert("Please type the URL. That is what we need.");
        	}else{
        		$("#submitButtons").html("Sending it to handsome people in IT. Please wait...");

        		var url = $("#url").val();
        		var reason = tinymce.get('explanation').getContent();
        		var urgency = $("#urgency").val();
        		var requestor = $("#requestor").val();
        		
        		$.post("<?php echo base_url('index.php/downloads/submit') ?>",{url:url,reason:reason,urgency:urgency,requestor:requestor},function(data){
        			alert("Request submitted successfully! We will email you when it's done.");
        			location.reload();
        		});
        	}

        })

        /*        if($("#subject").val() !="" || $("#content").val() != ""){

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
                }*/
    </script>
	</div>
</body>
</html>