document.addEventListener("DOMContentLoaded", () => {
  $(window).on("load", function() {
    $('body').fadeIn(2000);
    window.setTimeout(function(){
    $(".asobuyouni").addClass("is-show");
    $(".sigotowosuru").addClass("is-show");
  }, 1500);

  window.setTimeout(function(){
    $("header").addClass("is-show");
    $("#kv > .cta").addClass("is-show");
  }, 4000);
});

  $(function(){
  $(".inview").on("inview", function (event, isInView) {
    if (isInView) {
      $(this).stop().addClass("is-show");
    }
  });
});

$('header button').click(function() {
  $('header button .line').toggleClass("open");
  $('header nav').toggleClass("is-open");
});

var topBtn=$('.top-btn');
topBtn.click(function(){
  $('body,html').animate({
  scrollTop: 0},500);
  return false;
});

$('.faq-ttl').click(function(){
  $(this).next('.faq-content').slideToggle();
  $(this).toggleClass('is-active');
});
});

// アニメーションの時間とイージング
// const animTiming = {
//   duration: 300,
//   easing: "ease-in-out",
// };

gsap.fromTo('#features .cloud',
  {
    opacity: 0,
    y: 50,
  },
  {
  opacity: 1,
  y: 0,
  stagger: 0.3,
  scrollTrigger: {
    // markers: true,
    trigger: '#features',
    start: 'top center',
    toggleActions: 'play none none reverse',
    }
  }
)