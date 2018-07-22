function bluring() {
    var elements = document.getElementsByClassName("hilightable");
    for (var i = 0; i < elements.length; i++) {
        elements[i].onfocus = function () {
            this.classList.add("highlight");
        }
        elements[i].onblur = function () {
            this.classList.remove("highlight");
        }
    }
};
function submitting() {
    var tri = true;
    var elements = document.getElementsByClassName("required");
    for (var i = 0; i < elements.length; i++) {
        console.log(elements[i].value);
        if (elements[i].value === "") {
            elements[i].classList.add("error");
            tri = false;
        }else{
            elements[i].classList.remove("error");
        }
    }
    return tri;
};