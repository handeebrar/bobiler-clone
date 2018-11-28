<?php 
include 'loginheader.php';

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
$kullanicisor->execute(array(
  'kullanici_id' => $_GET['kullaniciID']
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

$montesor=$db->prepare("SELECT * FROM monte WHERE kullanici_id=:kullanici_id" );
$montesor->execute(array(
    'kullanici_id' => $_GET['kullaniciID']
));
$say=$montesor->rowCount();
$montecek=$montesor->fetch(PDO::FETCH_ASSOC);
?>

<main class="bobi-max-width bobi-main uk-container-center">
    <div class="uk-grid">

        <div class="uk-width-medium-10-10 uk-margin-bottom">
            <img src="img/74661.jpg">
        </div>

        <section class="uk-width-medium-10-10">
            <nav class="bobi-feed-tab bobi-page-tab uk-margin-bottom">
                <form action="/kullaniciadi" id="profileform" method="get">
                    <div class="bobi-feed-type-switch uk-float-right">

                        <div>
                            <select id="drpProfileFilter" name="drpProfileFilter" style="height: 33px; background: #E8E8E8; border: 0; padding-left: 10px; -moz-appearance:window;">
                                <option selected="selected" value="0">yeniden eskiye</option>
                                <option value="1">eskiden yeniye</option>
                                <option value="2">oylara göre</option>
                            </select>
                        </div>

                    </div>

                    <ul class="bobi-tab uk-tab uk-width-small-1-1">
                        <li class="uk-active"><a href="#">MONTELER</a></li>
                        <li class=""><a href="#">ILHAM VERİCİLER</a></li>
                        <li class=""><a href="#">CROPLAR</a></li>
                        <li class=""><a href="#">SEKTÖRLER</a></li>
                        <li class=""><a href="#">ONAYSIZ</a></li>
                    </ul>
                </form>
            </nav>
        </section>

        <?php if($say == 0) { ?>
            <section class="uk-width-medium-6-10">
                <ul class="feed uk-list">
                    <li><h2 class="uk-text-center uk-text-muted">Henüz montesi yok</h2></li>
                </ul>
            </section>
            <?php } else { ?>

                <section class="uk-width-medium-6-10">
                    <!-- FEED LIST -->
                    <ul id="bobi-content-feed" class="uk-list">
                        <li id="" class="bobi-feed-monte">

                            <?php 
                            date_default_timezone_set('Europe/Istanbul');
                            function XZamanOnce($zaman){
                                $zaman = strtotime($zaman);
                                $zaman_farki = time() - $zaman;
                                $saniye = $zaman_farki;
                                $dakika = round($zaman_farki/60);
                                $saat   = round($zaman_farki/3600);
                                $gun    = round($zaman_farki/86400);
                                $hafta  = round($zaman_farki/604800);
                                $ay     = round($zaman_farki/2419200);
                                $yil    = round($zaman_farki/29030400);

                                if($saniye < 60 ){
                                    if($saniye == 0){
                                        return "az önce";
                                    }else {
                                        return $saniye .' saniye önce';
                                    }
                                }else if($dakika < 60){
                                    return $dakika.' dakika önce';
                                }else if($saat < 24){
                                    return $saat.' saat önce';
                                }else if($gun < 7){
                                    return $gun.' gün önce';
                                }else if($hafta < 4){
                                    return $hafta.' hafta önce';
                                }else if($ay < 12){
                                    return $ay.' ay önce';
                                }else{
                                    return $yil.' yıl önce';
                                }
                            }
                            ?>


                            <?php
                            $montesor=$db->prepare("SELECT * FROM monte WHERE kullanici_id=:kullanici_id ORDER BY monte_id DESC");
                            $montesor->execute(array(
                                'kullanici_id' => $_GET['kullaniciID']
                            ));
                            while($montecek=$montesor->fetch(PDO::FETCH_ASSOC)) { ?>
                                <article class="uk-grid uk-grid-small" >
                                    <address class="bobi-feed-profile uk-width-small-1-6">
                                        <a href="profil.php?kullaniciID=<?=$montecek['kullanici_id'];?>" class="uk-thumbnail uk-border-rounded">
                                            <div class="uk-thumbnail-caption uk-text-small"><?=$kullanicicek["kullanici_nick"]?></div>
                                            <div class="avatar-holder">
                                                <img src="avatar/<?= $kullanicicek['kullanici_avatar']; ?>" class="avatar uk-border-rounded">
                                            </div>
                                        </a>
                                        <div class="uk-panel uk-panel-box bobi-user-popup uk-border-rounded" style="display: none;">
                                            <div class="uk-grid uk-grid-small" style="margin-top:0">
                                                <div class="uk-width-4-6">
                                                    <h3 class="uk-panel-title uk-margin-bottom-remove">
                                                        <a href="/kullaniciadi">Kullanıcı Adı</a>
                                                    </h3>
                                                    <span class="userPopupBadge">deneyimli üye</span>
                                                    <div class="uk-grid uk-grid-small uk-grid-width-1-2 bobi-user-popup-controls uk-margin-small-top">
                                                        <div>
                                                            <button class="uk-button uk-width-1-1 btnMessageModal"><i class="uk-icon-envelope"></i> mesaj at</button>
                                                        </div>
                                                        <div>
                                                            <button class="uk-button uk-width-1-1 btnFollowUser"><i class="uk-icon-users"></i> <span>takip et</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </address>

                                    <div class="uk-width-small-5-6 bobi-feed-post">


                                        <div class="bobi-feed-headline uk-grid uk-grid-small" >
                                            <div class="uk-width-4-5 bobi-feed-headline-left">
                                                <a href="/monte/" target="_blank">
                                                    <h2 class="uk-margin-remove">
                                                        <?php echo $montecek['monte_baslik'] ?>
                                                    </h2>
                                                </a>
                                            </div>



                                            <div class="uk-width-1-5 bobi-feed-headline-right">
                                                <abbr class="timeago uk-float-right" style="line-height: 100%;font-size:12px;color:#999" title=""> <?php echo XZamanOnce($montecek['monte_zaman']);  ?></abbr>
                                            </div>
                                        </div>



                                        <figure class="bobi-feed-image postImageWrapper uk-border-rounded">
                                            <a href="/monte-detay.php" target="_blank">
                                                <div>
                                                    <img src="monte/<?php echo $montecek['monte_gorsel']; ?>">
                                                </div>
                                            </a>
                                            <figcaption class="bobi-monte-description uk-text-left">
                                                <?php echo $montecek['monte_aciklama']; ?>
                                            </figcaption>
                                        </figure>
                                        
                                        <div>

                                            <ul class="bobi-comment-list bobi-show-small">
                                                <li></li>
                                                <form action="admin/netting/islem.php" method="POST">
                                                    <li class="bobiler-feed-comment-box uk-form">
                                                        <input type="hidden" class="form-control" name="monte_id" value="<?=$montecek['monte_id'];?>"  />
                                                        <input class="uk-width-1-1" type="text" name="yorum_icerik" placeholder="yorum ekleyin..." required="">
                                                        <button type="submit" class="uk-button" name="yorumekle" value="Yorum Yap">Yorum Yap</button>

                                                        <?php 
                                                        $yorumsor=$db->prepare("SELECT * FROM yorum WHERE monte_id=:monte_id");
                                                        $yorumsor->execute(array(
                                                            'monte_id' => $montecek['monte_id']
                                                        ));

                                                        while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) { 

                                                            $kullanici_sor = $db->prepare("SELECT kullanici_nick FROM kullanici WHERE kullanici_id=:kullanici_id");
                                                            $kullanici_sor->execute(array(
                                                                'kullanici_id' => $yorumcek['kullanici_id']
                                                            ));
                                                            $kullanici_cek=$kullanici_sor->fetch(PDO::FETCH_ASSOC);

                                                            $yorumayorumsor=$db->prepare("SELECT * FROM yoruma_yorum WHERE yorum_id=:yorum_id");
                                                            $yorumayorumsor->execute(array(
                                                                'yorum_id' => $yorumcek['yorum_id']
                                                            ));

                                                            ?>
                                                            <div class="bobi-comment uk-width-9-10">
                                                                <p>
                                                                    <a href="profil.php?kullaniciID=<?=$yorumcek['kullanici_id'];?>"><strong><?=$kullanici_cek['kullanici_nick'] ?> :&nbsp;</strong></a>
                                                                    <span class="commentBody"><?=$yorumcek['yorum_icerik'] ?></span>
                                                                </p>
                                                            </div>

                                                            <?php while ($yorumayorumcek=$yorumayorumsor->fetch(PDO::FETCH_ASSOC)) {

                                                                $kullanici_sorr = $db->prepare("SELECT kullanici_nick FROM kullanici WHERE kullanici_id=:kullanici_id");
                                                                $kullanici_sorr->execute(array(
                                                                    'kullanici_id' => $yorumayorumcek['kullanici_id']
                                                                ));
                                                                $kullanici_cekk=$kullanici_sorr->fetch(PDO::FETCH_ASSOC);

                                                                ?>
                                                                <div class="bobi-comment uk-width-9-10">
                                                                    <p style="margin-top: 20px;margin-left: 50px;">
                                                                        <a href="profil.php?kullaniciID=<?=$yorumayorumcek['kullanici_id'];?>"><strong><?=$kullanici_cekk['kullanici_nick'] ?> :&nbsp;</strong></a>
                                                                        <span class="commentBody"><?=$yorumayorumcek['yoruma_yorum_icerik'] ?></span>
                                                                    </p>
                                                                </div>
                                                                <?php } ?>

                                                            </form>
                                                            <form action="admin/netting/islem.php" method="POST">
                                                                <input type="hidden" class="form-control" name="yorum_id" value="<?=$yorumcek['yorum_id'];?>"  />
                                                                <input class="uk-width-1-1" type="text" name="yoruma_yorum_icerik" placeholder="yorumu cevaplayın..." required="">
                                                                <button type="submit" class="uk-button" name="yorumayorumekle" value="Yorum Yap">Yorumu Cevapla</button>
                                                            </form>


                                                            <?php } ?>
                                                        </li>

                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </article>
                                        <?php } ?>
                                    </li>
                                </ul>
                                <img id="img-bobi-loader" style="padding-left:90px;" class="uk-align-center uk-hidden" src="/img/loading-t.gif">
                                <!-- FEED LIST END -->
                            </section>
                            <?php } ?>
                            <!-- sidebar -->
                            <section class="uk-panel uk-width-medium-4-10 bobi-right-col">
                                <div class="bobi-profile-panel uk-margin-bottom">
                                    <div class="uk-panel uk-panel-box bobi-user-popup uk-border-rounded">
                                       <div class="uk-grid uk-grid-small" style="margin-top:0">
                                          <div class="uk-width-2-6">
                                             <a href="#" class="uk-thumbnail uk-border-rounded">
                                                <img src="avatar/<?=$kullanicicek['kullanici_avatar'];?>" class="uk-border-rounded bobi-user-popup-avatar">
                                            </a>
                                        </div>

                                        <div class="uk-width-4-6">
                                         <h3 class="uk-panel-title uk-margin-bottom-remove">
                                            <a href="#"><?php echo $kullanicicek['kullanici_nick']; ?></a>
                                        </h3>

                                        <?php if ($_GET['kullaniciID'] == $_SESSION['kullanici_id']) { ?>

                                            <div class="uk-grid uk-grid-small uk-grid-width-1-2 bobi-user-popup-controls uk-margin-small-top">
                                               <div>
                                                  <a href="profilbilgilerim.php" class="uk-button uk-width-1-1"><i class="uk-icon-gear"></i> bilgilerim</a>
                                              </div>
                                          </div>
                                          <?php } ?>
                                      </div>

                                  </div>
                              </div>
                          </div>

                          <div>
                          </div>
                          <div class="bobi-panel-grey">
                            <!-- facebook -->
                            <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fbobiler&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=145176628832831" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:258px;" allowtransparency="true"></iframe>
                        </div>

                        <style>
                        .outer {
                            zoom: 1;
                            position: relative;
                            clip: auto;
                            overflow: hidden;
                        }

                        .post-title {
                            position: relative;
                            text-align: right;
                            white-space: nowrap;
                            font-size: 14px;
                            color: #000;
                            line-height: 24px;
                        }

                        .filler {
                            position: absolute;
                            left: 0;
                            right: 0;
                            border-bottom: 2px dotted #bfbfbf;
                            height: 65%;
                        }

                        .post-title-name {
                            background: #E8E8E8;
                            float: left;
                            margin-right: 20px;
                            padding-right: 3px;
                            text-wrap: normal;
                            position: relative;
                            font-size: 14px;
                            color: #000;
                            max-width: 290px;
                            overflow: hidden;
                        }

                        .post-title-name i {
                            padding-right: 3px;
                        }

                        .post-count {
                            background: #E8E8E8;
                            padding-left: 3px;
                            position: relative;
                            font-size: 14px;
                            color: #000;
                        }
                    </style>
                </div>
            </section>
        </div>
    </main>
</div>
</body>
</html>