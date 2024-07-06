// jQuery for smooth scrolling
$(document).ready(function(){
    $('a[href^="#"]').on('click', function(event) {
      var target = $(this.getAttribute('href'));
      if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
          scrollTop: target.offset().top
        }, 1000);
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-outline');
    const navMenu = document.querySelector('.nav-list');

    menuToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
    });
});

  