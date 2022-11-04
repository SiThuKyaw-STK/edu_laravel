import * as bootstrap from "bootstrap";
import $ from 'jquery';
window.jQuery = window.$ = $;

//data table
import DataTable from 'datatables.net';
window.DataTable = DataTable;
DataTable($);



ScrollReveal().reveal('.frontend__navbar')

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

//sweetalert2
window.showToast = function (message) {
    Swal.fire({
        title : message,
        timer : 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
}
