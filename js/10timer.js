var timeleft = 10;
var downloadTimer = setInterval(function(){
timeleft--;
document.getElementById("countdowntimer").textContent = timeleft;
if(timeleft <= 0) {
    clearInterval(downloadTimer);
    location.href = 'includes/logout.php'; }
},1000);