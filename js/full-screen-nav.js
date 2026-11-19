document.addEventListener("DOMContentLoaded", function () {
    const menu = document.querySelector(".menu");
    const openBtn = document.querySelector(".action--menu");
    const closeBtn = document.querySelector(".action--close");

    if (openBtn && closeBtn && menu) {
        openBtn.addEventListener("click", () => menu.classList.add("open"));
        closeBtn.addEventListener("click", () => menu.classList.remove("open"));
    }
});
