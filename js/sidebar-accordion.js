jQuery(document).ready(function() {
  jQuery('.button').on('click', function() {
    jQuery('.content').toggleClass('isOpen');
  });
});
