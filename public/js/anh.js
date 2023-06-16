function zoomImage(img) {
    var overlay = document.getElementById("overlay");
    overlay.style.display = "flex";
    overlay.innerHTML = "<img src='" + img.src + "'>";
}

document.getElementById("overlay").addEventListener("click", function() {
    this.style.display = "none";
});