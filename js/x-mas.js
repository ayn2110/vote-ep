$(document).ready(function(){
   $(".btnXmas").click(function() {
      $.post( "memberInfo.php", { name: 'memberInfo' }, function(data) {
         if ( data == 1 ) {
            funLoginModify();
         }
         else {
            funOnlyXmas();
         }
      });
   });

   var funOnlyXmas = function(){
      $( "#dialog-confirm-xmas" ).dialog({
         resizable: false,
         width: 460,
         height: 300,
         modal: true,
         buttons: {
            "確定": function() {
               $.post( "makeVote.php", $(this).find('form').serialize(), function(data) {
                  if ( data == 1 ) {
                     alert( "聖誕特別活動參加成功!" );
                     window.location.replace("vote.php");
                  } else {
                     alert( data );
                  }
               });
            },
            "關閉": function() {
               $(this).dialog( "close" );
            }
         }
      });
   };

});
