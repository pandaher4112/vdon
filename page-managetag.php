<!-- タグ付けページ -->
<?php get_header(); ?>
<?php include('db.php'); ?>
<!-- メイン画面 (2023/03/16)  -->
<main class="tagMain" id="tag" >
    <div class="TBox">
        <p class="title"><?php the_title(); ?></p>
        <a href="../" class="Top-Link">TOPMENU</a>
        <!-- <?php the_content(); ?> -->
    </div>
    <div class="dsparea">
        <div class="scroll-box-Main">
        <ul class="tagLists">
                <li class="tagList">
                    <p class="tagLabel listNoTitle">NO</P>
                    <p class="tagLabel listNameTitle">タグ種別名</p>
                    <p class="tagLabel KeyListTitle">タグ入力欄</p>
                </li>
            </ul>
            <p class="tagTitle">メインタグ</p>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">01</P>
                    <input type="text" class="tagInp listName" name="mainT10" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT11" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT12" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT13" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT14" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT15" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT16" value=""></input>
                </li>
            </ul>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">02</P>
                    <input type="text" class="tagInp listName" name="mainT20" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT21" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT22" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT23" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT24" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT25" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT26" value=""></input>
                </li>
            </ul>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">03</P>
                    <input type="text" class="tagInp listName" name="mainT30" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT31" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT32" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT33" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT34" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT35" value=""></input>
                    <input type="text" class="tagInp KeyList" name="mainT36" value=""></input>
                </li>
            </ul>
            <p class="tagTitle">サブタグ</p>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">01</P>
                    <input type="text" class="tagInp listName" name="subT10" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT11" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT12" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT13" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT14" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT15" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT16" value=""></input>
                </li>
            </ul>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">02</P>
                    <input type="text" class="tagInp listName" name="subT20" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT21" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT22" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT23" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT24" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT25" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT26" value=""></input>
                </li>
            </ul>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">03</P>
                    <input type="text" class="tagInp listName" name="subT30" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT31" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT32" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT33" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT34" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT35" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT36" value=""></input>
                </li>
            </ul>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">04</P>
                    <input type="text" class="tagInp listName" name="subT40" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT41" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT42" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT43" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT44" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT45" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT46" value=""></input>
                </li>
            </ul>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">05</P>
                    <input type="text" class="tagInp listName" name="subT50" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT51" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT52" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT53" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT54" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT55" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT56" value=""></input>
                </li>
            </ul>
            <ul class="tagLists">
                <li class="tagList">
                    <p class="tagInp listNo">06</P>
                    <input type="text" class="tagInp listName" name="subT60" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT61" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT62" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT63" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT64" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT65" value=""></input>
                    <input type="text" class="tagInp KeyList" name="subT66" value=""></input>
                </li>
            </ul>
        </div>
    </div>
</main>
<?php get_footer(); ?>
