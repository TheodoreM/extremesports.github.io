// Αποκρύπτει ένα στοιχείο HTML βάσει του id attribute
function collapseElement(obj) {
    var el = document.getElementById(obj);
    el.style.display = 'none';
}

// Εμφανίζει ένα στοιχείο HTML βάσει του id attribute
function expandElement(obj) {
    var el = document.getElementById(obj);
    el.style.display = 'block';
}