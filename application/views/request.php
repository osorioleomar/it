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
				<p style="text-align:left">Tell us about the download and why you need it.</p>
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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <script src="<?php echo base_url('/assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/js/tinymce/tinymce.min.js'); ?>"></script>
    <script>
        tinymce.init({ 
            selector:'#explanation',
        });

        $(document).on("click","#submit",function(){

        	if(!$("#url").val()){
        		alert("Please type the URL. That is what we need.");
        	}else if(!tinymce.get('explanation').getContent()){
        		alert("Please let us know the reason of this download. That's where we will base the importance of it.");
        	}else if(!$("#requestor").val()){
        		alert("You forgot to type your name at the last field.");
        	}else{
        		$("#submitButtons").html("<img src='<?php echo base_url() ?>/assets/images/pleasewait.gif' height='40px'>");

        		var url = $("#url").val();
        		var reason = tinymce.get('explanation').getContent();
        		var urgency = $("#urgency").val();
        		var requestor = $("#requestor").val();
        		//alert(url+reason+urgency+requestor);
        		$.post("<?php echo base_url('index.php/downloads/submit') ?>",{url:url,reason:reason,urgency:urgency,requestor:requestor},function(data){
        			alert("Request submitted successfully! We will email you when it's done.");
        			location.reload();
        		});
        	}

        })
    </script>
	</div>
</body>
</html>