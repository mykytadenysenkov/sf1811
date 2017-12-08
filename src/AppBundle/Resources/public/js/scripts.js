jQuery(document).ready(function($) {
    $.get('/app_dev.php/api/books/1', function(r) {
        console.log(r);
    }); // app_dev - temporary
    console.log('Doc ready');
});
