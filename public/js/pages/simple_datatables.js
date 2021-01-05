'use strict';
$(document).ready(function () {
    $('#example1').DataTable({

        "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
        "order": [
            [3, "desc"]
        ]
    });
    $('#example2').DataTable({
        "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
        "pagingType": "full_numbers"
    });
    $('#pending_table').DataTable({
        "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
        "columnDefs": [{
            "orderable": false,
            "targets": [4, 5]
        }],
        initComplete: function () {
            //this.api().columns().every(function () {
            var column = this.api().column(2);
            var select = $('<select><option></option></select>')
                .appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            column.data().unique().sort().each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>')
            });
            //});
        }
    });

    $('#completed_table').DataTable({
        "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
        "columnDefs": [{
            "orderable": false,
            "targets": [1, 2, 3, 4, 5, 6, 11, 12]
        }],
        initComplete: function () {
            //this.api().columns().every(function () {
            var column = this.api().column(2);
            var select = $('<select><option></option></select>')
                .appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            column.data().unique().sort().each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>')
            });
            //});
        }
    });


    $(".dataTables_wrapper").removeClass("form-inline");
});
