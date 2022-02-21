//DOM elements
const login = document.getElementById('login');
const register = document.getElementById('register');
const contact = document.getElementById('contact')
const email = document.getElementById('email');
const password = document.getElementById('password');
const gjinia = document.getElementById('gjinia');
const emri = document.getElementById('emri');
const konfirmimi = document.getElementById('konfirmimi');
const mbiemri = document.getElementById('mbiemri');
const tel = document.getElementById('tel');
const mesazhi = document.getElementById('mesazhi');
const kushtet = document.getElementById('kushtet');
const robot = document.getElementById('robot');
const n1 = document.getElementById('n1');

//Gjenerimi i dy numrave te rendomt qe do te perdoren per verifikim ne faqen Kontakti
const random1 = Math.floor((Math.random() * 100) + 1);
const random2 = Math.floor((Math.random() * 100) + 1);


//Shfaqja e error mesazhit
function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'inputfield error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

//Kontrollo fushen per verifikim te Kontakti
function notArobot(input) {
    let b = false;
    if (input.value == (random1 + random2)) {
        showSucces(input);
        b = true;
    } else {
        showError(input, 'Pasakte!');
    }
    return b;
}

//Ne rast te validimit te suksesshem largo mesazhin error dhe ngjyren e border te input-it
function showSucces(input) {
    const formControl = input.parentElement;
    formControl.className = 'inputfield';
}

//Kontrollo nese email eshte valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim())) {
        showSucces(input)
        return true;
    } else {
        showError(input, 'Email nuk eshte valid');
        return false;
    }
}

//Kontrollo nese fjalekalimi permban se paku nje shkronje te madhe(vogel),nje numer dhe nje karakter special dhe gjatesia minimale 8
function checkPassword(input) {
    const re = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
    if (re.test(input.value.trim())) {
        showSucces(input)
        return true;
    } else {
        showError(input, 'Password duhet te kete numer,karakter,shkronje te (vogel) madhe');
        return false;
    }
}

//Kontrollo nese fusha e caktuar permban vetem shkronja
function lettersOnly(input) {
    const re = /^[a-zA-Z]+$/;
    if (re.test(input.value.trim())) {
        showSucces(input)
        return true;
    } else {
        showError(input, `${getFieldName(input)}  duhet te kete vetem shkronja`);
        return false;
    }
}

//Kontrollo nese Numri i telefoni eshte valid
function checkTel(input) {
    const re = /^[+]?[(]?[0-9]{0,3}[)]?[-\s.]?[0-9]{2,3}[-\s.]?[0-9]{6}$/im;
    if (re.test(input.value.trim())) {
        showSucces(input)
        return true;
    } else {
        showError(input, 'Numri i telefonit nuk eshte valid');
        return false;
    }
}

function checkGjinia(input) {
    if (input.value.trim() === '') {
        showError(input, `Zgjedhni se paku nje opsion`);
        return false;
    } else {
        showSucces(input);
        return true;
    }
}

//Kontrollo fushat te cilat duhet te plotesohen domosdoshmerisht nese jane te zbrazta shfaq error mesazh
function checkRequired(inputArr) {
    let b = false;
    inputArr.forEach(function(input) {
        if (input.value.trim().length === 0) {
            showError(input, `${getFieldName(input)} nuk duhet te jete e zbrazet`)
        } else {
            showSucces(input);

            b = true;
        }
    });
    return b;
}


//Kontrollo madhesine e karaktereve te fushat nese permbajne minimumin dhe maksimumin e karaktereve
function checkLength(input, min, max) {
    if (input.value.trim().length < min) {
        showError(input, `${getFieldName(input)} duhet te kete se paku ${min} karaktere`);
        return false;
    } else if (input.value.length > max) {
        showError(input, `${getFieldName(input)}  duhet te kete me se shumti  ${max} karaktere`);
        return false;
    } else {
        showSucces(input);
        return true;
    }
}

//Kthe emrin e input fushes ne te cilin do te shfaqet error
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

//Kontrollo nese end-user eshte ne pajtim me kushtet e perdorimit
function checkTerms(input) {
    if (input.checked === false) {
        showError(input, `Duhet te pajtoheni me kushtet e perdorimit`);
        return false;
    } else {
        showSucces(input);
        return true;
    }
}


//Kontrollo nese fusha konfirmo fjalekalimin eshte e njejte me fushen fjalekalimi
function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Fjalëkalimi dhe konfirmimi i fjalëkalimit nuk përshtaten');
        return false;
    } else {
        return true;
    }
}

//Ne rast se plotesohen te gjitha kushtet shfaqe nje mesazh dhe rikthe perdoruesin ne faqen kryesore
function success() {
    const myDiv = document.getElementById('success');
    let x = 6;

    function countDown() {
        if (x <= 1) {
            myDiv.textContent = "Redirecting..";
            window.setTimeout(function() {

                window.location.href = 'index.html';

            }, 1000);
            clearInterval(myTime);
        } else {
            myDiv.style.visibility = 'visible';
            x = x - 1;
            myDiv.textContent = 'Sukses! Do te ktheheni ne faqen kryesore per ' + x + ' sekond(a)';
        }
    }

    const myTime = setInterval(countDown, 1000);
}

/*
Kontrollo ne baze te ID se per cilen faqe behet fjale dhe dhe kontrollo kushtet varsisht nga input fields qe
 gjenden ne ato faqe, pastaj thirr funksionet perkatese ne rast te validimit te sukseshem
 */
if (login) {
    login.addEventListener('submit', function(e) {
        e.preventDefault();
        if (checkRequired([email, password]) && checkEmail(email) &&
            checkLength(password, 8, 25) && checkPassword(password)) {
            success();
            login.reset();

        }
    });
}

if (register) {
    register.addEventListener('submit', function(e) {
        e.preventDefault();
        checkTerms(kushtet)
        checkGjinia(gjinia)
        if (checkGjinia(gjinia)) {
            register.reset();
            success();
        }

    });
}

if (contact) {
    n1.innerHTML = random1 + ` + ` + random2 + ` = `
    contact.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log(notArobot(robot))
        if (checkRequired([emri, email, tel, mesazhi]) &&
            checkEmail(email) &&
            checkLength(emri, 3, 15) && lettersOnly(emri) &&
            checkLength(tel, 6, 15) && checkTel(tel) &&
            checkLength(mesazhi, 10, 90) && notArobot(robot)
        ) {
            contact.reset();
            success();

        }
    });
}