setInterval(function () {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("data").innerHTML = this.responseText;
    }
    xhttp.open("GET", "data.php");
    xhttp.send();
}, 100);
