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
});

var topBtn=$('.top-btn');

topBtn.click(function(){
  $('body,html').animate({
  scrollTop: 0},500);
  return false;
});

var help_list = $('.cp_actab');
var help_list_label = $('.cp_actab label');

help_list.click(function() {
  $(this).toggleClass("is-open");
})

help_list_label.click(function() {
  parent = $(this).parent();
  parent.toggleClass("is-open");
})

  // document.querySelectorAll(".faq-content").forEach(function (el) {
  //   const summary = el.querySelector(".faq-q");
  //   const answer = el.querySelector(".faq-a");
  //   summary.addEventListener("click", (event) => {
  //     // デフォルトの挙動を無効化
  //     event.preventDefault();
  //     // detailsのopen属性を判定
  //     if (el.getAttribute("open") !== null) {
  //       // アコーディオンを閉じるときの処理
  //       const closingAnim = answer.animate(closingAnimation(answer), animTiming);

  //       closingAnim.onfinish = () => {
  //         // アニメーションの完了後にopen属性を取り除く
  //         el.removeAttribute("open");
  //       };
  //     } else {
  //       // open属性を付与
  //       el.setAttribute("open", "true");
  //       // アコーディオンを開くときの処理
  //       const openingAnim = answer.animate(openingAnimation(answer), animTiming);
  //     }
  //   });
  // });
});

// アニメーションの時間とイージング
const animTiming = {
  duration: 300,
  easing: "ease-in-out",
};
