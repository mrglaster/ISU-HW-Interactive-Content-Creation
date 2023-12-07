<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Database connection check</title>
    </head>
    <body>
        <div>
            <?php 
                if (DB::connection()->getPdo()){
                    echo "Successfully connected to DB and DB name is " . DB::connection()->getDatabaseName();
                }
            ?>
        </div>    
    </body>
</html>