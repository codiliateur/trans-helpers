# trans-helpers

To install run command

    composer require codiliateur/trans-helpers

Package provides next helper functions

## function trans_r

    trans_r($key, $replaces, $locale)

All parameters are the same as in the standard `trans()`

If you have a translation key that assigned to array of translations, this function 
guarantees to get missing translations from the fallback locale for all 
missing end-keys.

### Example

./lang/**en**/models/person.php

```
return [
    "attributes" => [
        "id" => "ID",
        "first_name" => "First Name",
        "last_name" => "Last Name",
        "age" => "Age",
    ]
];
```

./lang/**fr**/models/person.php

```
return [
    "attributes" => [
        "first_name" => "Prénome",
        "last_name" => "Nom de famille",
    ]
];
```

Call `trans_r('models/person.attributes', [], 'fr')` returns all keys

```
[
    "id" => "ID",                       // 'en' - fallback locale
    "first_name" => "Prénome",          // 'fr'
    "last_name" => "Nom de famille",    // 'fr'
    "age" => "Age",                     // 'en' - fallback locale
];
```

unlike the standard function call returns just keys from french lang-file

```
[
    "first_name" => "Prénome",          // 'fr'
    "last_name" => "Nom de famille",    // 'fr'
];
```
