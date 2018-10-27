/* ------------------------------------------------------------------------------
*
*  # Task list view
*
*  Specific JS code additions for task_manager_list.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

// Create an array with the values of all the input boxes in a column


$(function() {


    // Table setup
    // ------------------------------

    // Initialize data table
    $('.table_num').DataTable({
        autoWidth: false,
        dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
        language: {
            search: '<span>ค้นหา:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>แสดง:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
    
        drawCallback: function (settings) {
            
            $(".datepicker").datepicker({
                showOtherMonths: true,
                dateFormat: "d MM, y"
            });

            // Select2
            $('.select').select2({
                width: '150px',
                minimumResultsForSearch: Infinity
            });

        }
       
    });



    // External table additions
    // ------------------------------

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
    
});
