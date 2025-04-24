// const toggleBtn = document.querySelector('.menu-toggle');
// const primaryMenu = document.querySelector('header .menu');

// toggleBtn.addEventListener('click', () => {
//     primaryMenu.classList.toggle('active');
//     toggleBtn.classList.toggle('active');
// });



function imageLoaded(img) {
    img.style.display = 'block';

    // Check if all images are loaded
    const container = img.closest('.loader-container');
    const images = container.querySelectorAll('.before_after img');
    let allLoaded = true;
    images.forEach(image => {
        if (!image.complete) {
            allLoaded = false;
        }
    });

    // If all images are loaded, hide the loader
    if (allLoaded) {
        const loader = container.querySelector('.loader');
        if (loader) {
            loader.style.display = 'none';
        }
    }
}

// Check if images are already loaded (for cached images)
document.querySelectorAll('.before_after img').forEach(img => {
    if (img.complete) {
        imageLoaded(img);
    }
});

$(document).ready(function(){
    $(".before_after").each(function(){
        $(this).twentytwenty();
    });
});

// $(document).ready(function() {
//     $(window).on("scroll", function() {
//         let scrollHeight = $(window).scrollTop();
//         let viewportHeight = $(window).height() * 0.2;

//         if (scrollHeight > viewportHeight) {
//             $("body").addClass("scrolled");
//         } else {
//             $("body").removeClass("scrolled");
//         }
//     });
// });

$(document).ready(function() {
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 200) {
            $("body").addClass("scrolled");
        } else {
            $("body").removeClass("scrolled");
        }
    });
});


// Accordiaon
document.addEventListener("DOMContentLoaded", function () {
    const accordions = document.querySelectorAll(".accordion-button");

    accordions.forEach((btn, index) => {
        btn.addEventListener("click", function () {
            const content = this.nextElementSibling;

            // Toggle active class for arrow rotation
            this.classList.toggle("active");

            // Check if it's already open
            if (content.classList.contains("show")) {
                content.classList.remove("show");
            } else {
                // Close all other accordions
                document.querySelectorAll(".accordion-content").forEach((item) => {
                    item.classList.remove("show");
                });

                document.querySelectorAll(".accordion-button").forEach((btn) => {
                    btn.classList.remove("active");
                });

                // Open the clicked accordion
                content.classList.add("show");
                this.classList.add("active");
            }
        });
    });
});

// -- Sidebar Menu -- //
$(document).ready(function () {
    $('.dashboard-content').addClass('open-sidebar');

    $('.sidebar-toggle').click(function () {
        if ($(window).width() > 767) {
            $('.dashboard-content').toggleClass('mini-sidebar');
        } else if ($(window).width() > 575) {
            $('.dashboard-content').toggleClass('open-sidebar mini-sidebar');
        } else {
            $('.dashboard-content').toggleClass('open-sidebar hide-sidebar');
        }
    });

    function checkWindowSize() {
        if ($(window).width() <= 575) {
            if ($('.dashboard-content').hasClass('mini-sidebar') || $('.dashboard-content').hasClass('open-sidebar')) {
                $('.dashboard-content').removeClass('mini-sidebar open-sidebar').addClass('hide-sidebar');
            }
        } else if ($(window).width() <= 767) {
            $('.dashboard-content').removeClass('open-sidebar hide-sidebar').addClass('mini-sidebar');
        } else {
            $('.dashboard-content').removeClass('mini-sidebar hide-sidebar').addClass('open-sidebar');
        }
    }

    $(window).resize(checkWindowSize);
    checkWindowSize();
});

// Portfolio Filter with Gallery
$(document).ready(function () {
    // Initialize MixItUp
    mixitup('#gallery', {
      animation: {
        duration: 500,
        effects: 'fade scale'
      }
    });

    // Initialize LightGallery
    lightGallery(document.getElementById('gallery'), {
      selector: 'a',
      plugins: [lgThumbnail, lgZoom],
      speed: 500
    });
  });
