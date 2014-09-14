$( document ).ready(function () {
    $('.work').css({opacity: 1});

    $('.menu__toogle').click(function(){
        $('.menu__toogle').toggleClass('is-open');
      $('.menu__container').toggleClass('is-open');
        $('.container').toggleClass('is-hidden');
    });

    $('.contact__toogle').click(function(){
       $('.contact__toogle').toggleClass('is-open');
       $('.contact__container').toggleClass('is-open');
       $('.container').toggleClass('is-hidden');
    });

    $('.lb-next').click(function(){
      $('.lb-next').addClass('activated');
      $('.lb-prev').addClass('activated');
    });

    $('.lb-prev').click(function(){
      $('.lb-next').addClass('activated');
      $('.lb-prev').addClass('activated');
    });

    $('.work__element').click(function(){
        $(this).next('.work__info').addClass('is-active');
    });

    $('.work__info--button').click(function(){
        $(this).next('.work__info--description').toggleClass('is-open');
    });

    $('.work__info--close').click(function(){
        $('.work__info--description').removeClass('is-open');
    });

    // function blinker() {
    //   $('#flash').fadeOut(500);
    //   $('#flash').fadeIn(500);
    // }
    // setInterval(blinker, 1000);
});