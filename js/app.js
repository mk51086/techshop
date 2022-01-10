//Menuja ne rast te hapjes se faqes ne paisje mobile apo paisje tjera me rezolucion me te vogel
//DOM elementi
const MenuItems = document.getElementById("MenuItems");
//Ndrysh madhesin e items ne 0px
MenuItems.style.maxHeight = "0px";

//Event listener per rastin e klikimit te menus behet ndryshimi i height dhe shfaqen linqet e menus
document.getElementById("menuBtn").addEventListener("click", menutoggle);

function menutoggle() {
    if (MenuItems.style.maxHeight === "0px") {
        MenuItems.style.maxHeight = "220px";
    } else {
        MenuItems.style.maxHeight = "0px";
    }
}