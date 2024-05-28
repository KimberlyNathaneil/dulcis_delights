
const leftApr = document.getElementById("leftApr");
const leftMay = document.getElementById("leftMay");
const leftJun = document.getElementById("leftJun");
const leftJul = document.getElementById("leftJul");
const APR = document.getElementById("apr");
const MAY = document.getElementById("may");
const JUN = document.getElementById("jun");
const JUL = document.getElementById("jul");

leftApr.addEventListener("click", (event) => {
    APR.style.display = "block";
    MAY.style.display = "none";
    JUN.style.display = "none";
    JUL.style.display = "none";
});

leftMay.addEventListener("click", (event) => {
    APR.style.display = "none";
    MAY.style.display = "block";
    JUN.style.display = "none";
    JUL.style.display = "none";
});

leftJun.addEventListener("click", (event) => {
    APR.style.display = "none";
    MAY.style.display = "none";
    JUN.style.display = "block";
    JUL.style.display = "none";
});

leftJul.addEventListener("click", (event) => {
    APR.style.display = "none";
    MAY.style.display = "none";
    JUN.style.display = "none";
    JUL.style.display = "block";
});
