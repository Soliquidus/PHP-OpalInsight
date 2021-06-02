let url = new URL(window.location.href);
let path = url.pathname.split('/');
let search = url.search.replace('&', '=').split('=');

let addLink = document.getElementById('addLink');
let bodyList = document.getElementById('list-tbody');
let rowHead = document.getElementById('rowHead');

window.addEventListener('load', () => {
    if (path[3] === 'edit') {
        if (search[1] === 'concert') {
            addLink.href = 'add?type=' + search[1];
            //Implement method
        }
    }
})