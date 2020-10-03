const $contactForm = $('#contactForm');

$(document).ready(function()
{
    $('#contactBtn').on('click', function(e){
        e.preventDefault();
        $contactForm.slideDown();
        $('#contactBtn').slideUp();
    });
})