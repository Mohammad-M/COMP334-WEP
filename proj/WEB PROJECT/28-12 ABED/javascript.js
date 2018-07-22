document.addEventListener('DOMContentLoaded', main);

function main() {
    resize();
    window.addEventListener('resize',resize);
}

function resize() {
    var navButtons = document.getElementById('navlistitems');
    if (window.outerWidth >= 768) {
        navButtons.classList.remove('sidenav');
        navButtons.classList.remove('hidden');
    }
    else {
        navButtons.classList.add('sidenav');

    }
}

function showSideNav(){
    var sideNav = document.getElementById('navlistitems');
    var closeButton = document.getElementById('closelayout');
    sideNav.classList.remove('hidden');
    sideNav.classList.add('shown');
    closeButton.style.right='0';


}

function closeSideNav(){
    var sideNav = document.getElementById('navlistitems');
    var closeButton = document.getElementById('closelayout');
    sideNav.classList.remove('shown');
    sideNav.classList.add('hidden');
    closeButton.style.right='2000px';
}