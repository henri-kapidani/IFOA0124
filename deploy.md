# Deploy su dominio condiviso di un progetto Laravel + React

Con questa tecnica frontend e backend sono serviti dallo stesso dominio, quindi non ci sono problemi di CORS.

-   Fare la build del progetto React:

```
npm run build
```

-   Clonare il progetto Laravel in una nuova cartella
-   Nella cartella `build` di React rinominare il file `index.html` in `index.php` e spostarlo nella cartella `resources/views` di Laravel
-   Copiare gli altri file della cartella `build` di React nella `public` di Laravel (<u>**_IMPORTANTE: NON sovrascrivere file con lo stesso nome già presenti in `public`_**</u>)
-   Aggiungere alla fine di `routes/web.php` questo codice (<u>**_IMPORTANTE: questa rotta deve essere l'ultima nel file `web.php`_**</u>):

```php
Route::get('{any?}', function () {
    return view('index');
})->where('any', '^(?!api\/).*$')->name('index');
```

e se presente rimuovere o commentare la rotta alla root del sito (in `routes/web.php`):

```php
Route::get('/', '.............');
```

-   Generare il file `.env` copiando e rinominando `.env.example`
-   Al suo interno settare:

```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://nome-vostro-dominio.abc
FRONTEND_URL=https://nome-vostro-dominio.abc
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
-   Fare in locale le migrations:

```
php artisan migrate
```

-   Se servono anche i dati del seeder eseguire anche quello:

```
php artisan db:seed
```

-   Andare in phpMyAdmin in locale (o qualsiasi altro client per il database) ed esportare il database del progetto
-   Dal pannello del server (dovrebbe offrire un pannello phpMyAdmin) importare il database esportato prima
-   Provare se funziona

-   Se dovesse servire pulire la cache di Laravel sul server condiviso potrebbe essere utile creare questa rotta (da mettere sempre prima della any creata prima che deve essere l'ultima rotta nel file `web.php`), quindi visitare l'indirizzo da browser:

```php
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    Artisan::call('event:clear');
    return 'Cache cleared';
});
```
