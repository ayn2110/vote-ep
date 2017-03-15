<div id="dialog-confirm-logout" title="你確定要登出嗎?" class="default_Hide">
   <p>
   <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
   這個動作會登出本平台, 請問是否確定?
   </p>
</div>

<div id="dialog-login-pause" title="系統暫停登入" class="default_Hide">
   <p>
   <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
   系統維護中，暫停登入。2016/1/4(一) 18:00 重新開放投票。
   </p>
</div>

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
