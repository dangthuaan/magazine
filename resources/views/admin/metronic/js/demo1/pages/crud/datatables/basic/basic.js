"use strict";
var KTDatatablesBasicBasic = function () {

	var initTable = function () {
		var table = $('#kt_table');

		// begin first table
		table.DataTable({
			responsive: true,

			// DOM Layout settings
			dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			lengthMenu: [5, 10, 25, 50],

			pageLength: 10,


			// Order settings
			order: [[1, 'desc']],

			headerCallback: function (thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                        <input type="checkbox" value="" class="m-group-checkable">
                        <span></span>
                    </label>`;
			},

			columnDefs: [
				{
					targets: 0,
					width: '30px',
					className: 'dt-right',
					orderable: false,
					render: function (data, type, full, meta) {
						return `
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                            <input type="checkbox" value="" class="m-checkable">
                            <span></span>
                        </label>`;
					},
				},
				{ width: 60, targets: -1 },
				{ width: 15, targets: 1 }
			],
		});


	};

	return {

		//main function to initiate the module
		init: function () {
			initTable();
		},

	};

}();

jQuery(document).ready(function () {
	KTDatatablesBasicBasic.init();
});
