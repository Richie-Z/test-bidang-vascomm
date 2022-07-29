"use strict";

let shootButton = document.querySelector(".btn--shoot");
let image = document.querySelector("img");
let deleteButton = document.querySelector(".btn--delete");
let video = document.querySelector("video");
let canvas = document.querySelector("canvas");
let form = document.querySelector("form");
let imageFile = document.getElementById("image-file");

deleteButton.addEventListener("click", function (event) {
    event.preventDefault();
    imageFile.value = null;

    showButton(shootButton);
    hideButton(deleteButton);
    hideImage();
});
shootButton.addEventListener("click", function (event) {
    event.preventDefault();
    const context = canvas.getContext("2d");
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0);
    image.src = canvas.toDataURL("image/png");
    imageFile.value = canvas.toDataURL("image/png");
    showImage();
    showButton(deleteButton);
    hideButton(shootButton);
});

(async function initWebcam() {
    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices
            .getUserMedia({
                video: {
                    width: 600,
                    height: 600,
                },
            })
            .then(function (stream) {
                video.srcObject = stream;
            })
            .catch(function (err) {
                console.error(err.message);
            });
    }
})();

function hideButton(button) {
    button.classList.add("btn--hidden");
}

function showButton(button) {
    button.classList.remove("btn--hidden");
}

function hideImage() {
    image.classList.add("image--hidden");
}

function showImage() {
    image.classList.remove("image--hidden");
}
