$(function () {
  $('#modalopen').click(function () {
    $('#modalArea').fadeIn();
  });
  $('#closeModal , #modalBg').click(function () {
    $('#modalArea').fadeOut();
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
