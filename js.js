function startCountdown() {
    var endDate = new Date("2023-11-05T23:59:59");
    var countdownElement = document.getElementById("countdown");

    function updateCountdown() {
      var currentDate = new Date();
      var remainingTime = endDate - currentDate;

      if (remainingTime > 0) {
        var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
        var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        countdownElement.textContent = "" + days + " ngày " + hours + " giờ " + minutes + " phút " + seconds + " giây";
      } else {
        countdownElement.textContent = "Đã kết thúc";
      }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
}