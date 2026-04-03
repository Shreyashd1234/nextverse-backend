# Code Citations

## License: unknown
https://github.com/hodamagdi/laravel./blob/9d803b5fee2f460468c3373a47de5e4fcc1fa0ed/app/Http/Controllers/Clientcontroller.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade
```


## License: unknown
https://github.com/hodamagdi/laravel./blob/9d803b5fee2f460468c3373a47de5e4fcc1fa0ed/app/Http/Controllers/Clientcontroller.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade
```


## License: unknown
https://github.com/hodamagdi/laravel./blob/9d803b5fee2f460468c3373a47de5e4fcc1fa0ed/app/Http/Controllers/Clientcontroller.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade
```


## License: unknown
https://github.com/hodamagdi/laravel./blob/9d803b5fee2f460468c3373a47de5e4fcc1fa0ed/app/Http/Controllers/Clientcontroller.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade
```


## License: unknown
https://github.com/hodamagdi/laravel./blob/9d803b5fee2f460468c3373a47de5e4fcc1fa0ed/app/Http/Controllers/Clientcontroller.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade
```


## License: unknown
https://github.com/hodamagdi/laravel./blob/9d803b5fee2f460468c3373a47de5e4fcc1fa0ed/app/Http/Controllers/Clientcontroller.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade
```


## License: unknown
https://github.com/hodamagdi/laravel./blob/9d803b5fee2f460468c3373a47de5e4fcc1fa0ed/app/Http/Controllers/Clientcontroller.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/DrGarciaDev/api-laravel-passport-1/blob/56b59a502840e3ba200b832331caae9ee2ed35f3/resources/views/client.blade.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/samuel-rodrigues-silva/projeto_pousada/blob/27741981dd905fec5a3b49d05c97a3fdef54dc22/PHP-bd3/clients.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @
```


## License: unknown
https://github.com/ak-gee/ZenBootCamp/blob/eaa387c3a6855e6499009200bbab69c898c78143/Assignment%20HTML-DOM-FORM/index.html

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1
```


## License: unknown
https://github.com/ak-gee/ZenBootCamp/blob/eaa387c3a6855e6499009200bbab69c898c78143/Assignment%20HTML-DOM-FORM/index.html

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1
```


## License: unknown
https://github.com/ak-gee/ZenBootCamp/blob/eaa387c3a6855e6499009200bbab69c898c78143/Assignment%20HTML-DOM-FORM/index.html

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1
```


## License: unknown
https://github.com/ak-gee/ZenBootCamp/blob/eaa387c3a6855e6499009200bbab69c898c78143/Assignment%20HTML-DOM-FORM/index.html

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1
```


## License: unknown
https://github.com/ak-gee/ZenBootCamp/blob/eaa387c3a6855e6499009200bbab69c898c78143/Assignment%20HTML-DOM-FORM/index.html

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1
```


## License: unknown
https://github.com/ak-gee/ZenBootCamp/blob/eaa387c3a6855e6499009200bbab69c898c78143/Assignment%20HTML-DOM-FORM/index.html

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1
```


## License: unknown
https://github.com/ak-gee/ZenBootCamp/blob/eaa387c3a6855e6499009200bbab69c898c78143/Assignment%20HTML-DOM-FORM/index.html

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1
```


## License: unknown
https://github.com/dukinfotech/quetpagefacebook/blob/3eedb740ba63f580481525d97c7ec210cab27e23/routes/auth.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 
```


## License: unknown
https://github.com/dukinfotech/quetpagefacebook/blob/3eedb740ba63f580481525d97c7ec210cab27e23/routes/auth.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 
```


## License: unknown
https://github.com/dukinfotech/quetpagefacebook/blob/3eedb740ba63f580481525d97c7ec210cab27e23/routes/auth.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 
```


## License: unknown
https://github.com/levi-zustiak/laravel-fours/blob/f83e367f5f1d5069fcc27ec6275e3671f32c6129/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, '
```


## License: unknown
https://github.com/dukinfotech/quetpagefacebook/blob/3eedb740ba63f580481525d97c7ec210cab27e23/routes/auth.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 
```


## License: unknown
https://github.com/levi-zustiak/laravel-fours/blob/f83e367f5f1d5069fcc27ec6275e3671f32c6129/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, '
```


## License: unknown
https://github.com/dukinfotech/quetpagefacebook/blob/3eedb740ba63f580481525d97c7ec210cab27e23/routes/auth.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 
```


## License: unknown
https://github.com/levi-zustiak/laravel-fours/blob/f83e367f5f1d5069fcc27ec6275e3671f32c6129/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, '
```


## License: unknown
https://github.com/dukinfotech/quetpagefacebook/blob/3eedb740ba63f580481525d97c7ec210cab27e23/routes/auth.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, '
```


## License: unknown
https://github.com/levi-zustiak/laravel-fours/blob/f83e367f5f1d5069fcc27ec6275e3671f32c6129/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, '
```


## License: unknown
https://github.com/surovigroup/sel_crm/blob/8a0ecedbf1583bafc5b9e0b7d3ecaa743dcc411b/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put
```


## License: unknown
https://github.com/surovigroup/sel_crm/blob/8a0ecedbf1583bafc5b9e0b7d3ecaa743dcc411b/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put
```


## License: unknown
https://github.com/surovigroup/sel_crm/blob/8a0ecedbf1583bafc5b9e0b7d3ecaa743dcc411b/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put
```


## License: unknown
https://github.com/surovigroup/sel_crm/blob/8a0ecedbf1583bafc5b9e0b7d3ecaa743dcc411b/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put
```


## License: unknown
https://github.com/surovigroup/sel_crm/blob/8a0ecedbf1583bafc5b9e0b7d3ecaa743dcc411b/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put
```


## License: unknown
https://github.com/surovigroup/sel_crm/blob/8a0ecedbf1583bafc5b9e0b7d3ecaa743dcc411b/routes/web.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put
```


## License: unknown
https://github.com/munshif/microservice_task/blob/727bf7158b9d5725a7263db9a3542dd8dbf4e485/lead/routes/api.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put('/leads/{id}', [LeadController::class, 'update']);
        Route::delete('/leads/{id}', [LeadController::class, 'destroy']);
        Route::post('/leads/{id}/convert', [LeadController::class, 'convert']);
    
```


## License: unknown
https://github.com/munshif/microservice_task/blob/727bf7158b9d5725a7263db9a3542dd8dbf4e485/lead/routes/api.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put('/leads/{id}', [LeadController::class, 'update']);
        Route::delete('/leads/{id}', [LeadController::class, 'destroy']);
        Route::post('/leads/{id}/convert', [LeadController::class, 'convert']);
    
```


## License: unknown
https://github.com/munshif/microservice_task/blob/727bf7158b9d5725a7263db9a3542dd8dbf4e485/lead/routes/api.php

```
All files completed:

[app/Http/Controllers/ClientController.php](app/Http/Controllers/ClientController.php)

    <?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Client;
    
    class ClientController extends Controller
    {
        public function index()
        {
            $clients = Client::orderByDesc('id')->get();
    
            return view('clients.index', ['clients' => $clients]);
        }
    
        public function show($id)
        {
            $client = Client::findOrFail($id);
    
            return view('clients.show', ['client' => $client]);
        }
    }

[resources/views/clients/index.blade.php](resources/views/clients/index.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clients</title>
    </head>
    <body>
        <h1>Clients</h1>
    
        @if ($clients->isEmpty())
            <p>No clients found.</p>
        @else
            <table border="1" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Service Type</th>
                        <th>Price</th>
                        <th>Timeline</th>
                        <th>Stage</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_code }}</td>
                            <td>{{ $client->service_type }}</td>
                            <td>{{ $client->price }}</td>
                            <td>{{ $client->timeline }}</td>
                            <td>{{ $client->stage }}</td>
                            <td>{{ $client->assigned_growth_id }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        <p><a href="/leads">Back to Leads</a></p>
    </body>
    </html>

[resources/views/clients/show.blade.php](resources/views/clients/show.blade.php)

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Details</title>
    </head>
    <body>
        <h1>Client Details</h1>
    
        <div>
            <p><strong>Client Code:</strong> {{ $client->client_code }}</p>
            <p><strong>Service Type:</strong> {{ $client->service_type }}</p>
            <p><strong>Price:</strong> {{ $client->price }}</p>
            <p><strong>Timeline:</strong> {{ $client->timeline }}</p>
            <p><strong>Stage:</strong> {{ $client->stage }}</p>
            <p><strong>Assigned Growth ID:</strong> {{ $client->assigned_growth_id }}</p>
        </div>
    
        <p><a href="/clients">Back to Clients</a></p>
    </body>
    </html>

[routes/web.php](routes/web.php)

    <?php
    
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\ClientController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\PinController;
    use Illuminate\Support\Facades\Route;
    
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/verify-pin', [PinController::class, 'showPin'])->name('pin.show');
        Route::post('/verify-pin', [PinController::class, 'verifyPin'])->name('pin.verify');
    
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/leads', [LeadController::class, 'index']);
        Route::get('/leads/create', [LeadController::class, 'create']);
        Route::post('/leads', [LeadController::class, 'store']);
        Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);
        Route::put('/leads/{id}', [LeadController::class, 'update']);
        Route::delete('/leads/{id}', [LeadController::class, 'destroy']);
        Route::post('/leads/{id}/convert', [LeadController::class, 'convert']);
    
```

