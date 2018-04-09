laravel-keycloak
==============

About
--------------

URL: [https://git.bootshearingcare.biz/packages/laravel-keycloak/tree/master](https://git.bootshearingcare.biz/packages/laravel-keycloak/tree/master)

Author: ThomasMountain

A package to manage authentication between Laravel and Keycloak.
The package will redirect users to Keycloak for authentication on load of the '/auth' URI


To Install
--------------
1. Add the following to composer.json
```
"repositories": [
        {
            "type": "vcs",
            "url": "https://git.bootshearingcare.biz/packages/laravel-keycloak.git"
        }
    ],
```

2. Add the following to the require section
```
    "ThomasMountain/laravel-keycloak": "dev-master"
```


After Install
--------------


1. Add the following to web.php
```
Route::get('auth/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('auth', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('auth/logout', 'Auth\LoginController@keycloakLogout');
```


2. Add the following records to .env

```
KEYCLOAK_CLIENT_ID=
KEYCLOAK_AUTH_URL=
KEYCLOAK_REDIRECT_URI=
KEYCLOAK_REDIRECT_URL=
KEYCLOAK_URL=
KEYCLOAK_LOGOUT_REDIRECT_URI=
KEYCLOAK_REALM=
KEYCLOAK_CLIENT_SECRET=
KEYCLOAK_TOKEN_URL=
KEYCLOAK_USERINFO_URL=
```

Token Url, Auth Url and UserInfo Url can be grabbed from [https://sso.bhcintranet.co.uk:8443/auth/realms/master/.well-known/openid-configuration](https://sso.bhcintranet.co.uk:8443/auth/realms/master/.well-known/openid-configuration)

(Replace 'master' with realm name if you are not using the master realm!)

3. Ensure the following fields are added to the user table migration and ensure they can be mass assigned in your User model:

```
'email',
'keycloak_id',
'first_name',
'surname',
'email',
'username'
```

4. Remember to add 'keycloakLogout' to list of routes exempt from auth middleware

Events
--------------

The application fires an Event upon User Creation. This can be caught in the EventServiceProvider with the following:

```
'ThomasMountain\LaravelKeycloak\Events\UserWasCreated' => [
    'App\Listeners\MyEventListener'
]

```