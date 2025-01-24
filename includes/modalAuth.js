//Login & Reg Form Popup
function openLoginPopup() {
    document.getElementById("login-popup").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}

function closeLoginPopup() {
    document.getElementById("login-popup").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function openRegPopup() {
    document.getElementById("reg-popup").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}

function closeRegPopup() {
    document.getElementById("reg-popup").style.display = "none";
    document.getElementById("login-popup").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function openEditPopup() {
    document.getElementById("edit-popup").style.display = "block";
    document.getElementById("edit-overlay").style.display = "block";
}

function closeEditPopup() {
    document.getElementById("edit-popup").style.display = "none";
    document.getElementById("edit-overlay").style.display = "none";
}