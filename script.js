let count = 1;
document.getElementById("radio1").checked = true;

function nextImage() {
    count++;
    if (count > 6) {
        count = 1;
    }
    document.getElementById("radio" + count).checked = true;
}

setInterval(nextImage, 2000);