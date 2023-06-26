jQuery(function(){
    //swiper
    let swipeOption = {
        loop: true,
        effect: 'fade',
        autoplay: {
            delay : 4000,
            disableOnInteraction: false,
        },
        speed: 3000,
    }
    new Swiper('.swiper', swipeOption);

    //fixedheader
    jQuery(window).scroll(function(){
        var pos = jQuery('#sample').offset();
        if(jQuery(this).scrollTop() > pos.top){
            jQuery(".header").css('position', 'fixed');
        } 
        else{
            jQuery(".header").css('position', 'static');
        }
    });
    //windowLoad
    jQuery(window).on('load', function(){
        var winsize = jQuery(window).width();
        if(winsize <= 520 ){
            jQuery('.bl-topPickupNews').removeClass('fadeOut');
            jQuery('.bl-topPickupNewsItems').removeClass('dspOff');
        }
    });
    
    //WindowResize
    jQuery(window).resize(function(){
        var winsize = jQuery(window).width();
        if(winsize <= 520 ){
            jQuery('.bl-topPickupNews').removeClass('fadeOut');
            jQuery('.bl-topPickupNewsItems').removeClass('dspOff');
        }
    });

    //pickupnews
    jQuery(".el-topPickupNewsTitle").click(function(){
        var winsize = jQuery(window).width();
        if(winsize >= 521 ){
            sLideMenu()
        }
    });
    const sLideMenu = () => {
        if(jQuery('.bl-topPickupNews').hasClass("fadeOut")){
            // スライドメニューが非表示なら表示
            jQuery('.bl-topPickupNews').removeClass('fadeOut');
            jQuery('.bl-topPickupNews').addClass('fadeIn');
            jQuery('.bl-topPickupNewsItems').addClass('dspOn');
            jQuery('.bl-topPickupNewsItems').removeClass('dspOff');
        } else {
            // スライドメニューがあれば非表示
            jQuery('.bl-topPickupNewsItems').addClass('dspOff');
            jQuery('.bl-topPickupNewsItems').removeClass('dspOn');
            jQuery('.bl-topPickupNews').removeClass('fadeIn');
            jQuery('.bl-topPickupNews').addClass('fadeOut');
        }        
    }
    //page scroll
    jQuery(".bl-headerNavList a").click(function(){
        jQuery(".bl-headerNavList").each(function(i,e){
            jQuery(e).removeClass("bl-current");
        });
        var idx = jQuery(".bl-headerNavList a").index(this);
        var sTop = jQuery('body, html').scrollTop();
        console.log('番号:' + idx);
        var hash = jQuery(this).attr('href');
        if(sTop == 0){
            sTop = 160 ;
        }
        else{
            sTop = 80;
        }
        var pos = jQuery(hash).offset().top - sTop;
        // console.log('POS:' + pos + ",sTop=" + sTop);
        jQuery(".bl-headerNavList").eq(idx).addClass("bl-current");
        jQuery('body, html').animate({scrollTop: pos}, 500);
        return false
    });

    jQuery(".el-humbergarMenuNavList a").click(function(){
        jQuery(".el-humbergarMenuNavList").each(function(i,e){
            jQuery(e).removeClass("bl-current");

        });
        var sTop = jQuery('body, html').scrollTop();
        if(sTop == 0){
            sTop = 160 ;
        }
        else{
            sTop = 80;
        }
        var idx = jQuery(".el-humbergarMenuNavList a").index(this);
        var hash = jQuery(this).attr('href');
        var pos = jQuery(hash).offset().top -sTop;
        // console.log('POS:' + pos + ",sTop=" + sTop);
        jQuery('body, html').animate({scrollTop: pos}, 500);
        jQuery(".openbtn4").removeClass("active");
        jQuery(".bl-humbergarMenuNav").fadeOut();
        jQuery(".el-humbergarMenuNavList").eq(idx).addClass("bl-current");
        return false
    });

    //humbergerMenu
    jQuery(".openbtn4").click(function () {
        jQuery(this).toggleClass('active');
        jQuery(".bl-humbergarMenuNav").slideToggle();    //表示非表示の設定
    });
});
function vhover(){
    for(i=1;i<=5;i++){
        document.getElementById("La" + i).style.color="";
    }
}
function labelOut(){
    const form = document.forms.report;
    reviewNo = form.review.value;
    console.log (reviewNo);
    for(i=1;i<=reviewNo;i++){
        document.getElementById("La"+i).style.color="#f8c601";
    }

}

// 検索順位の変更設定「searchpage.php」での設定
function searchSel(){
    document.searchform.submit();
}

//ファイルを選択した際の設定「manageCont.php」での設定
function fileChg(){
    var fileChg = document.getElementById('fileToUpload');
    var fileLabel = document.getElementById('fileLabel');
    var fileName = fileChg.files[0];
    console.log (fileName.name);
    fileLabel.textContent = fileName.name;
}
   
