$(document).ready(function () {
    // This is function login with ajax

    // Function change content modal
    function modalChange() {

    } modalChange();

    //close auto alert
    // show the alert
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);

    //showing databales
    $(document).ready(function () {
        $('#table').DataTable();
    });

    $('#table-report').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });


});