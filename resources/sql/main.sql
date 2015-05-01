CREATE TABLE companies
(
    id INT NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE applications
(
    id INT NOT NULL AUTO_INCREMENT,
    id_company INT NOT NULL,
    name varchar(255) NOT NULL,
    description text,
    FOREIGN KEY (id_company) REFERENCES companies(id),
    PRIMARY KEY(id)
);
