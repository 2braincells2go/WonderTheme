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