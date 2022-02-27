function toggleMenu() {
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.classList.toggle('active');
    navigation.classList.toggle('active');
    main.classList.toggle('active');

}

const emri = document.getElementById("emriU");
emri.addEventListener("input", function(event) {
    if (email.validity.typeMismatch) {
        email.setCustomValidity("I am expecting an e-mail address!");
        email.reportValidity();
    } else {
        email.setCustomValidity("");
    }

});
console.log('dasdasd');