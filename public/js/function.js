$(function() {
    $('#vegas').vegas({
        slides: [
            { src: '../baby.jpg' },
            { src: '../baby.jpg' },
            // { src: './img/image1111.png' },
            // { src: './img/image11.png' }
        ],
        // overlay: './js/overlays/02.png', //フォルダ『overlays』の中からオーバーレイのパターン画像を選択
        transition: 'fade', //スライドを遷移させる際のアニメーション
        transitionDuration: 4000, //スライドの遷移アニメーションの時間
        // delay: 10000, //スライド切り替え時の遅延時間
        animation: 'random', //スライド表示中のアニメーション
        animationDuration: 11000, //スライド表示中のアニメーションの時間
    });
    
    
    $('#vegass').vegas({
        slides: [
            { src: '../baby.jpg' },
            { src: '../baby.jpg' },
            // { src: './img/image1111.png' },
            // { src: './img/image11.png' }
        ],
        // overlay: './js/overlays/02.png', //フォルダ『overlays』の中からオーバーレイのパターン画像を選択
        transition: 'fade', //スライドを遷移させる際のアニメーション
        transitionDuration: 4000, //スライドの遷移アニメーションの時間
        // delay: 10000, //スライド切り替え時の遅延時間
        animation: 'random', //スライド表示中のアニメーション
        animationDuration: 11000, //スライド表示中のアニメーションの時間
    });

});
