<?php

return [
    'client_id'           => env('KEYCLOAK_CLIENT_ID'),
    'client_secret'       => env('KEYCLOAK_CLIENT_SECRET'),
    'redirect'            => env('KEYCLOAK_REDIRECT_URL'),
    'realm'               => env('KEYCLOAK_REALM'),
    'auth_url'            => env('KEYCLOAK_AUTH_URL', ''),
    'token_url'           => env('KEYCLOAK_TOKEN_URL', ''),
    'userinfo_url'        => env('KEYCLOAK_USERINFO_URL', ''),
    'logout_redirect_uri' => env('KEYCLOAK_LOGOUT_REDIRECT_URI'),
    'url'                 => env('KEYCLOAK_URL')
];