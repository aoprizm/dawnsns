$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});

$(function () {
  $('.menu-trigger').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('select');
      var modal = document.getElementById(select);
      console.log(1 + 1);
      return false;
    });
  });
});
