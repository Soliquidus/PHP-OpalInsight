CREATE DATABASE opalinsight;
USE opalinsight;

CREATE TABLE IF NOT EXISTS user
(
    id       INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30),
    email    VARCHAR(50),
    password VARCHAR(500)
);

CREATE TABLE IF NOT EXISTS product
(
    id          INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(30),
    date_added  DATETIME,
    picture     BLOB,
    description VARCHAR(100),
    stock       INT
);

CREATE TABLE IF NOT EXISTS category
(
    id   INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS country
(
    id   INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    code varchar(5)
);

CREATE TABLE IF NOT EXISTS city
(
    id         INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name       VARCHAR(50),
    country_id INT,

    CONSTRAINT fk_country_id FOREIGN KEY (country_id) REFERENCES country (id)
);

CREATE TABLE IF NOT EXISTS address
(
    id          INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(30),
    number      INT,
    address     VARCHAR(50),
    postal_code INT,
    city_id     INT,
    country_id  INT,

    CONSTRAINT fk_city_id FOREIGN KEY (city_id) REFERENCES city (id),
    CONSTRAINT fk_country_id FOREIGN KEY (country_id) REFERENCES country (id)
);

CREATE TABLE IF NOT EXISTS concert
(
    id                INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name              VARCHAR(100) NOT NULL,
    description       TEXT         NOT NULL,
    address_id        INT          NOT NULL,
    concert_start     DATETIME     NOT NULL,
    concert_end       DATETIME     NOT NULL,
    available_tickets INT          NOT NULL,
    ticket_price      INT          NOT NULL,

    CONSTRAINT fk_address_id FOREIGN KEY (address_id) REFERENCES address (id)
);

/*
 Inserts
 */
INSERT INTO country (id, name, code)
VALUES (1, 'France', 'FR'),
       (2, 'Allemagne', 'DE'),
       (3, 'Espagne', 'ES'),
       (4, 'Royaume-Uni', 'GB'),
       (5, 'Italie', 'IT');

INSERT INTO city (`id`, name, country_id)
VALUES (1, 'Nantes', 1),
       (2, 'Paris', 1),
       (3, 'Rouen', 1);

INSERT INTO address (`id`, name, number, address, postal_code, city_id, country_id)
VALUES (1, 'Le Ferrailleur', 20, 'Quai des Antilles', '44220', 1, 1),
       (3, 'La Fée Torchette', 21, 'Rue des Augustins', '76000', 3, 1);

INSERT INTO `user` (`id`, `username`, `email`, `password`)
VALUES (1, 'userTest', 'test@mail.com', '$2y$10$bxi.w/0NYbi5hG1V0UY8EuxqZelib160/bhyXEs7OWkVBuPaR5GBW'),
       (2, 'admin', 'admin@mail.com', '$2y$10$foSrsXJZswTfKU4h.WmjVOBKE3PT/idoRZj2HjxZiJ.iICJq8fH5u'),
       (3, 'tibo', 'tibo.pfeifer@test.com', '$2y$10$QbsgdNvBnhU61qRn6NBQ9uortsSv1nCLBpebfu4L/a28Roja2e0sW');

INSERT INTO concert (id, name, description, address_id, concert_start, concert_end, available_tickets, ticket_price)
VALUES (1, 'Concert 1',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis consectetur ipsum sed semper. In mauris tortor, vulputate vel porttitor sit amet, ultricies id nisl. Pellentesque ut mauris vitae risus congue congue et id ipsum. Nam sit amet ante metus. Pellentesque lorem massa, placerat eu dapibus non, finibus sit amet lacus. Ut nulla augue, venenatis vitae rhoncus rutrum, ornare sit amet felis. Proin vel viverra libero. Nunc ultrices tristique erat, suscipit pharetra ipsum gravida sit amet. Pellentesque volutpat massa ut quam sagittis pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam purus nunc, pretium id finibus id, tristique quis dolor. Etiam eget massa purus. Sed auctor neque dui, in congue dui ornare ut.',
        1, '2021-02-26 19:00:00', '2021-02-26 23:00:00', 50, 10),
       (3, 'Concert 3',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis consectetur ipsum sed semper. In mauris tortor, vulputate vel porttitor sit amet, ultricies id nisl. Pellentesque ut mauris vitae risus congue congue et id ipsum. Nam sit amet ante metus. Pellentesque lorem massa, placerat eu dapibus non, finibus sit amet lacus. Ut nulla augue, venenatis vitae rhoncus rutrum, ornare sit amet felis. Proin vel viverra libero. Nunc ultrices tristique erat, suscipit pharetra ipsum gravida sit amet. Pellentesque volutpat massa ut quam sagittis pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam purus nunc, pretium id finibus id, tristique quis dolor. Etiam eget massa purus. Sed auctor neque dui, in congue dui ornare ut.',
        2, '2021-01-29 17:40:00', '2021-01-29 21:40:00', 40, 10),
       (4, 'Concert à Rouen !',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis consectetur ipsum sed semper. In mauris tortor, vulputate vel porttitor sit amet, ultricies id nisl. Pellentesque ut mauris vitae risus congue congue et id ipsum. Nam sit amet ante metus. Pellentesque lorem massa, placerat eu dapibus non, finibus sit amet lacus. Ut nulla augue, venenatis vitae rhoncus rutrum, ornare sit amet felis. Proin vel viverra libero. Nunc ultrices tristique erat, suscipit pharetra ipsum gravida sit amet. Pellentesque volutpat massa ut quam sagittis pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam purus nunc, pretium id finibus id, tristique quis dolor. Etiam eget massa purus. Sed auctor neque dui, in congue dui ornare ut.',
        2, '2021-03-27 19:00:00', '2021-03-27 22:00:00', 50, 5);