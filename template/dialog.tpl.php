<div id="dialog-confirm-logout" title="你確定要登出嗎?" class="default_Hide">
   <p>
   <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
   這個動作會登出本平台, 請問是否確定?
   </p>
</div>

<div id="dialog-confirm-pause" title="系統維護中" class="default_Hide">
   <p>
   <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
   目前系統進行維護中，暫停投票。
   </p>
</div>

<div id="dialog-confirm-vote" title="進行投票" class="default_Hide">
   <p>
   <!-- <span class="ui-icon ui-icon-blank" style="float:left; margin:0 7px 20px 0;"></span> -->
   <?php echo $_SESSION['HCW_Username']; ?> 同學你好,<br/>
   每12個小時可以投票乙次，按下「確定」後即可完成投票活動，<br/>
   即可立即獲得抽獎資格，投票前數愈多，中獎機會愈大。<br/>
   <hr/>
   <?php /* ?>系統將於 12/27 12:30pm 抽出 5 名幸運的同學，並公得獎名單在活動網站上。<?php */ ?>
   提醒你：<br/>
   <?php /* ?>
   第一、二批得獎名單已抽出，領獎期限為 12/28(一) 09:00 ~ 17:30止<br/>
   第三批得獎名單將於 12/28 12:30 抽出，領獎期限為 12/28(一) 13:00 ~ 12/29(二) 13:00止<br/>
   領獎地點：圖書資訊館四樓教學資源中心辦公室，請攜帶學生證領獎。<br/>
   ※若無填寫聯資料而無法順利通知你領獎時，視為放棄領獎資格。
   <?php */ ?>
   第二階段得獎名單預計於 2016/2/21 之後抽出，<br/>如有活動延期將另行公告於活動網頁。<br/>
   ※如若聯絡資料填寫不正確而無法順利通知你領獎時，視同放棄領獎資格。
   </p>
   <form id="frmOnlyNaming" action="" method="post">
      <input type="hidden" id="VoteNumber" name="VoteNumber" value="0"/>
   </form>
</div>

<?php /* ?>
<div id="dialog-confirm-xmas" title="參加聖誕特別活動" class="default_Hide">
   <p>
   <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
   <?php echo $_SESSION['HCW_Username']; ?> 同學你好,<br/>
   <!-- 12/25 12:00 ~ 12/26 12:00 僅開放平台命名，12/26 12:00 開放投票。<br/> -->
   <!-- 按下「確定」後即可參加今日聖誕節特別活動，即可立即獲得抽獎資格。<br/>
   因參與人數未達標準 12/26 12:30pm 僅抽出2名同學，剩餘 3 名額將於明日一併抽出。<br/>
   系統將於 12/27 12:30pm 抽出 3 名幸運的同學，並公得獎名單在活動網站上。 -->
   「聖誕特別活動」，只要你進行「命名」或是「投票」活動時，一樣可以獲得抽獎資格喔。
   </p>
   <form id="frmOnlyNaming" action="" method="post">
      <input type="hidden" id="VoteNumber" name="VoteNumber" value="99999"/>
   </form>
</div>
<?php */ ?>

<!-- ================================================================================ -->
<div id="dialog-from-login" title="請先登入平台" class="default_Hide">
   <p class="validateTips">進行命名及投票前，需要先登入本平台。</p>

   <form id="frmLogin" action="" method="post">
      <fieldset>
         <p>
            <label for="Username">帳號(學號)*:</label>
            <input type="text" name="Username" id="Username" value="" class="text ui-widget-content ui-corner-all">
         </p>
         <p>
            <label for="Password">密碼(與校務行政系統學生篇相同)*:</label>
            <input type="password" name="Password" id="Password" value="" class="text ui-widget-content ui-corner-all">
         </p>

         <!-- Allow form submission with keyboard without duplicating the dialog button -->
         <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
      </fieldset>
   </form>
</div>

<div id="dialog-from-naming" title="平台命名" class="default_Hide">
   <p class="validateTips">請為新的e-Portfolio平台取一個具有創意好記的名字吧!!<br/>
      現在來看看平台的樣子吧 <a href="http://ep2.ncut.edu.tw/" target="_blank" tabindex="-1">http://ep2.ncut.edu.tw/</a><br/>
      ※每12個小時可以為平台取一個新的名字喔。<br/>
      ※每人最多可以為平台取二個名字喔！<br/>
      ※小技巧：不要取太多名稱，取一個極具創意的名稱，然後大力推廣吧！
   </p>
   <form id="frmLogin" action="" method="post">
      <fieldset>
         <p>
            <label for="Title">創意命名*:</label>
            <input type="text" name="Title" id="Title" value="" class="text ui-widget-content ui-corner-all">
         </p>
         <!-- Allow form submission with keyboard without duplicating the dialog button -->
         <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
      </fieldset>
   </form>
</div>

<div id="dialog-from-modifyMember" title="請填寫及修改聯絡資料" class="default_Hide">
   <p class="validateTips">請務必留下聯絡方式，以方便通知您領獎。<br/>
      提醒你：<br/>
      第二階段得獎名單預計於 2016/2/21 之後抽出，如有活動延期將另行公告於活動網頁。<br/>
      <?php /* ?>
      第一次得獎名單將於 12/26 12:30 抽出，領獎期限為 12/28(一) 09:00 ~ 17:30止<br/>
      第二次得獎名單將於 12/27 12:30 抽出，領獎期限為 12/28(一) 09:00 ~ 17:30止<br/>
      領獎地點：圖書資訊四樓教學資源中辦公室，請攜帶學生證。<br/>
      <?php */ ?>
      ※如若聯絡資料填寫不正確而無法順利通知你領獎時，視同放棄領獎資格。
   </p>

   <form id="frmModify" action="" method="post">
      <fieldset>
         <p>
            <label for="Mobile">行動電話* (限定11個文字):</label>
            <input type="text" name="Mobile" id="Mobile" value="<?php echo $varMobileX; ?>" class="text ui-widget-content ui-corner-all" size="11">
         </p>
         <p>
            <label for="Email">電子郵件(Email)* (限定100個字以內):</label>
            <input type="text" name="Email" id="Email" value="<?php echo $varEmailX; ?>" class="text ui-widget-content ui-corner-all" size="20">
         </p>

         <!-- Allow form submission with keyboard without duplicating the dialog button -->
         <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
      </fieldset>
   </form>
</div>

<!-- <div id="dialog-confirm-login" title="請先登入平台" class="default_Hide">
</div> -->
