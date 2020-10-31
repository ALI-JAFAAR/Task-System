$(document).ready(function(){


    $('#action_menu_btn').click(function(){

      $('.action_menu').toggle();

    });
    function getCaret(el) {

        if (el.selectionStart) {

            return el.selectionStart;

        } else if (document.selection) {

            el.focus();

            var r = document.selection.createRange();

            if (r == null) {

                return 0;

            }

            var re = el.createTextRange(),

            rc = re.duplicate();
            
            re.moveToBookmark(r.getBookmark());
            
            rc.setEndPoint('EndToStart', re);
            
            return rc.text.length;
        
        }  
        
        return 0;
    
    }
    
    $("#message").keyup(function(e){
    
        if ((e.keyCode == 13 || e.keyCode == 10) && e.ctrlKey) {
    
            var content = $(this).val();
    
            var caret = getCaret(this);
    
            $(this).val(content.substring(0,caret)+"\n"+content.substring(caret,content.length));
    
            e.stopPropagation();
    
        } else if (e.keyCode == 13 || e.keyCode == 10){
    
          $("#send").click();
    
        }
    });
    $('#image_form').submit(function (event) {
        event.preventDefault();
        console.log($("#one_id").val());
          $.ajax({
              url: "action.php",
              method: "POST",
              data: new FormData(this),
              contentType: false,
              processData: false,
              success: function (data) {
                //alert(data);
                $("#msg").val("");
                console.log(data);
                location.reload();

              }
          });
        //}
    });

});