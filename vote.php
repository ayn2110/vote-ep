<?php require_once('_config/web_config.php'); ?>
<?php require_once('connections/Conn_PDO.php'); ?>
<?php require_once('include/DW_User_Authentication.inc.php'); ?>
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
<?php include('template/navigation.tpl.php'); ?>

<!-- //==================================================================// -->
   <ul class="surveys grid">
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Naming">
            <span class="helper"></span>
               <img src="images/plus-box.png" class="imgIcon" height="64" /><br />
               <span class="vote-country grid-only event-title">
                  <strong>我要命名!!</strong>
               </span>
         </div>
      </li>
      <?php /* ?>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Xmas">
            <span class="helper"></span>
               <input type="button" class="btnXmas" value="參加聖誕節特別活動"/>
               <span class="vote-country grid-only event-title">
                  <strong>聖誕節特別活動</strong>
               </span>
         </div>
      </li>
      <?php */ ?>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Modify">
            <span class="helper"></span>
               <img src="images/edit34.png" class="imgIcon" height="64" /><br />
               <span class="vote-country grid-only event-title">
                  <strong>修改個人聯絡資料</strong>
               </span>
         </div>
      </li>
      <li class="vote-item grid-only">
         <div class="vote_Action vote_Action_Reserve">
            <span class="helper"></span>
            <input type="button" value="這個位置保留" onclick="alert('就說是保留了，請別再按囉！');"/>
            <span class="vote-country grid-only event-title">
               <strong>保留</strong>
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
      <?php //if ( isset($_SESSION['HCW_Username']) && !empty($_SESSION['HCW_Username']) ) { ?>
      <?php //} ?>

      <!-- //==================================================================// -->
      <?php do { ?>
      <?php $rate = ($row_rsItem['Total']==0)?'0':ROUND($row_rsItem['Counter']/$row_rsItem['Total']*100,2); ?>
      <li class="vote-item">
         <span class="vote-country list-only">
            編號.<?php echo $row_rsItem['ItemIndex']; ?>
         </span>
         <span class="vote-name">
            <?php echo $row_rsItem['ItemName']; ?>
            <input type="button" id="btnVote" value="投票" class="list-only" />
         </span>
         <span class="vote-country grid-only">
            編號.<?php echo $row_rsItem['ItemIndex']; ?>
         </span>
         <div class="pull-right">
            <span class="vote-progress">
               <span class="vote-progress-bg">
                  <span class="vote-progress-fg" style="width: <?php echo $rate; ?>%;"></span>
               </span>
               <span class="vote-progress-labels">
                  <span class="vote-progress-label">
                     <?php echo $rate; ?>%
                  </span>
                  <span class="vote-completes">
                     <?php echo $row_rsItem['Counter']; ?> / <?php echo $row_rsItem['Total']; ?>
                  </span>
               </span>
            </span>
            <span class="vote-end-date ended">
               <?php echo $row_rsItem['ShortDateTime']; //ShowSimpleDate($row_rsItem['ShortDateTime']); ?><br />
               <span class="grid-only">
                  由 <?php echo ($row_rsItem['Username']=='erc')?$row_rsItem['PersonName']:$row_rsItem['Username']; ?> 建立。<br/>
                  <input type="button" class="btnVote" name="<?php echo $row_rsItem['ItemIndex']; ?>" value="投<?php echo $row_rsItem['ItemIndex']; ?>號一票" />
               </span>
            </span>
            <span class="vote-stage">
               <span class="stage draft">Draft</span>
               <span class="stage awarded">Awarded</span>
               <span class="stage live">Live</span>
               <span class="stage ended active">Ended</span>
            </span>
         </div>
      </li><!-- //==================================================================// -->
      <?php } while ($row_rsItem = $rsItem->fetch(PDO::FETCH_ASSOC)); ?>
      <?php /* --------------------------------------------------------------------- */ ?>
   </ul>

   <?php include_once('template/dialog.tpl.php'); ?>
   <?php include_once('template/scripts.tpl.php'); ?>
   <script type="text/javascript">
   </script>

</body>
</html>
