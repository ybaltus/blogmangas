const $contactForm = $('#contactForm');

$(document).ready(function()
{
    $('.carousel').carousel({
        interval:2000
    });

    $('#contactBtn').on('click', function(e){
        e.preventDefault();
        $contactForm.slideDown();
        $('#contactBtn').slideUp();
    });
})