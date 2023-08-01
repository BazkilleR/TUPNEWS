// Set the date we're counting down to
var countDownDate = new Date("Dec 10, 2023 15:37:25").getTime();
var countDownDate1 = new Date("Dec 12, 2023 15:37:25").getTime();
var countDownDate2 = new Date("Dec 17, 2023 15:37:25").getTime();
var countDownDate3 = new Date("Mar 18, 2024 15:37:25").getTime();
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  var distance1 = countDownDate1 - now;
  var distance2 = countDownDate2 - now;
  var distance3 = countDownDate3 - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
  var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
  var days3 = Math.floor(distance3 / (1000 * 60 * 60 * 24));
    
  // Output the result in an element with id="demo"
  document.getElementById("timer").innerHTML = days + " days"
  document.getElementById("timer1").innerHTML = days1 + " days"
  document.getElementById("timer2").innerHTML = days2 + " days"
  document.getElementById("timer3").innerHTML = days3 + " days"
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);