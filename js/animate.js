$(document).ready(function(){
$( "#btn-resume" ).click(function() {
if(jQuery('.resume-detail').height()>0){
$( ".resume-detail" ).animate({
height: "0px",
}, 1500 );
}else{
$( ".resume-detail" ).animate({
height: "200px",
}, 1500 );
}
});
});