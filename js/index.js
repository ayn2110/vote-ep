(function() {
  $(function() {
    return $('[data-toggle]').on('click', function() {
      var toggle;
      toggle = $(this).addClass('active').attr('data-toggle');
      $(this).siblings('[data-toggle]').removeClass('active');
      return $('.surveys').removeClass('grid list').addClass(toggle);
    });
  });
}).call(this);

$(document).ready(function(){
   //define my function
   var funLoginForm = function(){
      $( "#dialog-from-login" ).dialog({
         resizable: false,
         width: 460,
         height: 300,
         modal: true,
         buttons: {
            "登入": function() {
               $.post( "login.php", $(this).find('form').serialize(), function(data) {
                  if ( data > 0 ) {
                     alert( "登入成功!" );
                     window.location.replace("vote.php");
                  } else {
                     alert( data );
                  }
               });
            },
            "重設": function() {
               $(this).find('form').trigger("reset");
            }
         }
      });
   };
   var funLogoutForm = function(){
      $( "#dialog-confirm-logout" ).dialog({
         resizable: false,
         height: 170,
         modal: true,
         buttons: {
            "是": function() {
               $.post( "logout.php", function(data) {
                  alert( data );
                  window.location.replace("index.php");
               });
            },
            "否": function() {
               $(this).dialog( "close" );
            }
         }
      });
   };
   var funVotePause = function(){
      $( "#dialog-confirm-pause" ).dialog({
         resizable: false,
         height: 170,
         modal: true,
         buttons: {
            "確定": function() {
               $(this).dialog( "close" );
            }
         }
      });
   };
   var funLoginPause = function(){
      $( "#dialog-login-pause" ).dialog({
         resizable: false,
         height: 170,
         modal: true,
         buttons: {
            "確定": function() {
               $(this).dialog( "close" );
            }
         }
      });
   };
   var funNamingForm = function(){
      $( "#dialog-from-naming" ).dialog({
         resizable: false,
         width: 460,
         height: 300,
         modal: true,
         buttons: {
            "送出": function() {
               $.post( "naming.php", $(this).find('form').serialize(), function(data) {
                  if ( data == 1 ) {
                     alert( "新的名稱已命名成功!" );
                     window.location.replace("vote.php");
                  } else {
                     alert( data );
                  }
               });
            },
            "清除": function() {
               $(this).find('form').trigger("reset");
            },
            "取消": function() {
               $(this).dialog( "close" );
            }
         }
      });
   };
   // 聖誕特別活動參加成功!
   var funConfirmVote = function(item_no){
      var i = parseInt(item_no,10);
      $( "#dialog-confirm-vote" ).dialog({
         resizable: false,
         width: 500,
         height: 350,
         modal: true,
         buttons: {
            "確定": function(item_no) {
               $(this).find('#VoteNumber').val(i);
               $.post( "makeVote.php", $(this).find('form').serialize(), function(data) {
                  if ( data == 1 ) {
                     alert( "投票成功!" );
                     window.location.replace("vote.php");
                  } else {
                     alert( data );
                  }
               });
            },
            "關閉": function(item_no) {
               $(this).dialog( "close" );
            }
         }
      });
   };
   var funLoginModify = function(){
      $( "#dialog-from-modifyMember" ).dialog({
         resizable: false,
         width: 550,
         height: 360,
         modal: true,
         closeOnEscape: false,
         dialogClass: 'no-close',
         buttons: {
            "儲存": function() {
               $.post( "modify.php", $(this).find('form').serialize(), function(data) {
                  if ( data == 1 ) {
                     alert( "修改成功!" );
                     window.location.replace("vote.php");
                     $(this).dialog( "close" );
                  } else {
                     alert( "修改失敗!" );
                  }
               });
            },
            "重設": function() {
               $(this).find('form').trigger("reset");
            },
            "關閉": function() {
               if ( $(this).find('#Mobile').val() === '' ) {
                  alert( "你的聯絡資料「行動電話」尚未填寫!" );
               } else if ( $(this).find('#Email').val() === '' ) {
                  alert( "你的聯絡資料「電子郵件」尚未正確!" );
               } else {
                  $(this).dialog( "close" );
               }
            }
         }
      });
   };

   //hover icon image
   $(".vote_Action_new").hover(function() {
      $(this).find('.imgIcon').attr("src","images/plus-box_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/plus-box.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      funLoginForm(); //登入
      // funLoginPause(); //暫停登入
   });

   $(".vote_Action_login").hover(function() {
      $(this).find('.imgIcon').attr("src","images/login17_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/login17.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      funLoginForm(); //登入
      // funLoginPause(); //暫停登入
   });

   $(".vote_Action_logout").hover(function() {
      $(this).find('.imgIcon').attr("src","images/logout20_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/logout20.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      funLogoutForm(); //登出
   });

   $(".vote_Action_Naming").hover(function() {
      $(this).find('.imgIcon').attr("src","images/plus-box_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/plus-box.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      funNamingForm(); //命名
   });

   $(".vote_Action_Event_Rule").hover(function() {
      $(this).find('.imgIcon').attr("src","images/qrcode_event_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/qrcode_event.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      // window.location.href = "http://erc.ncut.edu.tw/files/13-1032-36440.php";
      window.open("http://erc.ncut.edu.tw/files/13-1032-36440.php");
   });

   $(".vote_Action_Lists").hover(function() {
      $(this).find('.imgIcon').attr("src","images/numbered6_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/numbered6.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      window.location.href = "lists.php";
   });

   $(".vote_Action_Awards").hover(function() {
      $(this).find('.imgIcon').attr("src","images/award52_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/award52.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      window.location.href = "docs/award_stage_1.pdf";
   });
   $(".vote_Action_Awards_s2").hover(function() {
      $(this).find('.imgIcon').attr("src","images/award52_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/award52.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      window.location.href = "docs/award_stage_2.pdf";
   });

   $(".vote_Action_Modify").hover(function() {
      $(this).find('.imgIcon').attr("src","images/edit34_hover.png");
      $(this).parent().addClass('active-item');
   }, function() {
      $(this).find('.imgIcon').attr("src","images/edit34.png");
      $(this).parent().removeClass('active-item');
   }).click(function(){
      funLoginModify(); //修改個人聯絡資料
   });

   //click action
   // $('.add_new').click(function() {
   //    $.blockUI({ message: $('#form1'),
   //                css: {
   //                   //overlayCSS: { backgroundColor: '#00f' }
   //                   backgroundColor : '#f5f5f5'
   //                }
   //             });
   //       setTimeout($.unblockUI, 10000);
   // });
   // $('#btnClose').click(function() {
   //    $.unblockUI();
   // });
   $('.btnVote').click(function(){
      var i = parseInt($(this).attr('name'),10);
      $.post( "memberInfo.php", { name: 'memberInfo' }, function(data) {
         if ( data == 1 ) {
            funLoginModify();
         }
         else {
            funConfirmVote(i);
         }
      });
   });

   $(".action-back").click(function(event) {
      event.preventDefault();
      history.back(1);
   });

   //default
   $.post( "memberInfo.php", { name: 'memberInfo' }, function(data) {
      if ( data == 1 ) funLoginModify();
   });
});
