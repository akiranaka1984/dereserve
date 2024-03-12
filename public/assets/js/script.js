function fadeAnime() {
    $('.kv_open').addClass("open");
    //ふわっと動くきっかけのクラス名と動きのクラス名の設定
    $('.fadeUpTrigger').each(function () { //fadeInUpTriggerというクラス名が
      var elemPos = $(this).offset().top; //要素より、50px上の
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight) {
        $(this).addClass('smooth');
        // 画面内に入ったらfadeInというクラス名を追記
      } else {
        $(this).removeClass('smooth');
        // 画面外に出たらfadeInというクラス名を外す
      }
    });
  } //
  // 画面が読み込まれたらすぐに動かしたい場合の記述
  $(window).on('load', function () {
    fadeAnime(); /* アニメーション用の関数を呼ぶ*/
  }); // ここまで画面が読み込まれたらすぐに動かしたい場合の記述

  function fadeAnime2() {
    //ふわっと動くきっかけのクラス名と動きのクラス名の設定
    $('.fadeUpTrigger2').each(function () { //fadeInUpTriggerというクラス名が
      var elemPos = $(this).offset().top - 20; //要素より、50px上の
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight) {
        $(this).addClass('smooth');
        // 画面内に入ったらfadeInというクラス名を追記
      } else {
        $(this).removeClass('smooth');
        // 画面外に出たらfadeInというクラス名を外す
      }
    });
  } //ここまでふわっと動くきっかけのクラス名と動きのクラス名の設定

  // 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function () {
    fadeAnime2(); /* アニメーション用の関数を呼ぶ*/
  }); // ここまで画面をスクロールをしたら動かしたい場合の記述

  function fadeUp() {
    //ふわっと動くきっかけのクラス名と動きのクラス名の設定
    $('.fadeUpTrigger3').each(function () { //fadeInUpTriggerというクラス名が
      var elemPos = $(this).offset().top - 20; //要素より、50px上の
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight) {
        $(this).addClass('fadeUp');
        // 画面内に入ったらfadeInというクラス名を追記
      } else {
        $(this).removeClass('fadeUp');
        // 画面外に出たらfadeInというクラス名を外す
      }
    });
  } //ここまでふわっと動くきっかけのクラス名と動きのクラス名の設定

  // 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function () {
    fadeUp(); /* アニメーション用の関数を呼ぶ*/
  }); // ここまで画面をスクロールをしたら動かしたい場合の記述


  //ハンバーガーメニューのアニメーション
  $(".hmb_menu").click(function () { //.btn_menuがクリックされたら
    $(this).toggleClass('active'); //.btn_menuに.activeクラスを付与する
    $('.con_menu').toggleClass('active');
  });


  //スクロールした際の動きを関数でまとめる
  function PageTopAnime() {
    var scroll = $(window).scrollTop();
    if (scroll >= 400) { //上から200pxスクロールしたら
      $('#top_reserved_btn').removeClass('DownMove'); //#page-topについているDownMoveというクラス名を除く
      $('#top_reserved_btn').addClass('UpMove'); //#page-topについているUpMoveというクラス名を付与
    } else {
      if ($('#top_reserved_btn').hasClass('UpMove')) { //すでに#page-topにUpMoveというクラス名がついていたら
        $('#top_reserved_btn').removeClass('UpMove'); //UpMoveというクラス名を除き
        $('#top_reserved_btn').addClass('DownMove'); //DownMoveというクラス名を#page-topに付与
      }
    }
  }

  // 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function () {
    PageTopAnime(); /* スクロールした際の動きの関数を呼ぶ*/
  });

  // ページが読み込まれたらすぐに動かしたい場合の記述
  $(window).on('load', function () {
    PageTopAnime(); /* スクロールした際の動きの関数を呼ぶ*/
  });


  $(document).ready(function () {
    // 共通のSlick設定を関数で定義
    function initializeSlick(sliderSelector, settings) {
      $(sliderSelector).slick(settings);
    }

    // KV アニメーション用の設定
    initializeSlick('.slider_kv', {
      fade: true,
      autoplay: true,
      autoplaySpeed: 3500,
      speed: 1000,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      pauseOnFocus: false,
      pauseOnHover: false,
      pauseOnDotsHover: false
    });

    // スマホ用：スライダーをタッチしても止めずにスライドをさせたい場合
    $('.slider_kv').on('touchmove', function () {
      $(this).slick('slickPlay');
    });

    // モデルのスライド設定
    initializeSlick('#article-slider', {
      autoplay: true,
      infinite: true,
      autoplaySpeed: 3500,
      speed: 1000,
      slidesToShow: 3,
      slidesToScroll: 3,
      prevArrow: '<div class="slick-prev"></div>',
      nextArrow: '<div class="slick-next"></div>',
      dots: false,
      responsive: [{
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        }
      }, {
        breakpoint: 431,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }]
    });

    // 別のスライド設定、異なるオートプレイスピードを持つ
    initializeSlick('#article-slider2', {
      autoplay: true,
      infinite: true,
      autoplaySpeed: 10000, // 異なるオートプレイスピード
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<div class="slick-prev"></div>',
      nextArrow: '<div class="slick-next"></div>',
      dots: false,
      responsive: [{
        breakpoint: 769,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }, {
        breakpoint: 431,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }]
    });

    // バナーのスライド設定
    initializeSlick('.banner_wrap', {
      autoplay: true,
      infinite: true,
      autoplaySpeed: 3500,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<div class="slick-prev2"></div>',
      nextArrow: '<div class="slick-next2"></div>',
      dots: false,
      responsive: [{
        breakpoint: 769,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }, {
        breakpoint: 431,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }]
    });

    // プロフィール写真のスライド設定
    initializeSlick('.plof_slider', {
      autoplay: false,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<div class="slick-prev"></div>',
      nextArrow: '<div class="slick-next"></div>',
      centerMode: true,
      variableWidth: true,
      dots: false,
    });
  });


  //検索アコーディオンをクリックした時の動作
  $('.search_title').on('click', function () { //タイトル要素をクリックしたら
    var findElm = $(this).next(".box"); //直後のアコーディオンを行うエリアを取得し
    $(findElm).slideToggle(); //アコーディオンの上下動作

    if ($(this).hasClass('close')) { //タイトル要素にクラス名closeがあれば
      $(this).removeClass('close'); //クラス名を除去し
    } else { //それ以外は
      $(this).addClass('close'); //クラス名closeを付与
    }
  });

  //ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
  $(window).on('load', function () {
    $('.accordion-area li:first-of-type section').addClass("open"); //accordion-areaのはじめのliにあるsectionにopenクラスを追加
    $(".open").each(function (index, element) { //openクラスを取得
      var Title = $(element).children('.search_title'); //openクラスの子要素のtitleクラスを取得
      $(Title).addClass('close'); //タイトルにクラス名closeを付与し
      var Box = $(element).children('.box'); //openクラスの子要素boxクラスを取得
      $(Box).slideDown(500); //アコーディオンを開く
    });
  });

  $(window).on('load', function () { //画面遷移時にギャラリーの画像が被らないように、すべての読み込みが終わった後に実行する

    //＝＝＝Muuriギャラリープラグイン設定
    var grid = new Muuri('.grid', {

      //アイテムの表示速度※オプション。入れなくても動作します
      showDuration: 600,
      showEasing: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
      hideDuration: 600,
      hideEasing: 'cubic-bezier(0.215, 0.61, 0.355, 1)',

      // アイテムの表示/非表示状態のスタイル※オプション。入れなくても動作します
      visibleStyles: {
        opacity: '1',
        transform: 'scale(1)'
      },
      hiddenStyles: {
        opacity: '0',
        transform: 'scale(0.5)'
      }
    });

    //＝＝＝並び替えボタン設定
    $('.sort-btn ul li').on('click', function () { //並び替えボタンをクリックしたら
      var className = $(this).attr("class") //クリックしたボタンのクラス名を取得
      className = className.split(' '); //「.sort-btn ul li」のクラス名を分割して配列にする
      // eslint-disable-next-line no-console
      console.log(className);

      //ボタンにクラス名activeがついている場合
      if ($(this).hasClass("active")) {
        if (className[0] != "all") { //ボタンのクラス名がallでなければ
          $(this).removeClass("active"); //activeクラスを消す
          var selectElms = $(".sort-btn ul li.active"); //ボタン内にactiveクラスがついている要素を全て取得
          if (selectElms.length == 0) { //取得した配列内にactiveクラスがついている要素がなければ
            $(".sort-btn ul li.all").addClass("active"); //ボタンallにactiveを追加し
            grid.show(''); //ギャラリーの全ての画像を表示
          } else {
            filterDo(); //取得した配列内にactiveクラスがついている要素があれば並び替えを行う
          }
        }
      }
      //ボタンにクラス名activeがついていない場合
      else {
        if (className[0] == "all") { //ボタンのクラス名にallとついていたら
          $(".sort-btn ul li").removeClass("active"); //ボタンのli要素の全てのactiveを削除し
          $(this).addClass("active"); //allにactiveクラスを付与
          grid.show(''); //ギャラリーの全ての画像を表示
        } else {
          if ($(".all").hasClass("active")) { //allクラス名にactiveクラスが付いていたら
            $(".sort-btn ul li.all").removeClass("active"); //ボタンallのactiveクラスを消し
          }
          $(this).addClass("active"); //クリックしたチェックボックスへactiveクラスを付与
          filterDo(); //並び替えを行う
        }
      }
    });

    //＝＝＝画像の並び替え設定
    function filterDo() {
      var selectElms = $(".sort-btn ul li.active"); //全てのボタンのactive要素を取得
      var selectElemAry = []; //activeクラスがついているボタンのクラス名（sortXX）を保存する配列を定義
      $.each(selectElms, function (index, selectElm) {
        var className = $(this).attr("class") //activeクラスがついている全てのボタンのクラス名（sortXX）を取得
        className = className.split(' '); //ボタンのクラス名を分割して配列にし、
        selectElemAry.push("." + className[0]); //selectElemAry配列に、チェックのついたクラス名（sortXX）を追加
      })
      str = selectElemAry.join(','); //selectElemAry配列に追加されたクラス名をカンマ区切りでテキストにして
      grid.filter(str); //grid.filter(str);のstrに代入し、ボタンのクラス名とliにつけられたクラス名が一致したら出現
    }
  });

  //採用ページタブ切り替え
  //任意のタブにURLからリンクするための設定
  function GethashID(hashIDName) {
    if (hashIDName) {
      //タブ設定
      $('.tab li').find('a').each(function () { //タブ内のaタグ全てを取得
        var idName = $(this).attr('href'); //タブ内のaタグのリンク名（例）#lunchの値を取得
        if (idName == hashIDName) { //リンク元の指定されたURLのハッシュタグ（例）http://example.com/#lunch←この#の値とタブ内のリンク名（例）#lunchが同じかをチェック
          var parentElm = $(this).parent(); //タブ内のaタグの親要素（li）を取得
          $('.tab li').removeClass("active"); //タブ内のliについているactiveクラスを取り除き
          $(parentElm).addClass("active"); //リンク元の指定されたURLのハッシュタグとタブ内のリンク名が同じであれば、liにactiveクラスを追加
          //表示させるエリア設定
          $(".area").removeClass("is-active"); //もともとついているis-activeクラスを取り除き
          $(hashIDName).addClass("is-active"); //表示させたいエリアのタブリンク名をクリックしたら、表示エリアにis-activeクラスを追加
        }
      });
    }
  }

  //タブをクリックしたら
  $('.tab a').on('click', function () {
    var idName = $(this).attr('href'); //タブ内のリンク名を取得
    GethashID(idName); //設定したタブの読み込みと
    return false; //aタグを無効にする
  });


  // 上記の動きをページが読み込まれたらすぐに動かす
  $(window).on('load', function () {
    $('.tab li:first-of-type').addClass("active"); //最初のliにactiveクラスを追加
    $('.area:first-of-type').addClass("is-active"); //最初の.areaにis-activeクラスを追加
    var hashName = location.hash; //リンク元の指定されたURLのハッシュタグを取得
    GethashID(hashName); //設定したタブの読み込み
  });


  //電話番号入力制御
  document.addEventListener('DOMContentLoaded', function() {
      var inputs = document.querySelectorAll('.tel');

      inputs.forEach(function(input) {
          input.addEventListener('input', function() {
              this.value = this.value.replace(/[^0-9]/g, '');
          });
      });
  });
