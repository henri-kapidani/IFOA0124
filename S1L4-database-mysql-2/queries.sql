-- creare database
CREATE DATABASE ifoa_prova;

-- eliminare database
-- tutti i dati nel databse verranno persi
DROP DATABASE ifoa_prova;

-- lista tabelle nel database
SHOW TABLES;

-- creare tabella
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    username VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    age INT UNSIGNED NULL, -- NULL è il default
    PRIMARY KEY (id)
);

-- eliminare tabella
-- tutti i dati della tabella verranno persi
DROP TABLE prova;

-- modifica struttura di una tabella (aggiunta di una colonna)
ALTER TABLE users ADD COLUMN last_access DATETIME NULL AFTER axisting_column;

-- modifica struttura di una tabella (rimozione di una colonna)
-- tutti i dati della colonna verranno persi
ALTER TABLE users DROP COLUMN registration_date;

-- modifica struttura di una tabella (modifica di una colonna)
-- ridefinire anche le proprietà che non cambiano
ALTER TABLE users MODIFY COLUMN age TINYINT UNSIGNED NULL;

-- rinominare una tabella
ALTER TABLE old_table_name RENAME new_table_name;











SELECT DISTINCT CONCAT('Simpatico ',  first_name, ' ', last_name) as full_name
FROM `customers`;


SELECT first_name
FROM customers
WHERE first_name = 'John';