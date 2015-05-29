<?php

use Cake\Database\Type;

/**
 * Load the json database type
 * @see RevisionsTable
 */
Type::map('json', 'Revisions\Database\Type\JsonType');