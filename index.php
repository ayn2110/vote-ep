<?php require_once('_config/web_config.php'); ?>
<?php require_once('connections/Conn_PDO.php'); ?>
<?php include_once('index.model.php'); ?>
<?php include_once('include/myFunction.inc.php'); ?>
<?php
if (!isset($_SESSION)) {
   session_start();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once('template/head.tpl.php'); ?>

<body>
<?php //include('template/navigation.tpl.php'); ?>
<h1>國立勤益科技大學．<?php echo WEB_NAME; ?></h1>

   <ul class="surveys grid">
      <li class="vote-item grid-only fullSize">
         <div class="vote_Action">
            <span class="helper"></span>
               <img src="images/title.png" class="imgTitle" /><br />
               <span class="vote-country grid-only event-title">
                  <strong>自己的平台自己命名，e-Portfolio平台創意命名活動開跑囉！</strong>
               </span>
         </div>
      </li>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Event_Rule">
            <span class="helper"></span>
               <!-- <a href="http://erc.ncut.edu.tw/files/13-1032-36440.php" target="_blank"> -->
                  <img src="images/qrcode_event.png" class="imgIcon imgQRcode" />
               <!-- </a> -->
               <br />
               <span class="vote-country grid-only event-title">
                  <strong>活動辦法</strong>
               </span>
         </div>
      </li>
      <?php if ( isset($_SESSION['HCW_Username']) && !empty($_SESSION['HCW_Username']) ) { ?>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Naming">
            <span class="helper"></span>
               <img src="images/plus-box.png" class="imgIcon" height="64" /><br />
               <span class="vote-country grid-only event-title">
                  <strong>我要命名!!</strong>
               </span>
         </div>
      </li>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_logout">
            <span class="helper"></span>
               <img src="images/logout20.png" class="imgIcon" height="64" /><br />
               <span class="vote-country grid-only event-title">
                  <strong><?php echo $_SESSION['HCW_Username']; ?>已登入</strong>．
                  <strong><a href="javscript:void();">登出</a></strong>
               </span>
         </div>
      </li>
      <?php } else { ?>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_new">
            <span class="helper"></span>
            <img src="images/plus-box.png" class="imgIcon" height="64" /><br />
            <span class="vote-country grid-only event-title">
               <strong>我要命名!!</strong>
            </span>
         </div>
      </li>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_login">
            <span class="helper"></span>
               <img src="images/login17.png" class="imgIcon" height="64" /><br />
               <span class="vote-country grid-only event-title">
                  <strong>登入</strong>
               </span>
         </div>
      </li>
      <?php } ?>
      <!-- //==================================================================// -->
      <?php /* ?>
      <!-- <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Event_Rule">
            <span class="helper"></span>
               <span class="Homepage_Counter"><?php include_once('include/counter.inc.php'); ?></span>
               <span class="vote-country grid-only event-title">
                  <strong>到訪人次</strong>
               </span>
         </div>
      </li> -->
      <?php */ ?>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Lists">
            <span class="helper"></span>
            <img src="images/numbered6.png" class="imgIcon" height="64" /><br />
            <span class="vote-country grid-only event-title">
               <strong>有哪些創新的名稱？</strong>
            </span>
         </div>
      </li>
      <?php /* ?>
      <li class="vote-item grid-only">
         <a href="docs/award_2015-12-27.pdf" target="_blank">
         <div class="vote_Action ">
            <span class="helper"></span>
               <img src="images/award.png" class="imgIcon imgQRcode" />
               <span class="vote-country grid-only event-title">
                  <strong>第1批(12/26)抽出得獎名單</strong>
               </span>
         </div>
         </a>
      </li>
      <?php if ( date("Y-m-d H:i:s") >= '2015-12-27 12:30:00' ) { ?>
      <li class="vote-item grid-only">
         <a href="docs/award_2015-12-27.pdf" target="_blank">
         <div class="vote_Action ">
            <span class="helper"></span>
               <img src="images/award-02-1.png" class="imgIcon imgQRcode" />
               <span class="vote-country grid-only event-title">
                  <strong>第2批(12/27)抽出得獎名單</strong>
               </span>
         </div>
         </a>
      </li>
      <li class="vote-item grid-only">
         <a href="docs/award_2015-12-27.pdf" target="_blank">
         <div class="vote_Action ">
            <span class="helper"></span>
               <img src="images/award-02-2.png" class="imgIcon imgQRcode" />
               <span class="vote-country grid-only event-title">
                  <strong>第2批(12/27)抽出得獎名單</strong>
               </span>
         </div>
         </a>
      </li>
      <?php } ?>
      <?php if ( date("Y-m-d H:i:s") >= '2015-12-28 12:30:00' ) { ?>
         <li class="vote-item grid-only">
            <a href="docs/award_2015-12-28.pdf" target="_blank">
            <div class="vote_Action ">
               <span class="helper"></span>
                  <img src="images/award-03.png" class="imgIcon imgQRcode" />
                  <span class="vote-country grid-only event-title">
                     <strong>第3批(12/28)抽出得獎名單</strong>
                  </span>
            </div>
            </a>
         </li>
      <?php } ?>
      <li class="vote-item grid-only">
         <div class="vote_Action ">
            <span class="helper"></span>
               <img src="images/take_award.png" class="imgIcon imgQRcode" />
               <span class="vote-country grid-only event-title">
                  <strong>領獎說明</strong>
               </span>
         </div>
      </li>
      <?php */ ?>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Awards">
            <span class="helper"></span>
            <img src="images/award52.png" class="imgIcon" height="64" /><br />
            <span class="vote-country grid-only event-title">
               <strong>得獎名單1</strong>
            </span>
         </div>
      </li>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Awards_s2">
            <span class="helper"></span>
            <img src="images/award52.png" class="imgIcon" height="64" /><br />
            <span class="vote-country grid-only event-title">
               <strong>得獎名單2(3/11前領獎完畢)</strong>
            </span>
         </div>
      </li>
   </ul>

<h3>國立勤益科技大學．教務處．教學資源中心 製作</h3>

<?php include_once('template/dialog_root.tpl.php'); ?>
<?php include_once('template/scripts.tpl.php'); ?>
   <script type="text/javascript">
   </script>

</body>
</html>
