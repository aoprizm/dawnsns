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
  $('.menu-trigger').on('click', function () {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.g-list').addClass('active');
    } else {
      $('.g-list').removeClass('active');
    }
  });
});
