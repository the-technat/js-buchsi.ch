<?php
return [
  'debug' => true,
  'email' => [
    'transport' => [
      'type' => 'smtp',
      // use the hostname defined in the docker compose file
      'host' => 'mailhog',
      // the ports needs to be the port inside the container,
      // i.e. 1025 no matter what you use locally
      'port' => 1025,
      'security' => false,
    ]
  ],
];

