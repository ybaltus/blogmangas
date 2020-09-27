const $contactForm = $('#contactForm');

$(document).ready(function()
{
    console.log("debut");

    $('#contactBtn').on('click', function(e){
        console.log("ok");
        if($contactForm.is(":hidden")){
            $contactForm.removeAttr('hidden');
        }
        else if($contactForm.is(":not(:hidden)")){
            $contactForm.attr('hidden', $contactForm);
        }
    });
})