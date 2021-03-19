
<div class="chat_box">
<div class="chat_head">Chatbox</div>
<div class="chat_body">
<div class="user">Tedi Lesmana</div>
</div>
</div>

<div class="msg_box" style="right: 290px">
<div class="msg_head">Tedi Lesmana
<div class="close">x</div></div>
<div class="msg_wrap">
<div class="msg_body">
<div class="msg_insert"></div>
</div>
<div class="msg_footer">
<textarea rows="2" class="msg_input" placeholder="Press Enter to send Message"></textarea>
</div>
</div>
</div>
<style type="text/css" media="screen">
body {

       background-color: #16a085;

       margin: 0px;

       font-family: sans-serif;

       }



       .chat_box, .msg_box {

       cursor: pointer;

       position: fixed;

       bottom: 0px;

       right: 20px;

       background: white;

       width : 250px;

/*height: 400px;*/

       border-radius: 5px 5px 0px 0px;

       }



       .msg_box {

/*height: 350px;*/

       bottom: -5px;

       }



       .chat_head,.msg_head {

       background: #f39c12;

       padding: 15px;

       color: white;

       font-weight: bold;

       border-radius: 5px 5px 0px 0px;

/*position: fixed;*/

       }



       .chat_body {

       height: 400px;

       }



       .user {

       padding: 20px 25px;

       position: relative;

       cursor: pointer;

       }



       .user:hover {

       background: #f8f8f8;

       }



       .user:before {

       content: "";

       position: absolute;

       background-color: #2ecc71;

       width: 10px;

       height: 10px;

       left: 8px;

       top: 24px;

       border-radius: 50%;

       }



       .msg_head {

       background: #3498db;

       }



       .close {

       float: right;

       }



       .msg_body {

       height: 250px;

       font-size: 12px;

       overflow-y: auto;

       overflow-x: hidden;

       background: #bdc3c7;

       }



       .msg_input {

       border-color: transparent;

       border-top: 1px solid silver;

       width: 100%;

       box-sizing: border-box;

       -webkit-box-sizing: border-box;

       -moz-box-sizing: border-box;

       }



       .msg_a {

       margin-top: 10px;

       margin-right: 20px;

       min-height: 20px;

       padding: 15px;

       background: #99ffcc;

       margin-left: 20px;

       position: relative;

       border-radius: 5px;

       color: white;

       }



       .msg_a:before {

       content: "";

       position: absolute;

       width: 0px;

       height: 0px;

       top: 7px;

       left: -30px;

       border: 15px solid;

       border-color: transparent #99ffcc transparent transparent;

       }



       .msg_b {

       margin-top: 10px;

       width: auto;

       margin-right: 20px;

       min-height: 20px;

       padding: 15px;

       background: #ffff99;

       margin-left: 20px;

       position: relative;

       border-radius: 5px;

       color: black;

       }



       .msg_b:before {

       content: "";

       position: absolute;

       width: 0px;

       height: 0px;

       top: 7px;

       right: -30px;

       border: 15px solid;

       border-color: transparent transparent transparent #ffff99;

       }	
</style>

<script>
	$(document).ready(function() {

    $('.chat_head').click(function(){

    $('.chat_body').slideToggle('slow');

    // $('.user').slideToggle('slow');

    });



    $('.msg_head').click(function(){

    $('.msg_wrap').slideToggle('slow');

    // $('.msg_box').slideToggle('slow');

    });



    $(".close").click(function(){

    $('.msg_box').hide();

    });



    $(".user").click(function(){

    $('.msg_wrap').show();

    $('.msg_box').show();

    });



    $('textarea').keypress(function(e){

    if(e.keyCode == 13) {

    var msg = $(this).val();

    $(this).val('');

    $("<div class='msg_b'>"+msg+"</div>").insertBefore('.msg_insert');

    $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);

    }

    });

});
</script>