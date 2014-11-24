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

    $('.related-works__item').click(function(){
        $(this).find('.work__info').addClass('is-active');
    });

    $('.exhibition').click(function(){
        $(this).find('.work__info').addClass('is-active');
    });

    $('.publication').click(function(){
        $(this).find('.work__info').addClass('is-active');
    });

    $('.work__info--button').click(function(){
        $(this).next('.work__info--description').toggleClass('is-open');
    });

    $('.work__info--close').click(function(){
        $('.work__info--description').removeClass('is-open');
    });


    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
  });

});