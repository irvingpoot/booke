<?php 

require_once 'funciones.php';
require_once 'database.php';
require_once __DIR__ . '/../models/ActiveRecord.php';

// Conectarnos a la base de datos
ActiveRecord::setDB($db);