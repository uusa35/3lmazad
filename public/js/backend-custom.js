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
    $('.datepicker').datepicker({
        autoclose : true,
        locale: 'ru'
    });
    $('input[name="is_merchant"]').on('click', function(e) {
        isMerchant = e.target.value;
        if (isMerchant == 1) {
            $('#group-register').removeClass('hidden');
            $('div[class*="merchant-group"]').removeClass('hidden');
        } else {
            $('#group-register').addClass('hidden');
            $('div[class*="merchant-group"]').addClass('hidden');
        }
    });
});

