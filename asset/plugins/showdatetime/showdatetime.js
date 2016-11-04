(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
          dd = checkTime(today.getDate()),
          mm = checkTime(today.getMonth()+1),
          yy = checkTime(today.getFullYear()),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
        document.getElementById("time").innerHTML = "วันที่ " + dd + "/" + mm + "/" + yy + " เวลา " + h + ":" + m + ":" + s;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();
