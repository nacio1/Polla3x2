$(document).ready(function(){
    $('.toggle-button-premio').click(function(){  
        var icon = $(this).children();   
        $(icon).toggleClass('fa-plus fa-minus');
        $('.list-group').toggle("slow", function() {
            // Animation complete.            
        });        
    })   

    if(status == 1 && !cierre) {
    
              
        var countdwon;
        // Set the date we're counting down to        
        var countDownDate = new Date(fecha_cierre).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {
            console.log('si llega menol');
            // Get today's date and time
            var now = new Date().getTime();
                
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
                
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
            // Output the result in an element with id="demo"
            if(days > 0) {
                countdwon = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            }else{
                countdwon = hours + "h "
                + minutes + "m " + seconds + "s "
            }

            $('#cierre').html(countdwon);    
                
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                $('#cierre').html("Cerrado");  
                location.reload();      
            }
        }, 1000);
        

    }
});