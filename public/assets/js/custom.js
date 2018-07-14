
// Prise en compte des ancres internes (effet de defilement jusqu'à l'élément approprié)
$(document).ready(function () {
  //init DateTimePickers
  materialKit.initFormExtendedDatetimepickers();

  // Sliders Init
  materialKit.initSliders();
});

function scrollToMission() {
  if ($('.section-mission').length != 0) {
    $("html, body").animate({
      scrollTop: $('.section-mission').offset().top
    }, 1000);
  }
}

function scrollToContacts() {
  if ($('.section-contacts').length != 0) {
    $("html, body").animate({
      scrollTop: $('.section-contacts').offset().top
    }, 1000);
  }
}

function scrollToEquipe() {
  if ($('.section-equipe').length != 0) {
    $("html, body").animate({
      scrollTop: $('.section-equipe').offset().top
    }, 1000);
  }
}

function scrollToTemoignages() {
  if ($('.section-temoignages').length != 0) {
    $("html, body").animate({
      scrollTop: $('.section-temoignages').offset().top
    }, 1000);
  }
}

function scrollToEvenements() {
  if ($('.section-evenements').length != 0) {
    $("html, body").animate({
      scrollTop: $('.section-evenements').offset().top
    }, 1000);
  }
}

function scrollToFormations() {
  if ($('.section-formations').length != 0) {
    $("html, body").animate({
      scrollTop: $('.section-formations').offset().top
    }, 1000);
  }
}

function scrollToTop() {
  if ($('.top-div').length != 0) {
    $("html, body").animate({
      scrollTop: $('.top-div').offset().top
    }, 1000);
  }
}

$(function(){
  var $searchlink = $('#searchtoggle i');
  var $searchbar  = $('#searchbar');

  $('#searchtoggle').on('click', function(e){
    e.preventDefault();

      if(!$searchbar.is(":visible")) {
        // if invisible we switch the icon to appear collapsable
        $searchlink.removeClass('fa-search').addClass('fa-search-minus');
      } else {
        // if visible we switch the icon to appear as a toggle
        $searchlink.removeClass('fa-search-minus').addClass('fa-search');
      }

      $searchbar.slideToggle(300, function(){
        // callback after search bar animation
      });
  });

});
