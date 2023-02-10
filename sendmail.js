$(document).ready(function(){
    
    $("#send").on('click', function(e){
        
        $("#send").text('Please Wait..');
        $("#send").attr('disabled', true);
        
        $.ajax({
                url: "sendmail.php",
            method:"POST",
                dataType:"JSON",
                data:{
                    name:$("#name").val(),
                    email:$("#email").val(),
                    phone:$("#phone").val(),
                    title:$("#title").val(),
                    message:$("#message").val()
                },
                success:function(res){
                    $("#send").text('Send Message');
                    $("#send").attr('disabled', false);
                    if (res == 1){
                        $("#status").html('Message Sent Successfully');
                    }else if(res == 0){
                        $("#status").html('Message Failed');
                    }else if(res == 2){
                        $("#status").html('Empty Fields Detected.');
                    }else if(res == 3){
                        $("#status").html('Invalid Email Address.');
                    }
                    
                },
                error: function(err){
                    
                    $('#status').html( "Network Connection Error");
                }
                });
    
        
    });
    
    });


  