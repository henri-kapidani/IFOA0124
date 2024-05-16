# Laravel Cheat Sheet

## Installazione

1. Creare la cartella del progetto
1. Aprirla con VS Code
1. Nel terminale dare
    ```
    composer create-project laravel/laravel .
    ```
1. lanciare il server con
    ```
    php artisan serve
    ```

## Scaricare un progetto Laravel da Github

1. Clonare il progetto
1. Installare le librerie php
    ```
    composer install
    ```
    IMPORTANTE: attendere finchè non ritorna il prompt della linea di comando
1. Installare le librerie js
    ```
    npm install
    ```
1. Creare il file `.env` copiando `.env.example`
    ```
    cp .env.example .env
    ```
1. Popolare il file `.env` appena creato con i nosti dati (database, email, ...)
1. Quando finisce l'installazione delle librerie php generare la chiave del sito
    ```
    php artisan key:generate
    ```
1. Migrare il database (crearne la struttura):
    ```
    php artisan migrate
    ```
