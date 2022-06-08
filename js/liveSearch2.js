$(document).ready(function() {

    $('#search').on('keyup', function() {
        // Memunculkan Loader
        $('.loader').show();

        $.get('js/liveSearch2.php?search=' + $('#search').val(), function(data) {
            $('table').html(data);
        });
    });

});