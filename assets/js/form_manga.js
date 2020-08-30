const $isScanCheckbox = $('#manga_exist_scan');
const $divScans = $('#div_scans');
const $isEpisodeCheckbox = $('#manga_exist_episode');
const $divAnimes = $('#div_animes');

var $collectionHolder;
var $addEpisodeButton = $('<button type="button" class="btn btn-secondary add_anime_link" style="margin-bottom: 20px">Ajouter un épisode</button>');
var $newLinkDiv = $('<div></div>').append($addEpisodeButton);
$('fieldset').hide();
$(document).ready(function()
{
    //Scans checkbox
    $isScanCheckbox.on('click', function(e){
        if($(this).is(":checked")){
            $divScans.removeAttr('hidden');
        }
        else if($(this).is(":not(:checked)")){
            $divScans.attr('hidden', $divScans);
        }
    })

    //Anime checkbox
    $isEpisodeCheckbox.on('click', function(e){
        if($(this).is(":checked")){
            $divAnimes.removeAttr('hidden');
        }
        else if($(this).is(":not(:checked)")){
            $divAnimes.attr('hidden', $divAnimes);
        }
    })

    //Anime Collection
    $collectionHolder = $('div.animes_add');
    $collectionHolder.append($newLinkDiv);
    $collectionHolder.data('index', $collectionHolder.find('.anime').length);

    $addEpisodeButton.on('click', function(e) {
        e.preventDefault()
        addEpisodeForm($collectionHolder, $newLinkDiv);
    });

    $collectionHolder.find('.anime').each(function() {
        addAnimeFormDeleteLink($(this));
    });

    function addEpisodeForm($collectionHolder, $newlinkDiv) {
        var prototype = $collectionHolder.data('prototype');
        var index = $collectionHolder.data('index');

        var newForm = prototype;
        newForm = newForm.replace(/__name__label__/g, index);
        newForm = newForm.replace(/__name__/g, index);
        $collectionHolder.data('index', index + 1);
        var $newFormDiv = $('<div class="anime"></div>').append(newForm).append('<hr>');
        $newFormDiv.find('#manga_animes_'+index).find('.form-group').addClass('col-md-4');
        $newFormDiv.find('#manga_animes_'+index).attr('class', 'form-inline');
        $newFormDiv.find('#manga_animes_'+index).find('.form-control').attr('class', 'col-md-6');
        $newLinkDiv.before($newFormDiv);
        addAnimeFormDeleteLink($newFormDiv);
    }

    function addAnimeFormDeleteLink($newFormDiv) {
        var $removeFormButton = $('<button type="button" class="btn btn-danger">Supprimer cet anime</button>');
        $newFormDiv.append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            $newFormDiv.remove();
        });
    }

})
