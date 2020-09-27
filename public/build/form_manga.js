(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["form_manga"],{

/***/ "./assets/js/form_manga.js":
/*!*********************************!*\
  !*** ./assets/js/form_manga.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {__webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.replace */ "./node_modules/core-js/modules/es.string.replace.js");

var $isScanCheckbox = $('#manga_exist_scan');
var $divScans = $('#div_scans');
var $isEpisodeCheckbox = $('#manga_exist_episode');
var $divAnimes = $('#div_animes');
var $collectionHolder;
var $addEpisodeButton = $('<button type="button" class="btn btn-secondary add_anime_link" style="margin-bottom: 20px">Ajouter un épisode</button>');
var $newLinkDiv = $('<div></div>').append($addEpisodeButton);
$('fieldset').hide();
$(document).ready(function () {
  //Scans checkbox
  $isScanCheckbox.on('click', function (e) {
    if ($(this).is(":checked")) {
      $divScans.removeAttr('hidden');
    } else if ($(this).is(":not(:checked)")) {
      $divScans.attr('hidden', $divScans);
    }
  }); //Anime checkbox

  $isEpisodeCheckbox.on('click', function (e) {
    if ($(this).is(":checked")) {
      $divAnimes.removeAttr('hidden');
    } else if ($(this).is(":not(:checked)")) {
      $divAnimes.attr('hidden', $divAnimes);
    }
  }); //Anime Collection

  $collectionHolder = $('div.animes_add');
  $collectionHolder.append($newLinkDiv);
  $collectionHolder.data('index', $collectionHolder.find('.anime').length);
  $addEpisodeButton.on('click', function (e) {
    e.preventDefault();
    addEpisodeForm($collectionHolder, $newLinkDiv);
  });
  $collectionHolder.find('.anime').each(function () {
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
    $newFormDiv.find('#manga_animes_' + index).find('.form-group').addClass('col-md-4');
    $newFormDiv.find('#manga_animes_' + index).attr('class', 'form-inline');
    $newFormDiv.find('#manga_animes_' + index).find('.form-control').attr('class', 'col-md-6');
    $newLinkDiv.before($newFormDiv);
    addAnimeFormDeleteLink($newFormDiv);
  }

  function addAnimeFormDeleteLink($newFormDiv) {
    var $removeFormButton = $('<button type="button" class="btn btn-danger">Supprimer cet anime</button>');
    $newFormDiv.append($removeFormButton);
    $removeFormButton.on('click', function (e) {
      $newFormDiv.remove();
    });
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/form_manga.js","runtime","vendors~app~form_manga~manga~select2","vendors~form_manga"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvZm9ybV9tYW5nYS5qcyJdLCJuYW1lcyI6WyIkaXNTY2FuQ2hlY2tib3giLCIkIiwiJGRpdlNjYW5zIiwiJGlzRXBpc29kZUNoZWNrYm94IiwiJGRpdkFuaW1lcyIsIiRjb2xsZWN0aW9uSG9sZGVyIiwiJGFkZEVwaXNvZGVCdXR0b24iLCIkbmV3TGlua0RpdiIsImFwcGVuZCIsImhpZGUiLCJkb2N1bWVudCIsInJlYWR5Iiwib24iLCJlIiwiaXMiLCJyZW1vdmVBdHRyIiwiYXR0ciIsImRhdGEiLCJmaW5kIiwibGVuZ3RoIiwicHJldmVudERlZmF1bHQiLCJhZGRFcGlzb2RlRm9ybSIsImVhY2giLCJhZGRBbmltZUZvcm1EZWxldGVMaW5rIiwiJG5ld2xpbmtEaXYiLCJwcm90b3R5cGUiLCJpbmRleCIsIm5ld0Zvcm0iLCJyZXBsYWNlIiwiJG5ld0Zvcm1EaXYiLCJhZGRDbGFzcyIsImJlZm9yZSIsIiRyZW1vdmVGb3JtQnV0dG9uIiwicmVtb3ZlIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7QUFBQSxJQUFNQSxlQUFlLEdBQUdDLENBQUMsQ0FBQyxtQkFBRCxDQUF6QjtBQUNBLElBQU1DLFNBQVMsR0FBR0QsQ0FBQyxDQUFDLFlBQUQsQ0FBbkI7QUFDQSxJQUFNRSxrQkFBa0IsR0FBR0YsQ0FBQyxDQUFDLHNCQUFELENBQTVCO0FBQ0EsSUFBTUcsVUFBVSxHQUFHSCxDQUFDLENBQUMsYUFBRCxDQUFwQjtBQUVBLElBQUlJLGlCQUFKO0FBQ0EsSUFBSUMsaUJBQWlCLEdBQUdMLENBQUMsQ0FBQyx3SEFBRCxDQUF6QjtBQUNBLElBQUlNLFdBQVcsR0FBR04sQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQk8sTUFBakIsQ0FBd0JGLGlCQUF4QixDQUFsQjtBQUNBTCxDQUFDLENBQUMsVUFBRCxDQUFELENBQWNRLElBQWQ7QUFDQVIsQ0FBQyxDQUFDUyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUNsQjtB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N0U7QUFDQVQsZUFBVyxDQUFDd0IsTUFBWixDQUFtQkYsV0FBbkI7QUFDQU4sMEJBQXNCLENBQUNNLFdBQUQsQ0FBdEI7QUFDSDs7QUFFRCxXQUFTTixzQkFBVCxDQUFnQ00sV0FBaEMsRUFBNkM7QUFDekMsUUFBSUcsaUJBQWlCLEdBQUcvQixDQUFDLENBQUMsMkVBQUQsQ0FBekI7QUFDQTRCLGVBQVcsQ0FBQ3JCLE1BQVosQ0FBbUJ3QixpQkFBbkI7QUFFQUEscUJBQWlCLENBQUNwQixFQUFsQixDQUFxQixPQUFyQixFQUE4QixVQUFTQyxDQUFULEVBQVk7QUFDdENnQixpQkFBVyxDQUFDSSxNQUFaO0FBQ0gsS0FGRDtBQUdIO0FBRUosQ0E3REQsRSIsImZpbGUiOiJmb3JtX21hbmdhLmpzIiwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgJGlzU2NhbkNoZWNrYm94ID0gJCgnI21hbmdhX2V4aXN0X3NjYW4nKTtcbmNvbnN0ICRkaXZTY2FucyA9ICQoJyNkaXZfc2NhbnMnKTtcbmNvbnN0ICRpc0VwaXNvZGVDaGVja2JveCA9ICQoJyNtYW5nYV9leGlzdF9lcGlzb2RlJyk7XG5jb25zdCAkZGl2QW5pbWVzID0gJCgnI2Rpdl9hbmltZXMnKTtcblxudmFyICRjb2xsZWN0aW9uSG9sZGVyO1xudmFyICRhZGRFcGlzb2RlQnV0dG9uID0gJCgnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJidG4gYnRuLXNlY29uZGFyeSBhZGRfYW5pbWVfbGlua1wiIHN0eWxlPVwibWFyZ2luLWJvdHRvbTogMjBweFwiPkFqb3V0ZXIgdW4gw6lwaXNvZGU8L2J1dHRvbj4nKTtcbnZhciAkbmV3TGlua0RpdiA9ICQoJzxkaXY+PC9kaXY+JykuYXBwZW5kKCRhZGRFcGlzb2RlQnV0dG9uKTtcbiQoJ2ZpZWxkc2V0JykuaGlkZSgpO1xuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKVxue1xuICAgIC8vU2NhbnMgY2hlY2tib3hcbiAgICAkaXNTY2FuQ2hlY2tib3gub24oJ2NsaWNrJywgZnVuY3Rpb24oZSl7XG4gICAgICAgIGlmKCQodGhpcykuaXMoXCI6Y2hlY2tlZFwiKSl7XG4gICAgICAgICAgICAkZGl2U2NhbnMucmVtb3ZlQXR0cignaGlkZGVuJyk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZigkKHRoaXMpLmlzKFwiOm5vdCg6Y2hlY2tlZClcIikpe1xuICAgICAgICAgICAgJGRpdlNjYW5zLmF0dHIoJ2hpZGRlbicsICRkaXZTY2Fucyk7XG4gICAgICAgIH1cbiAgICB9KVxuXG4gICAgLy9BbmltZSBjaGVja2JveFxuICAgICRpc0VwaXNvZGVDaGVja2JveC5vbignY2xpY2snLCBmdW5jdGlvbihlKXtcbiAgICAgICAgaWYoJCh0aGlzKS5pcyhcIjpjaGVja2VkXCIpKXtcbiAgICAgICAgICAgICRkaXZBbmltZXMucmVtb3ZlQXR0cignaGlkZGVuJyk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZigkKHRoaXMpLmlzKFwiOm5vdCg6Y2hlY2tlZClcIikpe1xuICAgICAgICAgICAgJGRpdkFuaW1lcy5hdHRyKCdoaWRkZW4nLCAkZGl2QW5pbWVzKTtcbiAgICAgICAgfVxuICAgIH0pXG5cbiAgICAvL0FuaW1lIENvbGxlY3Rpb25cbiAgICAkY29sbGVjdGlvbkhvbGRlciA9ICQoJ2Rpdi5hbmltZXNfYWRkJyk7XG4gICAgJGNvbGxlY3Rpb25Ib2xkZXIuYXBwZW5kKCRuZXdMaW5rRGl2KTtcbiAgICAkY29sbGVjdGlvbkhvbGRlci5kYXRhKCdpbmRleCcsICRjb2xsZWN0aW9uSG9sZGVyLmZpbmQoJy5hbmltZScpLmxlbmd0aCk7XG5cbiAgICAkYWRkRXBpc29kZUJ1dHRvbi5vbignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKVxuICAgICAgICBhZGRFcGlzb2RlRm9ybSgkY29sbGVjdGlvbkhvbGRlciwgJG5ld0xpbmtEaXYpO1xuICAgIH0pO1xuXG4gICAgJGNvbGxlY3Rpb25Ib2xkZXIuZmluZCgnLmFuaW1lJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgYWRkQW5pbWVGb3JtRGVsZXRlTGluaygkKHRoaXMpKTtcbiAgICB9KTtcblxuICAgIGZ1bmN0aW9uIGFkZEVwaXNvZGVGb3JtKCRjb2xsZWN0aW9uSG9sZGVyLCAkbmV3bGlua0Rpdikge1xuICAgICAgICB2YXIgcHJvdG90eXBlID0gJGNvbGxlY3Rpb25Ib2xkZXIuZGF0YSgncHJvdG90eXBlJyk7XG4gICAgICAgIHZhciBpbmRleCA9ICRjb2xsZWN0aW9uSG9sZGVyLmRhdGEoJ2luZGV4Jyk7XG5cbiAgICAgICAgdmFyIG5ld0Zvcm0gPSBwcm90b3R5cGU7XG4gICAgICAgIG5ld0Zvcm0gPSBuZXdGb3JtLnJlcGxhY2UoL19fbmFtZV9fbGFiZWxfXy9nLCBpbmRleCk7XG4gICAgICAgIG5ld0Zvcm0gPSBuZXdGb3JtLnJlcGxhY2UoL19fbmFtZV9fL2csIGluZGV4KTtcbiAgICAgICAgJGNvbGxlY3Rpb25Ib2xkZXIuZGF0YSgnaW5kZXgnLCBpbmRleCArIDEpO1xuICAgICAgICB2YXIgJG5ld0Zvcm1EaXYgPSAkKCc8ZGl2IGNsYXNzPVwiYW5pbWVcIj48L2Rpdj4nKS5hcHBlbmQobmV3Rm9ybSkuYXBwZW5kKCc8aHI+Jyk7XG4gICAgICAgICRuZXdGb3JtRGl2LmZpbmQoJyNtYW5nYV9hbmltZXNfJytpbmRleCkuZmluZCgnLmZvcm0tZ3JvdXAnKS5hZGRDbGFzcygnY29sLW1kLTQnKTtcbiAgICAgICAgJG5ld0Zvcm1EaXYuZmluZCgnI21hbmdhX2FuaW1lc18nK2luZGV4KS5hdHRyKCdjbGFzcycsICdmb3JtLWlubGluZScpO1xuICAgICAgICAkbmV3Rm9ybURpdi5maW5kKCcjbWFuZ2FfYW5pbWVzXycraW5kZXgpLmZpbmQoJy5mb3JtLWNvbnRyb2wnKS5hdHRyKCdjbGFzcycsICdjb2wtbWQtNicpO1xuICAgICAgICAkbmV3TGlua0Rpdi5iZWZvcmUoJG5ld0Zvcm1EaXYpO1xuICAgICAgICBhZGRBbmltZUZvcm1EZWxldGVMaW5rKCRuZXdGb3JtRGl2KTtcbiAgICB9XG5cbiAgICBmdW5jdGlvbiBhZGRBbmltZUZvcm1EZWxldGVMaW5rKCRuZXdGb3JtRGl2KSB7XG4gICAgICAgIHZhciAkcmVtb3ZlRm9ybUJ1dHRvbiA9ICQoJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiYnRuIGJ0bi1kYW5nZXJcIj5TdXBwcmltZXIgY2V0IGFuaW1lPC9idXR0b24+Jyk7XG4gICAgICAgICRuZXdGb3JtRGl2LmFwcGVuZCgkcmVtb3ZlRm9ybUJ1dHRvbik7XG5cbiAgICAgICAgJHJlbW92ZUZvcm1CdXR0b24ub24oJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xuICAgICAgICAgICAgJG5ld0Zvcm1EaXYucmVtb3ZlKCk7XG4gICAgICAgIH0pO1xuICAgIH1cblxufSlcbiJdLCJzb3VyY2VSb290IjoiIn0=