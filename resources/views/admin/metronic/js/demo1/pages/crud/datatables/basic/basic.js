"use strict";
var KTDatatablesBasicBasic = function () {

    var initTable = function () {
        var table = $('#kt_table');

        // begin first table
        var t = table.DataTable({
            responsive: true,

            // DOM Layout settings
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            // headerCallback: function (thead, data, start, end, display) {
            //     thead.getElementsByTagName('th')[0].innerHTML = `
            //         <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
            //             <input type="checkbox" value="" class="m-group-checkable">
            //             <span></span>
            //         </label>`;
            // },

            columnDefs: [
                {
                    targets: 0,
                    width: '5px',
                    className: 'sorting_disabled',
                    orderable: false,
                    // render: function (data, type, full, meta) {
                    //     return `
                    //     <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                    //         <input type="checkbox" value="" class="m-checkable">
                    //         <span></span>
                    //     </label>`;
                    // },
                },

                // {
                //     targets: 1,
                //     render: function (data, type, full, meta) {
                //         return meta.row + 1;
                //     },
                // }

                // {width: 60, targets: -1},
                // {width: 15, targets: 1},

                // {
                //     searchable: false,
                //     orderable: false,
                //     targets: 0,
                // }
            ],
        });

        // // //index numbered order
        // t.on('order.dt search.dt', function () {
        //     t.column(1, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
        //         cell.innerHTML = i + 1;
        //     });
        // }).draw();

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
