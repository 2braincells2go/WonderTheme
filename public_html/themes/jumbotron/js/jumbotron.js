function pageLoad(pageName) {
	fixSettingsDisplay();
	setActiveNav(pageName);
}

function addSettings(html) {
	var $settingsBox = $('div.settings div.hide');
	if ( $settingsBox.length ) {
		$settingsBox.append(html);
		var element = $('#adminEmail').detach();
		$('#settingsEmail').append(element);
	}
}

function fixSettingsDisplay() {
	var $settingsBox = $('div.settings div.hide');
	if ( $settingsBox.length ) {
		$('#navbar').removeClass('navbar-fixed-top');
		$('.jumbotron').css('background-position','center -300px');
	}
}

function setActiveNav(pageName) {
	var className = '.menu-' + pageName;
	$(className).parent('li').addClass('active');
}

function submitContactForm(adminEmail, postPage) {

	//get input field values
	var user_name       = $('#contactName').val(); 
	var user_info     = $('#contactInfo').val();
	var user_message    = $('#contactMessage').val();

	//simple validation at client's end
	//we simply change border color to red if empty field using .css()
	var proceed = true;
	if(user_name==""){ 
		$('#contactName').css('border-color','red'); 
		$('#contactName').parent().append('<span class="error">Name is required.</span>');
		proceed = false;
	}
	if(user_info==""){ 
		$('#contactInfo').css('border-color','red'); 
		$('#contactInfo').parent().append('<span class="error">Phone or Email is required.</span>');
		proceed = false;
	}
	if(user_message=="") {  
		$('#contactMessage').css('border-color','red'); 
		$('#contactMessage').parent().append('<span class="error">Message is required.</span>');
		proceed = false;
	}

	//everything looks good! proceed...
	if(proceed) 
	{
		//data to be sent to server
		post_data = {'userName':user_name, 'userInfo':user_info, 'userMessage':user_message, 'adminEmail':adminEmail};

		//Ajax post data to server
		$.post(postPage, post_data, function(response){  

			//load json data from server and output message     
			if(response.type == 'error')
			{
				output = '<div class="error">'+response.text+'</div>';
			}else{

				output = '<div class="success">'+response.text+'</div>';

				//reset values in all input fields
				$('#contact_form input').val(''); 
				$('#contact_form textarea').val(''); 
			}
			
			$("#contactForm").hide().html(output).slideDown();
		}, 'json');
	}
}