# Deploy su dominio condiviso di un progetto Laravel + React

## Api e frontend sotto lo stesso dominio

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
-   Potrebbe essere possibile eseguire migration e seeder creandosi rotte di questo tipo (da mettere sempre prima della any creata prima che deve essere l'ultima rotta nel file `web.php`), e poi visitando gli indirizzi dal browser:

```php
Route::get('/migrate', function () {
    try {
        Artisan::call('migrate');
        return 'Migrations executed';
    } catch (Exception $e) {
        return $e->getMessage();
    }

});

Route::get('/seed', function () {
    try {
        Artisan::call('db:seed');
        return 'Seeders executed';
    } catch (Exception $e) {
        return $e->getMessage();
    }
});
```

**_questa soluzione non è testata quindi potrebbe non funzionare_**, comunque è **_IMPORTANTE commentare le rotte dopo averle usate altrimenti chiunque scopra questi indirizzi puo' fare migrations e seeders sul nonstro database in qualsiasi momento!_**

-   Se dovesse servire pulire la cache di Laravel sul server condiviso potrebbe essere utile creare questa rotta (da mettere sempre prima della any creata prima che deve essere l'ultima rotta nel file `web.php`), quindi visitare l'indirizzo da browser:

```php
Route::get('/clear-cache', function () {
    try {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        Artisan::call('event:clear');
        return 'Cache cleared';
    } catch (Exception $e) {
        return $e->getMessage();
    }
});
```

anche questa rotta è bene commentarla dopo averla usata.

### Sistemare il caricamento dei file

Negli hosting condivisi si hanno limitazioni che non permettono di cambiare il proprietario di file e cartelle (non abbiamo accesso al terminale per eseguire il comando `chown`), quindi il link alla cartella `storage/app/public` non funzionerà, però si può ovviare al problema mettendo i file direttamente nella cartella pubblica del sito senza bisogno del link.

-   All'interno della cartella pubblica dell'hosting creare la cartella `storage`

-   Aggiungere un nuovo disco in `config/filesystems.php` (il nome del disco non è importante):

```php
'shared_hosting' => [
    'driver' => 'local',
    'root' => base_path('/www/storage'), // percorso alla cartella pubblica del sito
    'url' => env('APP_URL').'/storage',
    'visibility' => 'public',
    'throw' => false,
],
```

-   Nel file `.env` settare FILESYSTEM_DISK al nome del disco appena creato:

```
FILESYSTEM_DISK=shared_hosting
```

-   Se nel codice è stato usato il disco di default tutto dovrebbe funzionare.

## Api e frontend su domini diversi

Con questa tecnica sono serviti su domini diversi (sottodomini o anche domini totalmente diversi) ad esempio:
api su `https://api.miosito.com` e frontend su `https://miosito.com` oppure api su `https://la-mia-api.com` e frontend su `https://il-mio-profilo.github.io/frontend-repo`.
Essendo i domini diversi, in questo caso nascono problemi di CORS.

### Risolvere i problemi di CORS

Nel progetto React, in `App.js` impostare axios con le impostazioni globali:

```js
import axios from 'axios';

axios.defaults.withCredentials = true; // include i cookie negli headers di ogni richiesta
axios.defaults.withXSRFToken = true; // aggiunge alle richieste l'header X-Xsrf-Token prendendo il valore dal cookie XSRF-TOKEN

function App() {
    // codice
}
```

oppure aggiungere manualmente l'oggetto delle opzioni alle chiamate axios:

```js
{
	headers: {
		accept: 'application/json',
		'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'), // getCookie va implementato
	}
	withCredentials: true,
}
```

Quindi bisogna assicurarsi che tra gli header delle richieste ci siano `X-Xsrf-Token` e `Cookie`

Bisogna controllare anche che tra gli header delle risposte che ci arrivano dal server ci sia `Access-Control-Allow-Credentials: true`, se dovesse mancare andare in `config/cors.php` di Laravel e settare:

```
'supports_credentials' => true,
```

I lax cookies non si possono condividere tra domini diversi, per risolvere bisogna settare nel file `.env` di Laravel:

```
SESSION_DOMAIN=nome.dominio
```

ad esempio: `SESSION_DOMAIN=localhost`, `SESSION_DOMAIN=www.miosito.com`, `SESSION_DOMAIN=api.sito.mio` <u>**_senza protocollo, porta o slash_**</u>. Forse funziona anche settando `SESSION_DOMAIN=null` ma è da verificare.

### NOTA

Durante lo sviluppo, in particolare quando non si ha il controllo del server (ad esempio si sta usando un'api esistente), per risolvere i problemi di CORS si può aggiungere in `package.json` la chiave:

```json
"proxy": "https://dominio-server-api-con:porta/",
```

ad esempio: `"proxy": "http://localhost:8000/"`. Gli indirizzi nelle fetch devono iniziare con lo `/` (quindi al browser sembreranno chiamate indirizzate allo stesso dominio del frontend, il proxy di React si occuperà di fare la richiesta all'indirizzo giusto).

Si possono risolvere i problemi di CORS anche installando un'estensione per il browser, oppure disattivando i controlli del CORS dalle impostazioni avanzate che offrono alcuni browser.
