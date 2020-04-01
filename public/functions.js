
function runCalc(url, callbackFunc,element,str = 1){

  var updateurl = url;
  var json=JSON.stringify(str);
var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    callbackFunc(xhttp,element);
}
console.log(xhttp)
};
xhttp.open("POST", updateurl, true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("json=" + json);
}

function testPay(xhttp, element) {
  document.getElementById(element).innerHTML = xhttp.responseText;
 
}

function getPay(xhttp, element) {
  document.getElementById(element).innerHTML = xhttp.responseText;
}

function validate(ename, pay, hours){
if (ename == "") {
  alert("Please enter employee name")
  return false;
}
if (isNaN(pay) ) {
  alert("Please enter your Salary / Pay per Hour")
  return false;
}
if (isNaN(hours)) {
  alert("Please enter hours worked")
  return false;
}
return true;
}