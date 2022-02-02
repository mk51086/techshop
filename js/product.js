//DOM elementet
const img_area = document.getElementById("prodarea");
const img = document.getElementById("ProductImg");
//Event listener ne rast te levizjes se cursorit mbi foto beje zoom foton ne poziten e cursorit
img_area.addEventListener("mousemove", function(event) {
        let clientX = event.clientX - img_area.offsetLeft
        let clientY = event.clientY - img_area.offsetTop

        const mWidth = img_area.offsetWidth;
        const mHeight = img_area.offsetHeight;
        clientX = clientX / mWidth * 100
        clientY = clientY / mHeight * 100

        img.style.transform = 'translate(-' + clientX + '%, -' + clientY + '%) scale(2)'
    })
    //Event listener ne rast te largimit te cursorit nga fotoja kthe foton ne gjendjen fillestare
img_area.addEventListener("mouseleave", function() {
    img.style.transform = 'translate(-50%,-50%) scale(1)'
})
//Ndryshimi i fotove te produkti
const ProductImg = document.getElementById("ProductImg");
const smallImg = document.getElementsByClassName("small-img");
smallImg[0].onclick = function() {
    ProductImg.src = smallImg[0].src;
    smallImg[0].classList.add("selected-prodImg");
    smallImg[1].classList.remove("selected-prodImg");
    smallImg[2].classList.remove("selected-prodImg");
};
smallImg[1].onclick = function() {
    ProductImg.src = smallImg[1].src;
    smallImg[1].classList.add("selected-prodImg");
    smallImg[0].classList.remove("selected-prodImg");
    smallImg[2].classList.remove("selected-prodImg");
};
smallImg[2].onclick = function() {
    ProductImg.src = smallImg[2].src;
    smallImg[2].classList.add("selected-prodImg");
    smallImg[0].classList.remove("selected-prodImg");
    smallImg[1].classList.remove("selected-prodImg");
};