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