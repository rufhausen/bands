$(function() {
    $(".alert-success, .alert-info, .alert-notice").delay(2500).fadeOut('slow');

    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });

    $('#startDate').datepicker();
    $('#recordDate').datepicker();
    $('#releaseDate').datepicker();


    $('#bands_select').on('change', function() {
        this.form.submit();
    });

    $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e) {
        e.preventDefault();
        var $form = $(this);
        $('#confirm').modal({
                backdrop: 'static',
                keyboard: false
            })
            .on('click', '#delete-btn', function() {
                $form.submit();
            });
    });
});
