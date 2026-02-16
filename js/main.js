const loading = document.querySelector(".loading");
const title = document.querySelector('.subtitle');
const girl = document.querySelector('.kv-girl');
const header = document.querySelector('header');
const cta = document.querySelector('.cta')
const kvTitle = document.querySelector('.kv-title--left');
const text = document.querySelector('[data-opening-animation="text"]');
const logo = document.querySelector('[data-opening-animation="logo"]');

gsap.set(title, { autoAlpha: 0 });
gsap.set(girl, { autoAlpha: 0 });

document.addEventListener('DOMContentLoaded', function (event) {

  let elements = document.getElementsByClassName('title-text');
  for (var i = 0; i < elements.length; i++) {
    animateText(elements[i]);
  }

function animateText(element) {
  let text = element.innerText;
  element.innerText = '';

  for (var i = 0; i < text.length; i++) {
    var span = document.createElement('span');
    span.innerText = text[i];
    element.appendChild(span);
  }
}

const tl = gsap.timeline();
const titleLeft = document.querySelector('.kv-title--left')
const titleRight = document.querySelector('.kv-title--right')

if (window.matchMedia('(max-width: 767px)').matches) {
  // ウィンドウサイズ768px以下のときの処理
  tl.to(
  title, {
  delay: 0.5,
  duration: 1.33,
  autoAlpha: 1,
  })
  .to(
  girl, {
  delay: 0,
  duration: 1,
  autoAlpha: 1,
  });
} else {
  // それ以外の処理
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
}

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
      start: "center bottom",
      end: "bottom top",
      once: true
    }
  })
  .to(target,{
    autoAlpha: 1,
    y: 0,
  })
});

gsap.utils.toArray(".slide-up").forEach((target) => {
gsap.set(target,{autoAlpha: 0, y: 100})

  gsap.timeline({
      scrollTrigger: {
      trigger: target,
      start: "center bottom",
      end: "bottom top",
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

// カテゴリナビゲーション切り替え機能
document.addEventListener('DOMContentLoaded', function() {
  const categoryItems = document.querySelectorAll('.category-nav__item');
  const archiveSection = document.getElementById('archive-section');
  const mainSections = document.querySelectorAll('.company, .howto, .skillup, .money, .labor');
  
  // セクションとカテゴリナビのマッピング（5セクション・インデックス0-4）
  const sectionToCategoryMap = {
    'company': 0,   // 就活情報・市場動向・総合ニュース
    'howto': 1,     // 就活・フリーランス情報
    'skillup': 2,   // スキルアップ情報
    'money': 3,     // お金の勉強・若者向け資産運用・NISA・iDeCo
    'labor': 4      // 人生設計・ワークライフ・地域活性情報
  };

  // archiveセクションを表示する共通関数
  function showArchiveSection(e, categoryIndex) {
    if (e) {
      e.preventDefault();
    }
    
    // すべてのカテゴリからアクティブクラスを削除
    categoryItems.forEach(function(cat) {
      cat.classList.remove('category-nav__item--active');
    });
    
    // 対応するカテゴリにアクティブクラスを追加
    if (categoryIndex !== undefined && categoryItems[categoryIndex]) {
      categoryItems[categoryIndex].classList.add('category-nav__item--active');
    }
    
    // archiveセクションを表示、他のセクションを非表示
    if (archiveSection) {
      archiveSection.style.display = 'block';
    }
    mainSections.forEach(function(section) {
      section.style.display = 'none';
    });

    // ページトップにスムーススクロール
    window.scrollTo({
      top: archiveSection ? archiveSection.offsetTop - 100 : 0,
      behavior: 'smooth'
    });
  }

  // カテゴリアイテムのクリックイベント
  categoryItems.forEach(function(item, index) {
    item.addEventListener('click', function() {
      showArchiveSection(null, index);
    });
  });

  // VIEW ALL POSTSボタンのクリックイベント
  // 表示を切り替えたうえで、対応するヘッダーカテゴリをプログラムでクリックし、
  // カテゴリ用の記事読み込み・currentCatId 設定・ページネーションを有効にする
  function handleViewAllPosts(e, categoryIndex) {
    showArchiveSection(e, categoryIndex);
    if (categoryItems[categoryIndex]) {
      categoryItems[categoryIndex].click();
    }
  }

  const companyBtn = document.querySelector('.company__button');
  if (companyBtn) {
    companyBtn.addEventListener('click', function(e) {
      handleViewAllPosts(e, sectionToCategoryMap['company']);
    });
  }

  const howtoBtn = document.querySelector('.howto__button');
  if (howtoBtn) {
    howtoBtn.addEventListener('click', function(e) {
      handleViewAllPosts(e, sectionToCategoryMap['howto']);
    });
  }

  const laborBtn = document.querySelector('.labor__button');
  if (laborBtn) {
    laborBtn.addEventListener('click', function(e) {
      handleViewAllPosts(e, sectionToCategoryMap['labor']);
    });
  }

  const moneyBtn = document.querySelector('.money__button');
  if (moneyBtn) {
    moneyBtn.addEventListener('click', function(e) {
      handleViewAllPosts(e, sectionToCategoryMap['money']);
    });
  }

  const skillupBtn = document.querySelector('.skillup__button');
  if (skillupBtn) {
    skillupBtn.addEventListener('click', function(e) {
      handleViewAllPosts(e, sectionToCategoryMap['skillup']);
    });
  }
});

// Labor セクション スライダー機能
document.addEventListener('DOMContentLoaded', function() {
  const laborSlider = document.querySelector('.labor__cards');
  const laborPrevBtn = document.querySelector('.labor__nav-btn--prev');
  const laborNextBtn = document.querySelector('.labor__nav-btn--next');
  
  if (laborSlider && laborPrevBtn && laborNextBtn) {
    const cardWidth = 280;
    const gap = 24;
    const scrollAmount = cardWidth + gap;
    let currentPosition = 0;
    let currentIndex = 0; // SP用: 現在表示中のカードインデックス
    
    // カードの総数を取得
    const cards = laborSlider.querySelectorAll('.labor__card');
    const totalCards = cards.length;
    const visibleCards = 3; // PC: 一度に表示するカード数
    const maxPosition = Math.max(0, (totalCards - visibleCards) * scrollAmount);
    
    // SP判定
    function isSP() {
      return window.matchMedia('(max-width: 768px)').matches;
    }
    
    // SP用: カードの表示を更新
    function updateCardVisibility() {
      cards.forEach(function(card, index) {
        if (index === currentIndex) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    }
    
    // 次へボタン
    laborNextBtn.addEventListener('click', function() {
      if (isSP()) {
        // SP: カードを1枚ずつ切り替え
        if (currentIndex < totalCards - 1) {
          currentIndex++;
          updateCardVisibility();
        }
      } else {
        // PC: transformでスライド
        if (currentPosition < maxPosition) {
          currentPosition += scrollAmount;
          if (currentPosition > maxPosition) {
            currentPosition = maxPosition;
          }
          laborSlider.style.transform = 'translateX(-' + currentPosition + 'px)';
          laborSlider.style.transition = 'transform 0.3s ease';
        }
      }
    });
    
    // 前へボタン
    laborPrevBtn.addEventListener('click', function() {
      if (isSP()) {
        // SP: カードを1枚ずつ切り替え
        if (currentIndex > 0) {
          currentIndex--;
          updateCardVisibility();
        }
      } else {
        // PC: transformでスライド
        if (currentPosition > 0) {
          currentPosition -= scrollAmount;
          if (currentPosition < 0) {
            currentPosition = 0;
          }
          laborSlider.style.transform = 'translateX(-' + currentPosition + 'px)';
          laborSlider.style.transition = 'transform 0.3s ease';
        }
      }
    });
    
    // リサイズ時にリセット
    window.addEventListener('resize', function() {
      if (isSP()) {
        laborSlider.style.transform = '';
        currentPosition = 0;
        updateCardVisibility();
      } else {
        // PCに戻った時は全カード表示
        cards.forEach(function(card) {
          card.style.display = '';
        });
        currentIndex = 0;
      }
    });
  }
});

// ========================================
// カテゴリナビゲーション
// ========================================
document.addEventListener('DOMContentLoaded', function() {
  const categoryItems = document.querySelectorAll('.category-nav__item');
  const archiveSection = document.getElementById('archive-section');
  const archiveList = archiveSection ? archiveSection.querySelector('.archive__list') : null;
  const archivePagination = archiveSection ? archiveSection.querySelector('.archive__pagination') : null;
  const mainSections = document.querySelectorAll('.company, .howto, .skillup, .money, .labor');
  
  let currentCatId = null;
  
  if (!categoryItems.length || !archiveSection) return;
  
  // カテゴリアイテムクリック処理
  categoryItems.forEach(function(item) {
    item.addEventListener('click', function() {
      const catId = this.getAttribute('data-cat');
      
      // アクティブ状態を切り替え
      categoryItems.forEach(function(i) {
        i.classList.remove('is-active');
      });
      this.classList.add('is-active');
      
      // 他のセクションを非表示にしてarchiveセクションを表示
      mainSections.forEach(function(section) {
        section.style.display = 'none';
      });
      archiveSection.style.display = 'block';
      
      // 記事を読み込み
      currentCatId = catId;
      loadCategoryPosts(catId, 1);
    });
  });
  
  // AJAX で記事を読み込む
  function loadCategoryPosts(catId, page) {
    if (!archiveList) return;
    if (typeof ajax_object === 'undefined' || !ajax_object.ajax_url) {
      archiveList.innerHTML = '<p class="archive__error">記事の読み込みに失敗しました。</p>';
      return;
    }
    
    // ローディング表示
    archiveList.innerHTML = '<div class="archive__loading">読み込み中...</div>';
    
    const formData = new FormData();
    formData.append('action', 'load_category_posts');
    formData.append('cat_id', catId);
    formData.append('paged', page);
    
    fetch(ajax_object.ajax_url, {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        archiveList.innerHTML = data.data.html;
        if (archivePagination) {
          archivePagination.innerHTML = data.data.pagination;
          // ページネーションにイベントを追加
          bindPaginationEvents();
        }
        // archiveセクションにスクロール
        archiveSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    })
    .catch(error => {
      console.error('Error:', error);
      archiveList.innerHTML = '<p class="archive__error">記事の読み込みに失敗しました。</p>';
    });
  }
  
  // ページネーションのイベントバインド
  function bindPaginationEvents() {
    const paginationLinks = archivePagination.querySelectorAll('.archive__pagination-link');
    paginationLinks.forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const page = this.getAttribute('data-page');
        if (currentCatId && page) {
          loadCategoryPosts(currentCatId, page);
        }
      });
    });
  }
});