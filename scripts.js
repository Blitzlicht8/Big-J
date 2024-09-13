/* Place your JavaScript in this file */

function sortList(ul) {
  var ul = document.getElementById(ul);

  Array.from(ul.getElementsByTagName("LI"))
    .sort((a, b) => a.textContent.localeCompare(b.textContent))
    .forEach(li => ul.appendChild(li));
}

sortList("branches");

let lastScrollTop = 0;
const navbar = document.querySelector('nav');

window.addEventListener('scroll', function () {
let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

if (scrollTop > lastScrollTop) {
  // Scrolling down, hide the navbar
  navbar.style.top = "-90px";  // Adjust this value based on navbar height
} else {
  // Scrolling up, show the navbar
  navbar.style.top = "0";
}

lastScrollTop = scrollTop;
});