(function ()
{
	let menuClosed = false;
	let button = document.querySelector('#button-main-menu');
	let menu = $('.besaas-menu');

	function showMenu()
	{
		document.body.classList.remove('not-menu');
		$('#button-main-menu').addClass('open');
		menu.animate({width: '240px'}, 400);

		menuClosed = false;

		if($(window).width() <= 768)
		{
			$('main').hide(200);
		}
	}

	function hideMenu()
	{
		document.body.classList.add('not-menu');
		$('#button-main-menu').removeClass('open');
		menu.animate({width: 0}, 1000);

		menuClosed = true;

		if($(window).width() <= 768)
		{
			$('main').show(1000);
		}
	}

	function checkPageWidth()
	{
		if ($(window).width() <= 768)
		{
			hideMenu();
		}
		else
		{
			showMenu();
		}
	}

	$(window).resize(function()
	{
		checkPageWidth()
	})

	checkPageWidth()

	// On clique pour fermer le menu
	button.addEventListener('click', function (e)
	{
		if(!menuClosed)
		{
			// On empèche la propagration vers le parent
			e.stopPropagation();
			e.preventDefault();

			hideMenu();
		}
		else
		{
			showMenu();
		}

	});

	$('.btn-nav > span').click(function()
	{
		let parent = $(this).parent();
		$('.btn-nav').children('li').slideUp(100);
		$('.multi-lvl').children('ul').slideUp(100);
		$('.btn-nav').removeClass('focus');

		if(parent.hasClass('multi-lvl'))
		{
			parent.children('ul').children('li').hide();
			parent.children('li').slideToggle(100);
			parent.children('ul').slideToggle(100);
		}
		else
		{
			parent.children('li').slideToggle(100);
		}

		parent.toggleClass('focus');
	});

	$('.btn-sub-nav > span').click(function()
	{
		let parent = $(this).parent()

		parent.children('li').slideToggle(100);
	});

	$('#personal_menu_chevron').change(function()
	{
		$('.personal_navigation').slideToggle(100);
		$('.i-rotatable').toggleClass('irotated');
	});

})();
