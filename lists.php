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
   <span class="toggler" data-toggle="grid"><span class="action-back"></span></span>
<?php include('template/navigation.tpl.php'); ?>

<!-- //==================================================================// -->
   <ul class="surveys grid">
      <!-- //==================================================================// -->
      <?php do { ?>
      <?php $rate = ($row_rsItem['Total']==0)?'0':ROUND($row_rsItem['Counter']/$row_rsItem['Total']*100,2); ?>
      <li class="vote-item">
         <span class="vote-country list-only">
            編號.<?php echo $row_rsItem['ItemIndex']; ?>
         </span>
         <span class="vote-name">
            <?php echo $row_rsItem['ItemName']; ?>
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
                  <?php /* ?>由 <?php echo $row_rsItem['Username']; ?> 建立。<br /><?php */ ?>
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

   <?php include_once('template/dialog_root.tpl.php'); ?>
   <?php include_once('template/scripts.tpl.php'); ?>
   <script type="text/javascript">
   </script>

</body>
</html>
