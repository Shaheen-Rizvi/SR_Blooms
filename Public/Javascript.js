document.addEventListener("DOMContentLoaded", () => {
    const images = ["../flower1.jpg", "../flower2.jpg", "../flower3.jpg"];
    let currentIndex = 0;
    const banner = document.querySelector('.banner');

    function changeImage() {
        banner.style.backgroundImage = `url('${images[currentIndex]}')`;
        currentIndex = (currentIndex + 1) % images.length;
    }

    setInterval(changeImage, 3000);
    changeImage();
});