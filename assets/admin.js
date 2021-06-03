let url = new URL(window.location.href);
let path = url.pathname.split('/');
let search = url.search.replace('&', '=').split('=');

let addLink = document.getElementById('addLink');
let bodyList = document.getElementById('list-tbody');
let titleTab = document.getElementById('titleTab');
let rowHead = document.getElementById('rowHead');

// -- MAIN PROCESS --
window.addEventListener('load', () => {
    if (path[3] === 'edit') {
        if (search[1] === 'concert') {
            addLink.href = 'add?type=' + search[1];
            displayConcert();
        } else {
            addLink.href = 'add?type=' + search[1];
            getList(search[1]);
        }
    }
})

// -- FUNCTIONS --

async function getList(type) {
    let response = await fetch('http://localhost/opalinsigt/api/api.php?type=' + type);
    if (response.ok) {
        let data = await response.json();
        createArray(data);
    }
}

async function createArray(data) {
    let title = search[1].charAt(0).toUpperCase() + search[1].slice(1);

    titleTab.innerHTML = '<h2>' + title + '</h2>';

    rowHead.appendChild(document.createElement('th'));
    rowHead.appendChild(document.createElement('th'));

    data.forEach(element => {
        const row = document.createElement('tr');
        row.classList.add('row-list');
        const colTitle = document.createElement('td');
        const colModify = document.createElement('td');
        const colDelete = document.createElement('td');

        colTitle.textContent = element['name'];
        colModify.innerHTML = '<a href="update?type=' + search[1] + '&id=' + element['id'] + '">Modifier</a>';
        colDelete.innerHTML = '<a href=".././functions/delete-' + search[1] + '.php?id=' + element['id'] + '">Supprimer</a>';
        row.appendChild(colTitle);
        row.appendChild(colModify);
        row.appendChild(colDelete);
        bodyList.appendChild(row);
    });
}

// Concerts
let formAdmin = document.getElementById('formConcert');

async function addConcert() {
    formAdmin.addEventListener('submit', async (event) => {
        event.preventDefault()

        let name = document.getElementById('name').value;
        let description = document.getElementById('description').value;
        let address_id = document.getElementById('address_id').value;
        let concert_start = document.getElementById('concert_start').value;
        let concert_end = document.getElementById('concert_end').value;
        let available_tickets = document.getElementById('available_tickets').value;
        let ticket_price = document.getElementById('ticket_price').value;

        let request = new Request('http://localhost/opalinsight/api/api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'action': 'addConcert',
                'name': name,
                'description': description,
                'address_id': address_id,
                'concert_start': concert_start,
                'concert_end': concert_end,
                'available_tickets': available_tickets,
                'ticket_price': ticket_price,
            })
        });
        fetch(request);
    }, true)
}

async function updateConcert(id) {
    formAdmin.addEventListener('submit', async (event) => {
        event.preventDefault()

        let name = document.getElementById('name').value;
        let description = document.getElementById('description').value;
        let address_id = document.getElementById('address_id').value;
        let concert_start = new Date(document.getElementById('concert_start').value)
            .toISOString().slice(0, 19).replace('T', ' ');
        let concert_end = new Date(document.getElementById('concert_end').value)
            .toISOString().slice(0, 19).replace('T', ' ');
        let available_tickets = document.getElementById('available_tickets').value;
        let ticket_price = document.getElementById('ticket_price').value;

        let request = new Request('http://localhost/opalinsight/api/api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'action': 'updateConcert',
                'id': id,
                'name': name,
                'description': description,
                'address_id': address_id,
                'concert_start': concert_start,
                'concert_end': concert_end,
                'available_tickets': available_tickets,
                'ticket_price': ticket_price,
            })
        });
        fetch(request);
    }, true)
}

function deleteConcert(id) {
    let request = new Request('http://localhost/opalinsight/api/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(
            {
                'action': 'deleteConcert',
                'id': id,
            })
    })

    fetch(request)
}

async function displayConcert() {
    let request = new Request('http://localhost/opalinsight/api/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'action': 'displayConcert'
        })
    });

    let response = await fetch(request);
    let responseData = await response.json();

    let title = search[1].charAt(0).toUpperCase() + search[1].slice(1);
    titleTab.innerHTML = '<h2>' + title + '</h2>';

    const headAddress = document.createElement('th');
    headAddress.classList.add('headAddress');
    headAddress.textContent = 'Adresse';
    rowHead.appendChild(headAddress);

    const headCity = document.createElement('th');
    headCity.classList.add('headCity');
    headCity.textContent = 'Ville';
    rowHead.appendChild(headCity);

    const headDate = document.createElement('th');
    headDate.classList.add('headDate');
    headDate.textContent = 'Date';
    rowHead.appendChild(headDate);

    rowHead.appendChild(document.createElement('th'));
    rowHead.appendChild(document.createElement('th'));

    responseData.forEach(concert => {
        const row = document.createElement('tr');
        row.classList.add('row-list');
        const colTitle = document.createElement('td');
        const colAddress = document.createElement('td');
        const colCity = document.createElement('td');
        const colDate = document.createElement('td');
        const colModify = document.createElement('td');
        const colDelete = document.createElement('td');

        colTitle.textContent = concert['name_concert'];
        colAddress.textContent = concert['name_address'];
        colCity.textContent = concert['name_city'];
        colDate.textContent = concert['concert_start'];
        colModify.innerHTML = '<a href="update?type=' + search[1] + '&id=' + concert['id'] + '">Modifier</a>';
        colDelete.innerHTML = '<a href="#" onclick="deleteConcert(' + concert['id'] + ')">Supprimer</a>';
        row.appendChild(colTitle);
        row.appendChild(colAddress);
        row.appendChild(colCity);
        row.appendChild(colDate);
        row.appendChild(colModify);
        row.appendChild(colDelete);
        bodyList.appendChild(row);
    });
}

async function displayOneConcert(id) {
    let request = new Request('http://localhost/opalinsight/api/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(
            {
                'action': 'displayOneConcert',
                'id': id
            })

    })

    let response = await fetch(request)
    let responseData = await response.json()

    let name = document.getElementById('name');
    let description = document.getElementById('description');
    let address_id = document.getElementById('address_id').value;
    let concert_start = document.getElementById('concert_start').value;
    let concert_end = document.getElementById('concert_end').value;
    let available_tickets = document.getElementById('available_tickets').value;
    let ticket_price = document.getElementById('ticket_price').value;

    name.value = responseData[0].name;
    description.value = responseData[0].description;
    address_id.value = responseData[0].address_id;
    concert_start.value = responseData[0].concert_start.replace(' ', 'T');
    concert_end.value = responseData[0].concert_end.replace(' ', 'T');
    available_tickets.value = responseData[0].available_tickets;
    ticket_price.value = responseData[0].ticket_price;
}