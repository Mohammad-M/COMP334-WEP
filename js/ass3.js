
// make hilightables works by adding class highlight when on focus and remove it on blur
var elements = document.getElementsByClassName('hilightable');
for (var element of elements) {
  // console.log(element);
  element.onfocus = function(){
    this.classList.add('highlight');
  }
  element.onblur = function(){
    this.classList.remove('highlight');
  }
}

// add class error to required elements if empty and remove class if not empty,
// every time that the value changes
elements = document.getElementsByClassName('required');
for (var element of elements) {

  element.onchange = function(){
    if(this.value === ""){
      this.classList.add('error');
    }else{
      this.classList.remove('error');
    }
  }
}


// prevent submit action if required fields are not filled
var form = document.getElementById("mainForm");
form.onsubmit = function(e){
  for (var element of elements) {
    if(element.value === ""){
      element.classList.add('error');
      e.preventDefault();
    }
  }
}
