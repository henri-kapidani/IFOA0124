# Deploy su dominio condiviso di un progetto Laravel + React

-   Fare la build del progetto React:

```
npm run build
```

-   Rinominare la `index.html` presente nella cartella `build` in `index.php` e spostarla nella cartella `resources/views` di Laravel
-   Copiare gli altri file della cartella `build` nella `public` di Laravel
-   Clonare il progetto Laravel in una nuova cartella
-   Aggiungere alla fine di `routes/web.php` questo codice:

```php
Route::get('{any?}', function () {
    return view('index');
})->where("any", ".*")->name('index');
```

-   Generare il file .env
-   Al suo interno settare:

```
APP_ENV=production
APP_DEBUG=false
# per la parte di database vanno messe le credenziali che recuperate dall'hosting
```

-   Installare le dipendenze:

```
composer install
```

```
php artisan key:generate
```

-   Copiare il contenuto della `public` di Laravel nella cartella pubblica del server (in genere `www` oppure `public_html` o qualcosa del genere)
-   Copiare tutto il resto (quindi eccetto la cartella `public`) contenuto nella catella del progetto Laravel nella cartella genitore di `www` nel server
-   Provare se funziona
