$(document).ready(function() { 

	setInterval( navChange(), 300);

});

function navChange() {
	$(document).scroll(function() {

		$docScroll = $(document).scrollTop();
		var section = $('#nav-reveal');
		var offset = section.offset();
		var top = offset.top;
		var bottom = top + section.outerHeight() - 200;


		if ( $docScroll > bottom )
		{
			$('#nav-background, #bs-example-navbar-collapse-1, #dropdown-menu').addClass('navbar-color');
		}

		if ( $docScroll < bottom )
		{
			$('#nav-background, #bs-example-navbar-collapse-1, #dropdown-menu').removeClass('navbar-color');
		}

	});

}