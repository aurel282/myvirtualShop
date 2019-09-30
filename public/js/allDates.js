var setDate;

$(document).ready(function ()
{
	var fromDate = $('#fromDate');
	var fromTime = $('#fromTime');
	var toDate = $('#toDate');
	var toTime = $('#toTime');
	var focusToDate = $('#end_date');
	var fullDate = new Date();
	var currentDate = getFormatedDate(fullDate);
	var today = new Date(currentDate);
	var definedDate = new Date(setDate);
	var tommorrow = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1 );

	// Set the datepicker that are linked to one another with calculates time and with minDate.
	$('.datepicker-besaas-linked').calendar({
		type: 'date',
		monthFirst: false,
		minDate: today,
		formatter: {
			date: function (date)
			{
				if (!date) return '';
				return getFormatedDate(date);
			}
		},
		onChange: function (date, text)
		{
			focusToDate.calendar('set date', date, updateInput = false, fireChange = false);
			focusToDate.calendar('set focusDate', date);
			toDate.val(text);
			setTimeout(function()
			{
				setDates(); // calculate the time between two dates
				toDate.trigger('change');

				if(typeof(costURL) != "undefined")
				{
					calculate_cost(costURL);
				}
			}, 100);
		}
	});

	// set an alone datepicker
	$('.datepicker-besaas').calendar({
		type: 'date',
		monthFirst: true,
		formatter: {
			date: function (date)
			{
				if (!date) return '';
				return getFormatedDate(date);
			}
		}
	});

	// set an alone datepicker with min date on today
	$('.datepicker-besaas-with-min').calendar({
		type: 'date',
		monthFirst: true,
		minDate: typeof setDate === "undefined" ? today : definedDate,
		formatter: {
			date: function (date)
			{
				if (!date) return '';
				return getFormatedDate(date);
			}
		}
	});

	// set an alone datepicker with min date on tomorrow
	$('.datepicker-besaas-with-min-tomorrow').calendar({
		type: 'date',
		monthFirst: false,
		minDate: tommorrow,
		formatter: {
			date: function (date)
			{
				if (!date) return '';
				return getFormatedDate(date);
			}
		},
	});

	// set an alone datetime with calculates time or not.
	$('.time-besaas').calendar({
		ampm: false,
		type: 'time',
		formatter: {
			time: function (date)
			{
				if (!date) return '';
				return getFormatedTime(date);
			}
		},
		onChange: function()
		{
			setTimeout(function()
			{
				if($("#totalDate").length != 0)
				{
					setDates(); // calculate the time between two dates
				}
				toTime.trigger('change');

				if(typeof(costURL) != "undefined")
				{
					calculate_cost(costURL);

				}
			}, 100);
		}
	});

	function calculate_cost(url)
	{
		var arr_data = {
			date_from:fromDate.val(),
			date_to:toDate.val(),
			time_from:fromTime.val(),
			time_to:toTime.val(),
			accessService:$('#accessService').val()
		};

		$.ajax({
			url: costURL,
			data: arr_data,
			success : function(data){
				$("#cost").text(data);
			}
		});
	}

	// return a formated date
	function getFormatedDate(date)
	{
		var day = date.getDate() + '';
		if (day.length < 2)
		{
			day = '0' + day;
		}
		var month = (date.getMonth() + 1) + '';
		if (month.length < 2)
		{
			month = '0' + month;
		}
		var year = date.getFullYear();

		return year + '-' + month + '-' + day; // Return the correcte format for the DB
	}

	// return a formated date
	function getFormatedTime(date)
	{
		var hour = date.getHours() + '';
		if (hour.length < 2)
		{
			hour = '0' + hour;
		}
		var minute = date.getMinutes() + '';
		if (minute.length < 2)
		{
			minute = '0' + minute;
		}

		return hour + ':' + minute; // Return the correcte format for the DB
	}

	fromDate.add(fromTime).add(toDate).add(toTime).change(setDates);

	function dateDiff(date1, date2)
	{
		var diff = {};
		var tmp = date2 - date1;

		tmp = Math.floor(tmp / 1000);
		diff.sec = tmp % 60;

		tmp = Math.floor((tmp - diff.sec) / 60);
		diff.min = tmp % 60;

		tmp = Math.floor((tmp - diff.min) / 60);
		diff.hour = tmp % 24;

		tmp = Math.floor((tmp - diff.hour) / 24);
		diff.day = tmp;

		return diff;
	}

	function setDates()
	{
		var fromDateTime = String(fromDate.val() + 'T' + fromTime.val());
		var toDateTime = String(toDate.val() + 'T' + toTime.val());

		date1 = new Date(fromDateTime);
		date2 = new Date(toDateTime);

		diff = dateDiff(date1, date2);

		$('#totalDate span#days').text(diff.day);
		$('#totalDate span#hours').text(diff.hour);
		$('#totalDate span#minutes').text(diff.min);
	}
});

var inputSelected;
var secondInputSelected;
var defaultRange;
var navigation; // TODO - Try to use ... AND try to fix value date

$(function() {

	// Set variable with date now
	var start = moment();
	var end = moment();

	// Add date with correct format into input seleted when you open the page and select a range
	function dateFormat(start, end, input)
	{
		input.val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
	}

	// Add date with correct format into input when you click on the button apply
	function applyDate(input)
	{
		input.on('apply.daterangepicker', function(ev, picker) {
			dateFormat(picker.startDate, picker.endDate, input);
		});
	}

	var ranges = {
		'Today': [moment(), moment()],
		'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		'This Month': [moment().startOf('month'), moment().endOf('month')],
		'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	};

	if(defaultRange !== undefined && defaultRange.length > 0)
	{
		start = ranges[defaultRange][0];
		end = ranges[defaultRange][1];
	}
	else
	{
		start = start.startOf('month');
		end = end.endOf("month");
	}

	// Display the daterange & picker menu
	function datepicker(input) {
		input.daterangepicker({
		showDropdowns: true,
		locale: {
			format: 'YYYY-MM-DD',
			separator: " - ",
			applyLabel: "Apply",
			cancelLabel: "Cancel",
		},
		ranges: ranges,
		startDate: start,
		endDate: end
		});
	}

	// datepicker(inputSelected);
	// applyDate(inputSelected);

	// If you want use a multi daterange search
	if(secondInputSelected)
	{
		datepicker(secondInputSelected);
		applyDate(secondInputSelected);
	}
});

