document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener('scroll', function () {
    if (window.scrollY > 50) {
      document.getElementById('navbar_top').classList.add('fixed-top');
      // add padding top to show content behind navbar
      navbar_height = document.querySelector('.navbar').offsetHeight;
      document.body.style.paddingTop = navbar_height + 'px';
    } else {
      document.getElementById('navbar_top').classList.remove('fixed-top');
      // remove padding top from body
      document.body.style.paddingTop = '0';
    }
  });
});
// DOMContentLoaded  end
// Function to handle the toggle behavior of the dropdown
function toggleDropdown() {
  if ($(window).width() < 992) {
    // For mobile devices
    $('.dropdown > a').on('click', function (e) {
      e.preventDefault();
      $(this).siblings('.dropdown-menu').toggle();
    });
  } else {
    // For desktop
    $('.dropdown').hover(
      function () {
        $(this).children('.dropdown-menu').css('display', 'block');
      },
      function () {
        $(this).children('.dropdown-menu').css('display', 'none');
      }
    );
  }
}

// Call the function on page load and when the window is resized
$(document).ready(function () {
  toggleDropdown();
});

$(window).resize(function () {
  toggleDropdown();
});
