var fallmoney = true;
//global settings
var days=81;
var weekend;
var dayofyear=24;
var dayofweek=3;
var timestart = 9; //9am
var timestop = 23; //1am the next day
var hours=timestop-timestart; 
//field vars
var costinit=50000;
var seminit=costinit/2;
var deduct=0;
//per<time> vars
var peryear,persem,perday,perweek;
var timefrac,weekfrac,yearfrac;
var owedtoday,owedweek,owedyear;
//calc and set vars
function getMyTime(atime)
{
	var hours1 = atime.getHours();
	var mins,secs,msecs,dectime;
	if(hours1<timestart) hours1+=24;
	if (hours1<timestop) {
		mins = atime.getMinutes();
		secs = atime.getSeconds();
		msecs = atime.getMilliseconds();
		dectime = hours1 + mins/60 + secs/60/60 + msecs/60/60/1000;
	} else return hours;	
	return (dectime-timestart)%hours;
}
function refreshVars()
{
	peryear = costinit-deduct;
	persem = peryear/2;
	perday = persem/days;
	perhour = perday/hours;
	perweek = 5*perday;
	var curr = new Date();
	timefrac = getMyTime(curr)/hours;
	weekfrac = dayofweek/5+timefrac/5;
		if((dayofweek<0)||(dayofweek>=5)) { timefrac=1; weekfrac=1; }//weekend mod
	
	yearfrac = dayofyear/days+timefrac/days;
	owedtoday = timefrac*perday;
	owedweek = perweek*weekfrac;
	owedyear = persem*yearfrac;
	$('#today .bartotal').text('$'+perday.toFixed(2));
	$('#week .bartotal').text('$'+perweek.toFixed(0));
	$('#semester .bartotal').text('$'+persem.toFixed(0));
}
refreshVars();

$('document').ready(function(){
	$("#logo").show();
	$("button").click(function(){ //toggle the bills
		(fallmoney) ? fallmoney=false : fallmoney= true;		
		if(fallmoney) $('.fallmoney').show();
		else $('.fallmoney').hide();
	});
	$("#costinput").val(50000);
	$("#costseminput").val(25000);
	$('#deductinput').val(0);
	$("#costinput").keyup(function(){
		costinit = $("#costinput").val();
		seminit = costinit/2;
		$("#costseminput").val(seminit);
	});
	$("#costseminput").keyup(function(){
		seminit = $("#costseminput").val();
		costinit = seminit*2;
		$("#costinput").val(costinit);
	});
	$("#deductinput").keyup(function(){
		if($("#deductinput").val())
		deduct = $("#deductinput").val();
	});
	$("input").keyup(function(){
		refreshVars();
		$("#peryear").text('$'+peryear.toFixed(0));
		$("#persem").text('$'+persem.toFixed(0));
		$("#perday").text('$'+perday.toFixed(0));
		$("#perhour").text('$'+perhour.toFixed(0));
	});
	setInterval("$('#todaycount').text('$'+owedtoday.toFixed(2));$('#today span em').css('left',timefrac*200+'px');$('#weekcount').text('$'+owedweek.toFixed(2));$('#week span em').css('left',weekfrac*200+'px');$('#yearcount').text('$'+owedyear.toFixed(2));$('#semester span em').css('left',yearfrac*200+'px');$('#today .percent').text((timefrac*100).toFixed(2)+'%');$('#week .percent').text((weekfrac*100).toFixed(2)+'%');$('#semester .percent').text((yearfrac*100).toFixed(2)+'%');refreshVars();",500);	
});
