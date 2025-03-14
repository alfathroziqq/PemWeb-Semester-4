// Alfath Roziq Widhayaka
// L0122012

$(document).ready(function() {
    // Waktu
    function updateClock() {
        var now = new Date();
        var dname = now.getDay(),
            mo = now.getMonth(),
            dnum = now.getDate(),
            yr = now.getFullYear(),
            hou = now.getHours(),
            min = now.getMinutes(),
            sec = now.getSeconds(),
            pe = "AM";

        if (hou == 0) {
            hou = 12;
        }
        if (hou > 12) {
            hou = hou - 12;
            pe = "PM";
        }

        Number.prototype.pad = function(digits) {
            for (var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
        }

        var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agusutus", "September", "October", "November", "Desember"];
        var week = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
        var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
        for (var i = 0; i < ids.length; i++)
            $("#" + ids[i]).text(values[i]);
    }

    function initClock() {
        updateClock();
        setInterval(updateClock, 1000);
    }

    initClock();

// Animasi Gambar Tentang
    $("#gambarheader").mouseenter(function() {
        $(this).addClass("zoom");
    });

    $("#gambarheader").mouseleave(function() {
        $(this).removeClass("zoom");
    });
});

// Animasi Features Card
$(document).ready(function () {
    $(".features .card").mouseenter(function () {
        $(this).css({
            transform: "scale(1.05)",
            transition: "transform 0.3s ease"
        });
    }).mouseleave(function () {
        $(this).css("transform", "scale(1)");
    });
});