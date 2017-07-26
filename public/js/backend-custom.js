/**
 * Created by usamaahmed on 5/18/17.
 */

$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": [[0, "desc"]],
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        "bAutoWidth": true
    });
});

