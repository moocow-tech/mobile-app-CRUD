function showHint(str, element) {
    if (str.length == 0) {
        document.getElementById(element).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(element).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "hint.php?stusearch=" + str, true);
        xmlhttp.send();
    }
}