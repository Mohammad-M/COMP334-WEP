document.addEventListener('DOMContentLoaded', main);

function main() {
    resize();
    window.addEventListener('resize', resize);

    var regForm = document.getElementById('regForm');
    if (regForm) {
        regForm.addEventListener('submit', function (event) {
            event.preventDefault();
            var isFormValid = true;
            //get email and id regex them
            var inputFields = document.querySelectorAll('#regForm input[type]');//.getElementsByClassName('required');
            console.log(inputFields);
            if (inputFields) {
                for (var i = 0; i < inputFields.length; i++) {
                    inputFields[i].addEventListener('keyup', function () {
                        if (this.value !== '') {
                            this.classList.remove('error');
                        }
                    });
                    if (inputFields[i].value === '') {
                        isFormValid = false;
                        inputFields[i].classList.add('error');
                    }
                }
            }
            if (isFormValid) {
                console.log("valid form");
                regForm.submit();
            }
        });

        regForm.addEventListener('reset', function (event) {
            var inputFields = querySelectorAll('#regForm input[type="text"]');
            if (inputFields) {
                for (var i = 0; i < inputFields.length; i++) {
                    inputFields[i].classList.remove('error');
                }
            }
        });
    }
}

function resize() {
    // console.log(window.innerWidth);
    var navButtons = document.getElementById('navlistitems');
    if (window.innerWidth >= 768) {
        navButtons.classList.remove('sidenav');
        navButtons.classList.remove('hidden');
    }
    else {
        navButtons.classList.add('sidenav');

    }
}

function showSideNav() {
    var sideNav = document.getElementById('navlistitems');
    var closeButton = document.getElementById('closelayout');
    sideNav.classList.remove('hidden');
    sideNav.classList.add('shown');
    closeButton.style.right = '0';


}

function closeSideNav() {
    var sideNav = document.getElementById('navlistitems');
    var closeButton = document.getElementById('closelayout');
    sideNav.classList.remove('shown');
    sideNav.classList.add('hidden');
    closeButton.style.right = '2000px';
}

function validateRegisterForm() {
    var regForm = document.forms["reg"];//["username"].value;
    if (regForm["username"].value == "") {

        return false;
    }
}
