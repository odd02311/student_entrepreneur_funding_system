<?php session_start(); 
?>

<!DOCTYPE HTML>
<html>
<head>
<META HTTP-EQUIV="refresh" CONTENT="602;URL=Login.php">
<style>
p {
  text-align: center;
  font-size: 60px;
  margin-top:0px;

}
</style>
</head>
<body>

<p id="Timer"></p>

<script>
// Set the date we're counting down to
var month=new Date().getMonth()+1;
var day=new Date().getDate();
var year=new Date().getFullYear();
var hour=new Date().getHours();
var minutes=new Date().getMinutes()+10;
var second=new Date().getSeconds()+2;
var time=hour+":"+minutes+":"+second;
var ResetTime = new Date(month+" "+day+", "+year+" "+time).getTime();


var x = setInterval(function() {

  
    var now = new Date().getTime();
    
    
    var distance = ResetTime - now;
    
   
    var hour = Math.floor((distance % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
   
    document.getElementById('Timer').innerHTML = "<h1>Please Try Again in</h1>"+ minutes + "m " + seconds + "s ";
    
    
    if (distance < 0) {
        clearInterval(x);
        document.getElementById('Timer').innerHTML = "<?php session_destroy(); ?>";
    }
}, 1000);
</script>

</body>
</html>
