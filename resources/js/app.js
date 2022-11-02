import * as bootstrap from "bootstrap";
import $ from 'jquery';
import Swal from "sweetalert2";
window.Swal = Swal;
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
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon : 'success',
        title: message
    })
}
window.test = function (x) {
    alert(x)
}
