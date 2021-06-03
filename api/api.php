<?php

require_once 'database/database.php';
$_POST = json_decode(file_get_contents('php://input'), true);

if ($_GET) {
    if ($_GET['type'] === 'address') {
        if (isset($_GET['id'])) {
            $req = $pdo->prepare('SELECT * FROM address where id = :id');
            $req->execute(['id' => $_GET['id']]);
            $data = $req->fetchAll();
            echo json_encode($data);
        } else {
            $req = $pdo->prepare('SELECT * FROM address');
            $req->execute();
            $data = $req->fetchAll();
            echo json_encode($data);
        }
    }
    if ($_GET['type'] === 'country') {
        if (isset($_GET['id'])) {
            $req = $pdo->prepare('SELECT * FROM country where id = :id');
            $req->execute(['id' => $_GET['id']]);
            $data = $req->fetchAll();
            echo json_encode($data);
        } else {
            $req = $pdo->prepare('SELECT * FROM country');
            $req->execute();
            $data = $req->fetchAll();
            echo json_encode($data);
        }
    }
    if ($_GET['type'] === 'city') {
        if (isset($_GET['id'])) {
            $req = $pdo->prepare('SELECT * FROM city where id = :id');
            $req->execute(['id' => $_GET['id']]);
            $data = $req->fetchAll();
            echo json_encode($data);
        } else {
            $req = $pdo->prepare('SELECT * FROM city');
            $req->execute();
            $data = $req->fetchAll();
            echo json_encode($data);
        }
    }
}

// Concert management

if ($_POST['action'] === 'addConcert') {
    $req = $pdo->prepare(
        'INSERT INTO 
                concert (name, description, address_id, concert_start, concert_end, available_tickets, ticket_price) 
                VALUES 
                (:name, :description, :address_id, :concert_start, :concert_end, :available_tickets, :ticket_price)'
    );
    $req->execute([
        'name' => htmlspecialchars($_POST['name']),
        'description' => htmlspecialchars($_POST['description']),
        'address_id' => $_POST['address_id'],
        'concert_start' => $_POST['concert_start'],
        'concert_end' => $_POST['concert_end'],
        'available_tickets' => $_POST['available_tickets'],
        'ticket_price' => $_POST['ticket_price']
    ]);
}

if ($_POST['action'] === 'displayConcert') {
    $req = $pdo->prepare(
        'SELECT 
                c.id, c.name as concert_name, c.description, c.concert_start, a.name as address_name, ci.name as city_name 
                FROM concert c
                INNER JOIN address a on a.id = c.address_id
                INNER JOIN city ci on a.city_id = ci.id
                ORDER BY c.concert_start'
    );
    $req->execute();
    $data = $req->fetchAll();

    echo json_encode($data);
}

if ($_POST['action'] === 'displayOneConcert') {
    $id = $_POST['id'];

    $req = $pdo->prepare('SELECT * FROM concert WHERE id = :id');
    $req->execute(['id' => $id]);
    $data = $req->fetchAll();

    echo json_encode($data);
}

if ($_POST['action'] === 'updateConcert') {
    $id = $_POST['id'];
    $req = $pdo->prepare(
        'UPDATE concert 
                SET name = :name, description = :description, address_id = :address_id, concert_start = :concert_start, 
                    concert_end = :concert_end, available_tickets = :available_tickets, ticket_price = :ticket_price
                WHERE id = :id'
    );
    $req->execute([
        'id' => $id,
        'name' => htmlspecialchars($_POST['name']),
        'description' => htmlspecialchars($_POST['description']),
        'address_id' => $_POST['address_id'],
        'concert_start' => $_POST['concert_start'],
        'concert_end' => $_POST['concert_end'],
        'available_tickets' => $_POST['available_tickets'],
        'ticket_price' => $_POST['ticket_price']
    ]);
}

if ($_POST['action'] === 'deleteConcert') {
    $id = $_POST['id'];

    $req = $pdo->prepare('DELETE FROM concert WHERE id = :id');
    $req->execute(['id' => $id]);
}
