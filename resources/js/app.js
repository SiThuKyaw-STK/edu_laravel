import './bootstrap';
import $ from 'jquery';
window.jQuery = window.$ = $

import DataTable from 'datatables.net';
window.DataTable = DataTable;
DataTable($);

$(document).ready( function () {
    $('#d-table').DataTable({
        responsive : true,
        scrollX: true,
    });
    $('#d-table2').DataTable({
        responsive : true,
        scrollX: true,
    });
} );
