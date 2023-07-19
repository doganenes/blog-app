const menuBtn = document.querySelector(".menu-btn");
let menuOpen = false;

menuBtn.addEventListener("click", () => {
    if (!menuOpen) {
        menuBtn.classList.add("open");
        menuOpen = true;
    } else {
        menuBtn.classList.remove("open");
        menuOpen = false;
    }
});

const asideTag = document.querySelector(".asideTag");
menuBtn.addEventListener("click", () => {
    asideTag.classList.toggle("active");
});

