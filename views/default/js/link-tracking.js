require(['jquery'], function (jquery) {
        
	$(document).ready(function(){
	    $('.link-tracking-div a').click(function(e) {
		
		e.preventDefault();

		var url = $(this).attr('href');
		
		console.log("Logging click on " + url);

		$.ajax({
		    url: elgg.config.wwwroot + 'link_tracking',
		    data: {
			url: url
		    },
		    success: function() {
			
			window.location = url;
		    }
		});


	    });
	});
    
});