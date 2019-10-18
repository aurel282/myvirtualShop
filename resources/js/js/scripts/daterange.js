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

