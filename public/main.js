console.log("js loaded");
var sec = 0;
var intervalId = "";

function timer() {
    console.log("Timer started");

    sec++;
    var stg = "watering plant...";
    document.getElementById("timer").innerHTML = stg + sec;
}

function test() {
    intervalId = window.setInterval(function () {
        timer();
    }, 1000);

    // document.getElementById("");
}

function stopTimer() {
    document.getElementById("timer").innerHTML = "";

    clearInterval(intervalId);
}
