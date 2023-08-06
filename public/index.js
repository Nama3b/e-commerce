// // =================fader scroll=================

// const faders = document.querySelectorAll('.fade-in');
// const sliders = document.querySelectorAll('.slide-in');
// const appearOptions = {
//   threshold: 0,
// };
// const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll){
//   entries.forEach(entry => {
//     if(!entry.isIntersecting){
//       return;
//     } else{
//       entry.target.classList.add('appear');
//       appearOnScroll.unobserve(entry.target);
//     }
//   });
// }, appearOptions);

// faders.forEach(fader => {
//   appearOnScroll.observe(fader)
// });

// sliders.forEach(slider => {
//   appearOnScroll.observe(slider);
// });

// // =================active nav-link=================
// var active = document.getElementById("nav-active");
// var navLink = active.getElementsByClassName("nav-link");
// for (var i = 0; i < navLink.length; i++) {
//   navLink[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
//   current[0].className = current[0].className.replace(" active", "");
//   this.className += " active";
//   });
// }

// // =================smooth scroll=================
// $(document).ready(function(){
//   // Add smooth scrolling to all links
//   $("a").on('click', function(event) {

//     // Make sure this.hash has a value before overriding default behavior
//     if (this.hash !== "") {
//         // Prevent default anchor click behavior
//         event.preventDefault();

//         // Store hash
//         var hash = this.hash;

//         // Using jQuery's animate() method to add smooth page scroll
//         // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//         $('html, body').animate({
//             scrollTop: $(hash).offset().top
//         }, 1111, function(){

//         // Add hash (#) to URL when done scrolling (default click behavior)
//         window.location.hash = hash;
//         });
//     } // End if
//   });
// });

// fade anmation
const wrapper = document.querySelector('.wrapper')
let isMouseDown = false
let startX, scrollLeft

wrapper.addEventListener('mousedown', (e) => {
    isMouseDown = true
    startX = e.pageX - wrapper.offsetLeft
    scrollLeft = wrapper.scrollLeft
})

wrapper.addEventListener('mouseleave', () => {
    isMouseDown = false
})

wrapper.addEventListener('mouseup', () => {
    isMouseDown = false
})

wrapper.addEventListener('mousemove', (e) => {
    if (!isMouseDown) return

    const x = e.pageX - wrapper.offsetLeft
    // 3 là tốc độ scroll
    const walk = (x - startX) * 3
    wrapper.scrollLeft = scrollLeft - walk
})

// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
    interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.

$(document).ready(function () {
    const itemsMainDiv = ('.MultiCarousel');
    const itemsDiv = ('.MultiCarousel-inner');
    let itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        const condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();

    $(window).resize(function () {
        ResCarouselSize();
    });

    function ResCarouselSize() {
        let incno = 0;
        const dataItems = ("data-items");
        const itemClass = ('.item');
        let id = 0;
        let btnParentSb = '';
        let itemsSplit = '';
        const sampwidth = $(itemsMainDiv).width();
        const bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            const itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);

            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            } else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            } else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            } else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }

    function ResCarousel(e, el, s) {
        const leftBtn = ('.leftLst');
        const rightBtn = ('.rightLst');
        let translateXval = '';
        const divStyle = $(el + ' ' + itemsDiv).css('transform');
        const values = divStyle.match(/-?[\d\.]+/g);
        const xds = Math.abs(values[4]);
        if (e === 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        } else if (e === 1) {
            const itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    function click(ell, ee) {
        const Parent = "#" + $(ee).parent().attr("id");
        const slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }
});

//display password in login webpage
function showPassword() {
    const x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showPasswordSignup() {
    const x = document.getElementById("password_signup");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showPasswordRepeat() {
    const x = document.getElementById("password_repeat");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

//display password in login dashboard
function myFunction() {
    const x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// reload without refresh
$(function() {
    $.ajaxSetup({
        cache: false
    });

    $("#favorite-event").click(function() {
        $("#post-feature").load('#post-feature');
    });
});

// blocking father form doing action in my cart page
document.getElementById('updateForm').addEventListener('submit', function (event) {
    event.preventDefault();

    document.getElementById('updateForm').submit();
});
document.getElementById('deleteForm').addEventListener('submit', function (event) {
    event.preventDefault();

    document.getElementById('deleteForm').submit();
});
document.getElementById('backToProduct').addEventListener('submit', function (event) {
    event.preventDefault();

    document.getElementById('backToProduct').submit();
});
