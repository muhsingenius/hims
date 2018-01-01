$(document).ready(function(){
    $('select[name="will_sign_in"]').on('change', function(){    
    var selected = ($(this).val()); 

    if(selected=="Yes") {
    		$("#login_fields").show();
    	}else if(selected=="No"){
    		$("#login_fields").hide();
    	}
    
});



});




				