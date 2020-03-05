<?php

// Loading all CONFIG and CLASSES
require 'bootstrap.php';

// List ALL clients
$clients = Client::getAll();

// Alert
$alert = new Alert();
$alert->get();

// Posted data (with errors)
$post_data = $alert->data();

// Loading INDEX view
require 'views/index.view.php';