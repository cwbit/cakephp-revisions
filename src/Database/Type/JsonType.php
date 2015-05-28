<?
namespace Revisions\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type;
use PDO;

/**
 * JSON Type 
 * @see http://book.cakephp.org/3.0/en/orm/database-basics.html#adding-custom-database-types
 */
class JsonType extends Type {

    public function toPHP($value, Driver $driver)    {
        if ($value === null):
            return null;
        endif;
        return json_decode($value, true);
    }

    public function marshal($value) {
        if (is_array($value) || $value === null):
            return $value;
        endif;
        return json_decode($value, true);
    }

    public function toDatabase($value, Driver $driver) {
        return json_encode($value);
    }

    public function toStatement($value, Driver $driver) {
        if ($value === null):
            return PDO::PARAM_NULL;
        endif;

        return PDO::PARAM_STR;
    }

}