// オープニングアニメーション用の要素を取得
const loading = document.querySelector(".loading");
const title = document.querySelector('.subtitle');
const girl = document.querySelector('.kv-girl');
const header = document.querySelector('header');
const asobuyouni = document.querySelector('.asobuyouni');
const sigotowosuru = document.querySelector('.sigotowosuru')
const cta = document.querySelector('.cta')
const kvTitle = document.querySelector('.kv-title--left');

const text = document.querySelector('[data-opening-animation="text"]');
const logo = document.querySelector('[data-opening-animation="logo"]');

gsap.set(title, { autoAlpha: 0 });
// gsap.set(header, { y: -100 });
gsap.set(girl, { autoAlpha: 0 });
gsap.set(asobuyouni, { autoAlpha: 0, scale: 0.8 });
gsap.set(sigotowosuru, { autoAlpha: 0, scale: 0.8 });
gsap.set(logo, { autoAlpha: 0 });

// ページ読み込み完了時にアニメーションを開始
document.addEventListener('DOMContentLoaded', function (event) {

  // js-textというクラスを取得し、elementsという変数を宣言
  let elements = document.getElementsByClassName('title-text');
  // animateTextという関数を、elementsの文字数の回数繰り返す
  for (var i = 0; i < elements.length; i++) {
    animateText(elements[i]);
  }

function animateText(element) {
  // elementの文字情報のみをtextという変数に代入
  let text = element.innerText;
  element.innerText = '';

  // textの一文字ずつをspanタグで囲う
  for (var i = 0; i < text.length; i++) {
    var span = document.createElement('span');
    span.innerText = text[i];
    element.appendChild(span);
  }
}

const tl = gsap.timeline();
const titleLeft = document.querySelector('.kv-title--left')
const titleRight = document.querySelector('.kv-title--right')

tl.to(
  titleLeft, {
}).add(() => {
    titleLeft.classList.add('is-active');
})
.to(
  titleRight, {
  delay: 0.5,
}).add(() => {
    titleRight.classList.add('is-active');
})
.to(
  title, {
  delay: 0.5,
  duration: 1.33,
  autoAlpha: 1,
}
)
.to(
  girl, {
  delay: 0,
  duration: 1,
  autoAlpha: 1,
}
);

  // GSAPタイムラインを作成
  // const tl = gsap.timeline();

  // tl.to(
  //   title, // titleのアニメーションを指定
  //   {
  //     autoAlpha: 1, // autoAlphaを1に
  //     y: 0,
  //     duration: 1.5, // 1.33秒かけて
  //     ease: "power2.inOut", // イージングを指定
  //   }
  // )
  // tl.to(
  //   girl,
  //   {
  //     autoAlpha: 1,
  //     duration: 1.33,
  //     ease: "power2.inOut",
  //   },
  //   "+=1"
  //   )
  //   .to(
  //     asobuyouni,
  //     {
  //       autoAlpha: 1,
  //       scale: 1,
  //       duration: 0.6,
  //       ease: "bounce.out",
  //     }
  //   )
  //   .to(
  //     sigotowosuru,
  //     {
  //       autoAlpha: 1,
  //       scale: 1,
  //       duration: 0.6,
  //       ease: "bounce.out",
  //     },
  //   "+=0.33"
  //   )
  //   .to(
  //     header,
  //     {
  //       y: 0,
  //     }
  //   )
  //   .to(
  //     cta,
  //     {
  //       autoAlpha: 1,
  //     }
  //   )
});

document.addEventListener('DOMContentLoaded', function() {
  const mainHeader = document.getElementById('main-header');
  const fixedHeader = document.getElementById('fixed-header');
  let lastScrollTop = 0;

  window.addEventListener('scroll', function() {
      let scrollTop = window.scrollY || document.documentElement.scrollTop;

      if (scrollTop > lastScrollTop) {
          // スクロールダウン時
          if (scrollTop > mainHeader.clientHeight) {
              fixedHeader.style.transform = 'translateY(0)';
              fixedHeader.style.opacity = '1';
          }
      } else {
          // スクロールアップ時
          if (scrollTop <= mainHeader.clientHeight) {
              fixedHeader.style.transform = 'translateY(-100%)';
              fixedHeader.style.opacity = '0';
          }
      }
      lastScrollTop = scrollTop;
  });
});

gsap.utils.toArray(".inview-title").forEach((target) => {
gsap.set(target,{autoAlpha: 0, y: 100})

  gsap.timeline({
      scrollTrigger: {
      trigger: target,
      start: "top center",
      end: "bottom top",
      once: true
    }
  })
  .to(target,{
    autoAlpha: 1,
    y: 0,
  })
});


gsap.utils.toArray(".inview").forEach((target) => {
gsap.set(target,{autoAlpha: 0, y: 100})

  gsap.timeline({
      scrollTrigger: {
      trigger: target,
      start: "top bottom",
      end: "bottom top",
      // toggleActions: "play none none reverse",
      // markers: true,
      toggleClass: {
        targets: target,
        start: "top center",
        className: "is-active",
    },
    once: true
    }
  })
  .to(target,{
    autoAlpha: 1,
    y: 0,
  })
});

gsap.utils.toArray(".inview-scale").forEach((target) => {
gsap.set(target,{autoAlpha: 0, scale: 0.5})

  gsap.timeline({
      scrollTrigger: {
      trigger: target,
      start: "top bottom",
      // end: "bottom top",
      // toggleActions: "play none none reverse",
      // markers: true,
      toggleClass: {
        targets: target,
        start: "top center",
        className: "is-active",
    },
    }
  })
  .to(target,{
    ease: 'elastic.out(1.2,0.5)',
    // duration: 1,
    autoAlpha: 1,
    scale: 1
  })
});


const memo = document.querySelector('.memo');
const concept_image = document.querySelector('.concept-image');


gsap.set(memo, { autoAlpha: 0 , scale: 0.5 });
gsap.set(concept_image, { autoAlpha: 0 , rotation: 0 , scale: 0.5});

gsap.to(
  memo,
  {
    autoAlpha: 1,
    scale: 1,
    ease: 'elastic.out(1.2,0.5)',
    duration: 1,
    scrollTrigger: {
      trigger: '#concept',
      start: 'top center',
      // toggleActions: 'play pause resume reset'
    }
  }
)
gsap.to(
  concept_image,
  {
    autoAlpha: 1,
    rotation: 0,
    scale: 1,
    ease: 'elastic.out(1.2,0.5)',
    duration: 1,
    scrollTrigger: {
      trigger: '#concept',
      start: 'top center',
      toggleClass: {
      targets: ".concept-image", // クラスを切り替える対象の要素
      className: "fuwafuwa", // クラス名 "active" を切り替える
    },
      // toggleActions: 'play pause resume reset',
    }
  }
)

var rellax = new Rellax('.rellax' , {
  breakpoints: [767, 768, 1201],
});

// フラワースクロール量操作
// jQuery( window ).bind( 'scroll', function() {
// 	scrolled = jQuery( window ).scrollTop();
// 	weight1 = 0.5;
// 	weight2 = 0.12;
// 	jQuery( '.flower' ).css( 'top', 1200 - scrolled * weight1 + 'px' );
// });

document.addEventListener("DOMContentLoaded", () => {
//   $(window).on("load", function() {
//     $('body').fadeIn(2000);
//     window.setTimeout(function(){
//     $(".asobuyouni").addClass("is-show");
//     $(".sigotowosuru").addClass("is-show");
//   }, 1500);

//   window.setTimeout(function(){
//     $("header").addClass("is-show");
//     $("#kv > .cta").addClass("is-show");
//   }, 4000);
// });

//   $(function(){
//   $(".inview").on("inview", function (event, isInView) {
//     if (isInView) {
//       $(this).stop().addClass("is-show");
//     }
//   });
// });

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