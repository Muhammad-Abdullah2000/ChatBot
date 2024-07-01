<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <link rel="stylesheet" href="bot.css">
</head>
<body>

        <div id="screen">
            <div id="header">Abdullah ChatBot</div>
          
            <div id="messageDisplaySection">
        </div>
            <div id="userInput">
                <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Abdullah type your message here." required>
                <input type="submit" value="Send" id="send" name="send">
            </div>
        </div>
    </div>
  

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
            $("#messages").on("keyup",function(){

                if($("#messages").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });
        $("#send").on("click",function(e){
            $userMessage = $("#messages").val();
            $appendUserMessage = '<div class="chat usersMessages">'+ $userMessage +'</div>';
            $("#messageDisplaySection").append($appendUserMessage);

            
            $.ajax({
                url: "bot.php",
                type: "POST",
                
                data: {messageValue: $userMessage},
                
                success: function(data){
                    
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });
    </script>
</body>
</html>