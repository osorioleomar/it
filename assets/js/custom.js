
            /*
            * This block calls the ajax pages for
            * all active IP Addresses. It fades out the current faq view
            * then fades in the new ajax page
            */
            var view_active_ip = function(){
                $("#container-faq").fadeOut("medium");
                $("#container-active-ip").load("<?php echo base_url('index.php/iplog') ?>");
                $("#container-active-ip").fadeIn("medium");
                $(".active").removeClass("active");
                $("#ipmanagement").addClass("active");
            }