import './bootstrap';

$(document).ready( function () {
    $('#myTable').DataTable({
        layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        }
    });
} );