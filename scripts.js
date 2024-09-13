/* Place your JavaScript in this file */

function sortList(ul) {
    var ul = document.getElementById(ul);
  
    Array.from(ul.getElementsByTagName("LI"))
      .sort((a, b) => a.textContent.localeCompare(b.textContent))
      .forEach(li => ul.appendChild(li));
  }
  
  sortList("branches");