<?php include 'loginheader.php'; ?>
<main class="bobi-max-width bobi-main uk-container-center">
    <section class="uk-width-medium-6-10">
        <nav class="bobi-feed-tab bobi-page-tab">
            <div class="bobi-feed-type-switch uk-float-right">
                <button type="button" class="uk-button uk-margin-small-left"><small>yeni</small></button>
            </div>
            <ul class="bobi-tab uk-tab uk-width-small-1-1">
                <li class="uk-active"><a href="#">Gelen Mesajlar <small><span class="no">0</span></small></a></li>
                <li><a href="#">Giden Mesajlar <small></small></a></li>
                <li><a href="#">Tüm Mesajlar <small></small></a></li>
            </ul>

        </nav>

        <div style="width:100%;height:40px;">
            <form action="/mesaj/0" class="uk-float-left" method="get"><input id="filterIndex" name="filterIndex" type="hidden" value="0"><input id="pageIndex" name="pageIndex" type="hidden" value="1">
                <input type="text" name="search" style="width:190px;" value="" placeholder="gelenlerde ara">
                <button type="submit" style="height:32px;margin-bottom:1px" class="uk-button">ara</button>
            </form>        <a href="#" class="bobi-grey-button check uk-float-right selecctall">tümünü seç</a>
            <button type="submit" style="margin-right:3px;" class="bobi-grey-button uk-float-right uk-hidden btnDeleteMessagesBulk">seçilenleri sil</button>
        </div>

        <h3 class="uk-text-center uk-text-muted">Hiç görüntülenecek mesaj yok</h3>
    </section>
</main>

</body>
</html>