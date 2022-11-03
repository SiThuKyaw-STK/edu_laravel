import * as bootstrap from "bootstrap";
import $ from 'jquery';
window.jQuery = window.$ = $;

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
    $('#d-table-user').DataTable({
        responsive : true,
        scrollX: true,
    });
} );

window.showToast = function (message) {
    Swal.fire({
        title : message,
        timer : 5000,
        timerProgressBar: true,
    })
}

