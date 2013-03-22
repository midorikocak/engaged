// Masonry Load
$(document).ready(function() {
$('.category').imagesLoaded(function(){
    $('.category').masonry({
      // options
      itemSelector : '.model'
    });    
});
});