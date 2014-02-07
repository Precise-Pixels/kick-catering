var $form         = $('form'),
    $loginForm    = $('#login-form'),
    $registerForm = $('#register-form');

$form.click(function() {
    $form.removeClass('active');
    $(this).addClass('active');
});

$form.hover(function() {
    $(this).addClass('hover');
}, function() {
    $(this).removeClass('hover');
});

$(document).keyup(function(e) {
    if(e.which == 9) {
        if(activeForm() == 'login') {
            $form.removeClass('active');
            $loginForm.addClass('active');
        } else if(activeForm() == 'register') {
            $form.removeClass('active');
            $registerForm.addClass('active');
        }
    }
});

function activeForm() {
    if( $('#login-form input, #login-form a').is(':focus') ) {
        return 'login';
    } else if( $('#register-form input, #login-form a').is(':focus') ) {
        return 'register';
    }
}