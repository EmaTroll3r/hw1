
const navItems = document.querySelectorAll('.nav-links-item');
const navMenu = document.querySelector('#nav-menu-container');
const quickbar = document.querySelector('#quickbar');
const usernameContent = document.querySelector('#nav-username-content');


function showSubmenu(event) {
    event.currentTarget.classList.toggle('nav-show-Submenu');
}

function hideAllSubMenu() {
    for (let item of navItems) {
        item.classList.remove('nav-show-Submenu');
    }
}

function toggleQuickbar() {
    quickbar.classList.toggle('quickbar-show');
}

function onText(text) {
    usernameContent.dataset.username = text || "Sign In";
}

function onResponse(response) {
    return response.text();
}



for(let item of navItems) {
    item.addEventListener('click', showSubmenu);
}


fetch('http://localhost:8080/bgg/backend/getSessionUsername.php')
.then(onResponse)
.then(onText)



document.addEventListener('click', hideAllSubMenu,{ capture: true});
navMenu.addEventListener('click', toggleQuickbar);
    
