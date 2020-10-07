const $isScanCheckbox = $('#manga_exist_scan');
const $divScans = $('#div_scans');
const $isEpisodeCheckbox = $('#manga_exist_episode');
const $divAnimes = $('#div_animes');
const $divImages = $('#div_images');

var $collectionAnimeHolder;
var $collectionImageHolder;
var $collectionImageHolderCurrent;
var $addEpisodeButton = $('<button type="button" class="btn btn-secondary add_anime_link" style="margin-bottom: 20px">Ajouter un épisode</button>');
var $newLinkAnimeDiv = $('<div></div>').append($addEpisodeButton);
var $addImageButton = $('<button type="button" class="btn btn-secondary add_image_link mt-3" style="margin-bottom: 20px">Ajouter une image</button>');
var $newLinkImageDiv = $('<div></div>').append($addImageButton);
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
    $collectionAnimeHolder = $('div.animes_add');
    $collectionAnimeHolder.append($newLinkAnimeDiv);
    $collectionAnimeHolder.data('index', $collectionAnimeHolder.find('.anime').length);
    $addEpisodeButton.on('click', function(e) {
        e.preventDefault()
        addEpisodeForm($collectionAnimeHolder, $newLinkAnimeDiv);
    });

    $collectionAnimeHolder.find('.anime').each(function() {
        addAnimeFormDeleteLink($(this));
    });

    //Image Collection
    $collectionImageHolder = $('div.images_new');
    $collectionImageHolderCurrent = $('div.images_current');
    $collectionImageHolder.append($newLinkImageDiv);
    $collectionImageHolder.data('index', ($collectionImageHolderCurrent.find('.image').length + $collectionImageHolder.find('.image').length));

    $addImageButton.on('click', function(e)
    {
        e.preventDefault();
        addImageForm($collectionImageHolder, $newLinkImageDiv);
    })

    $collectionImageHolder.find('.image').each(function() {
        addImageFormDeleteLink($(this));
    });

    //Anime functions
    function addEpisodeForm($collectionAnimeHolder, $newLinkAnimeDiv) {
        let prototype = $collectionAnimeHolder.data('prototype');
        let index = $collectionAnimeHolder.data('index');

        let newForm = prototype;
        newForm = newForm.replace(/__name__label__/g, index);
        newForm = newForm.replace(/__name__/g, index);
        $collectionAnimeHolder.data('index', index + 1);
        let $newFormDiv = $('<div class="anime"></div>').append(newForm).append('<hr>');
        $newFormDiv.find('#manga_animes_'+index).find('.form-group').addClass('col-md-4');
        $newFormDiv.find('#manga_animes_'+index).attr('class', 'form-inline');
        $newFormDiv.find('#manga_animes_'+index).find('.form-control').attr('class', 'col-md-6');
        $newLinkAnimeDiv.before($newFormDiv);
        addAnimeFormDeleteLink($newFormDiv);
    }

    function addAnimeFormDeleteLink($newFormDiv) {
        let $removeFormButton = $('<button type="button" class="btn btn-danger">Supprimer cet anime</button>');
        $newFormDiv.append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            $newFormDiv.remove();
        });
    }

    //Image functions
    function addImageForm($collectionImageHolder, $newLinkImageDiv) {
        let prototype = $collectionImageHolder.data('prototype');
        let index = $collectionImageHolder.data('index');

        let newForm = prototype;
        newForm = newForm.replace(/__name__label__/g, index);
        newForm = newForm.replace(/__name__/g, index);
        $collectionImageHolder.data('index', index + 1);
        let $newFormDiv = $('<div class="image"></div>').append(newForm).append('<hr>');
        $newFormDiv.find('#manga_images_'+index).find('label.custom-file-label').text('Choisir un fichier');
        $newLinkImageDiv.before($newFormDiv);
        addImageFormDeleteLink($newFormDiv);
    }

    function addImageFormDeleteLink($newFormDiv) {
        let $removeFormButton = $('<button type="button" class="btn btn-danger">Supprimer cette image</button>');
        $newFormDiv.append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            $newFormDiv.remove();
        });
    }
})
