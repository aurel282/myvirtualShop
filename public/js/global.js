/*
 A simple, lightweight jQuery plugin for creating sortable tables.
 https://github.com/kylefox/jquery-tablesort
 Version 0.0.11
 */

(function($) {
	$.tablesort = function ($table, settings) {
		var self = this;
		this.$table = $table;
		this.$thead = this.$table.find('thead');
		this.settings = $.extend({}, $.tablesort.defaults, settings);
		this.$sortCells = this.$thead.length > 0 ? this.$thead.find('th:not(.no-sort)') : this.$table.find('th:not(.no-sort)');
		this.$sortCells.on('click.tablesort', function() {
			self.sort($(this));
		});
		this.index = null;
		this.$th = null;
		this.direction = null;
	};

	$.tablesort.prototype = {
		sort: function(th, direction) {
			var start = new Date(),
				self = this,
				table = this.$table,
				rowsContainer = table.find('tbody').length > 0 ? table.find('tbody') : table,
				rows = rowsContainer.find('tr').has('td, th'),
				cells = rows.find(':nth-child(' + (th.index() + 1) + ')').filter('td, th'),
				sortBy = th.data().sortBy,
				sortedMap = [];

			var unsortedValues = cells.map(function(idx, cell) {
				if (sortBy)
					return (typeof sortBy === 'function') ? sortBy($(th), $(cell), self) : sortBy;
				return ($(this).data().sortValue != null ? $(this).data().sortValue : $(this).text());
			});
			if (unsortedValues.length === 0) return;

			//click on a different column
			if (this.index !== th.index()) {
				this.direction = 'asc';
				this.index = th.index();
			}
			else if (direction !== 'asc' && direction !== 'desc')
				this.direction = this.direction === 'asc' ? 'desc' : 'asc';
			else
				this.direction = direction;

			direction = this.direction == 'asc' ? 1 : -1;

			self.$table.trigger('tablesort:start', [self]);
			self.log("Sorting by " + this.index + ' ' + this.direction);

			// Try to force a browser redraw
			self.$table.css("display");
			// Run sorting asynchronously on a timeout to force browser redraw after
			// `tablesort:start` callback. Also avoids locking up the browser too much.
			setTimeout(function() {
				self.$sortCells.removeClass(self.settings.asc + ' ' + self.settings.desc);
				for (var i = 0, length = unsortedValues.length; i < length; i++)
				{
					sortedMap.push({
						index: i,
						cell: cells[i],
						row: rows[i],
						value: unsortedValues[i]
					});
				}

				sortedMap.sort(function(a, b) {
					return self.settings.compare(a.value, b.value) * direction;
				});

				$.each(sortedMap, function(i, entry) {
					rowsContainer.append(entry.row);
				});

				th.addClass(self.settings[self.direction]);

				self.log('Sort finished in ' + ((new Date()).getTime() - start.getTime()) + 'ms');
				self.$table.trigger('tablesort:complete', [self]);
				//Try to force a browser redraw
				self.$table.css("display");
			}, unsortedValues.length > 2000 ? 200 : 10);
		},

		log: function(msg) {
			if(($.tablesort.DEBUG || this.settings.debug) && console && console.log) {
				console.log('[tablesort] ' + msg);
			}
		},

		destroy: function() {
			this.$sortCells.off('click.tablesort');
			this.$table.data('tablesort', null);
			return null;
		}

	};

	$.tablesort.DEBUG = false;

	$.tablesort.defaults = {
		debug: $.tablesort.DEBUG,
		asc: 'sorted ascending',
		desc: 'sorted descending',
		compare: function(a, b) {
			if (a > b) {
				return 1;
			} else if (a < b) {
				return -1;
			} else {
				return 0;
			}
		}
	};

	$.fn.tablesort = function(settings) {
		var table, sortable, previous;
		return this.each(function() {
			table = $(this);
			previous = table.data('tablesort');
			if(previous) {
				previous.destroy();
			}
			table.data('tablesort', new $.tablesort(table, settings));
		});
	};

})(window.Zepto || window.jQuery);

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

var timetableCell = $('.chkbox.parking.data-hours:not(:disabled)');
var timetableCellOriginate = $('.chkbox.data-hours.data-edit:not(:disabled)');
var timetableCellDay = $('.chkbox.data-hours:not(:disabled)[data-hour="day"]');
var timetableCellNight = $('.chkbox.data-hours:not(:disabled)[data-hour="night"]');

var timetableCellTenant = $('.chkbox.tenant.data-hours:not(:disabled)');
var timetableCellDayTenant = $('.chkbox.data-hours:not(:disabled)[data-hour="day-tenant"]');
var timetableCellNightTenant = $('.chkbox.data-hours:not(:disabled)[data-hour="night-tenant"]');

var toggleDay = $('#toggle-day');
var toggleNight = $('#toggle-night');
var toggleH24 = $('#toggle-h24');

var toggleDayTenant = $('#toggle-day-tenant');
var toggleNightTenant = $('#toggle-night-tenant');
var toggleH24Tenant = $('#toggle-h24-tenant');

var parkingTimetableName = $('#parking_timetable_name');
var tenantTimetableName = $('#tenant_timetable_name');

$('document').ready(function()
{
	var lastCheckedTimetableCell = null;

	// Select multicheckbox with mouse move
	var timetableCellFirstClick = null;

	(function()
	{
		timetableCell.mousedown(function ()
		{
			// save the position where we will click
			timetableCellFirstClick = timetableCell.index(this);
		});

		timetableCell.mouseup(function ()
		{
			// select or unselect all the cell in the range between the timetableCellFirstClick and the current one
			var start = timetableCellFirstClick;
			var end = timetableCell.index(this);
			var ts = timetableCell.slice(Math.min(start, end), Math.max(start, end) + 1);

			if (ts.length > 1)
			{
				ts.prop('checked', !this.checked);
			}
		});

		// Select multicheckbox with click & shift
		timetableCell.click(function (e)
		{
			if (!lastCheckedTimetableCell)
			{
				lastCheckedTimetableCell = this;
				return;
			}

			if (e.shiftKey)
			{
				var start = timetableCell.index(this);
				var end = timetableCell.index(lastCheckedTimetableCell);

				timetableCell.slice(Math.min(start, end), Math.max(start, end) + 1).prop('checked', lastCheckedTimetableCell.checked);
			}

			lastCheckedTimetableCell = this;
		});
	})();

	// Select timetable 24/24 on one click
	toggleH24.change(function()
	{
		resetToggles(this);
		timetableCell.prop('checked', this.checked)
		parkingTimetableName.val('H24');
	});


	// Select timetable for the day
	toggleDay.change(function()
	{
		resetToggles(this);
		timetableCellDay.prop('checked', true);
		parkingTimetableName.val('DAY');
	});

	// Select timetable for the night
	toggleNight.change(function()
	{
		resetToggles(this);
		timetableCellNight.prop('checked', true);
		parkingTimetableName.val('NIGHT')
	});

	// Select timetable 24/24 on one click
	toggleH24Tenant.change(function()
	{
		resetTogglesTenant(this);
		timetableCellTenant.prop('checked', this.checked)
		tenantTimetableName.val('H24');
	});


	// Select timetable for the day
	toggleDayTenant.change(function()
	{
		resetTogglesTenant(this);
		timetableCellDayTenant.prop('checked', true);
		tenantTimetableName.val('DAY');
	});

	// Select timetable for the night
	toggleNightTenant.change(function()
	{
		resetTogglesTenant(this);
		timetableCellNightTenant.prop('checked', true);
		tenantTimetableName.val('NIGHT')
	});

	// Clean table
	$('#clean').click(function()
	{
		resetToggles();
		timetableCell.prop('checked', false);
	});

	// Clean table Tenant
	$('#cleanTenant').click(function()
	{
		resetTogglesTenant();
		timetableCellTenant.prop('checked', false);
	});

	// back to normal cell
	$('#back_edit').click(function()
	{
		resetToggles();
		timetableCellOriginate.prop('checked', true);
	});

	timetableCell.change(function()
	{
		toggleDay.prop('checked', false);
		toggleNight.prop('checked', false);
		toggleH24.prop('checked', false);
	});

	// var flagIsAlreadySetted = false;
	// fill a field with a json value
	// json is an array (index = day) of array of hours
	$('#confirmButtonId, #confirmButtonIdandCreate').click(function(e)
	{
		// if (flagIsAlreadySetted)
		// {
		// 	// XXX should evolve to something else that can be translated
		// 	alert('Data already submitted, please wait...');
		// 	return false;
		// }

		// we take only checked elements
		var dataHours = {};
		timetableCell.each(function()
		{
			if (!$(this).is(':checked'))
			{
				return;
			}

			if (dataHours[ this.name ] === undefined)
			{
				dataHours[ this.name ] = new Array();
			}
			dataHours[ this.name ].push(this.value);
		});

		// create an array of hours by days
		var listOutput = [];
		for (var dayNumber in dataHours)
		{
			var hoursObj = dataHours[dayNumber];
			var out = [];

			dayNumber = parseInt(dayNumber) + 1;

			var tmp = {
				day: dayNumber,
				start: null,
				end: null,
			};

			for (var hourNumber in hoursObj)
			{
				var hoursSplit = hoursObj[hourNumber].split(':');

				var time = parseInt( hoursSplit[0] );
				if( hoursSplit[1] )
				{
					time += parseInt(hoursSplit[1])/60;
				}

				if( tmp.start === null )
				{
					tmp.start = tmp.end = time;
				}
				else
				{
					if( tmp.end + 0.5 >= time )
					{
						tmp.end = time;
					}
					else
					{
						out.push(tmp);
						tmp = {
							day: dayNumber,
							start: time,
							end: time,
						};
					}
				}
			}

			out.push(tmp);

			for (var keyOut in out)
			{
				out[keyOut].end = convertFloatToTime(out[keyOut].end + 0.5);
				out[keyOut].start = convertFloatToTime(out[keyOut].start);
			}

			listOutput.push(out);
		}

		var json = JSON.stringify(listOutput);

		$("#outputData").val(json);


		//TENANT
		// we take only checked elements
		var dataHoursTenant = {};
		timetableCellTenant.each(function()
		{
			if (!$(this).is(':checked'))
			{
				return;
			}

			if (dataHoursTenant[ this.name ] === undefined)
			{
				dataHoursTenant[ this.name ] = new Array();
			}
			dataHoursTenant[ this.name ].push(this.value);
		});

		// create an array of hours by days
		var listOutputTenant = [];
		for (var dayNumberTenant in dataHoursTenant)
		{
			var hoursObjTenant = dataHoursTenant[dayNumberTenant];
			var outTenant = [];

			dayNumberTenant = parseInt(dayNumberTenant) + 1;

			var tmpTenant = {
				day: dayNumberTenant,
				start: null,
				end: null,
			};

			for (var hourNumberTenant in hoursObjTenant)
			{
				var hoursSplitTenant = hoursObjTenant[hourNumberTenant].split(':');

				var timeTenant = parseInt( hoursSplitTenant[0] );
				if( hoursSplitTenant[1] )
				{
					timeTenant += parseInt(hoursSplitTenant[1])/60;
				}

				if( tmpTenant.start === null )
				{
					tmpTenant.start = tmpTenant.end = timeTenant;
				}
				else
				{
					if( tmpTenant.end + 0.5 >= timeTenant )
					{
						tmpTenant.end = timeTenant;
					}
					else
					{
						outTenant.push(tmpTenant);
						tmpTenant = {
							day: dayNumberTenant,
							start: timeTenant,
							end: timeTenant,
						};
					}
				}
			}

			outTenant.push(tmpTenant);

			for (var keyOutTenant in outTenant)
			{
				outTenant[keyOutTenant].end = convertFloatToTime(outTenant[keyOutTenant].end + 0.5);
				outTenant[keyOutTenant].start = convertFloatToTime(outTenant[keyOutTenant].start);
			}

			listOutputTenant.push(outTenant);
		}

		var jsonTenant = JSON.stringify(listOutputTenant);

		$("#outputDataTenant").val(jsonTenant);

		// flagIsAlreadySetted = true;
	});

	var convertFloatToTime = function(time)
	{
		var hour = Math.floor(time);

		if (hour < 10)
		{
			hour = "0" + hour;
		}

		var min = time % 1 !== 0 ? '30' : '00';

		return hour + ':' + min + ':' + '00';
	}

	var resetToggles = function(element)
	{
		// save status of current elements
		var isChecked = element ? $(element).prop('checked') : false;

		parkingTimetableName.val('CUSTOM');
		// reset cells
		timetableCell.prop('checked', false);

		// reset the toggles
		toggleDay.prop('checked', false);
		toggleNight.prop('checked', false);
		toggleH24.prop('checked', false);

		// redefined the toggle value ;)
		if (element)
		{
			$(element).prop('checked', isChecked);
		}
	}

	var resetTogglesTenant = function(element)
	{
		// save status of current elements
		var isChecked = element ? $(element).prop('checked') : false;

		tenantTimetableName.val('CUSTOM');
		// reset cells
		timetableCellTenant.prop('checked', false);

		// reset the toggles
		toggleDayTenant.prop('checked', false);
		toggleNightTenant.prop('checked', false);
		toggleH24Tenant.prop('checked', false);

		// redefined the toggle value ;)
		if (element)
		{
			$(element).prop('checked', isChecked);
		}
	}
});
