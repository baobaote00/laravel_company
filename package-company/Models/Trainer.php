<?php

namespace Foostart\Company\Models;

use Foostart\Category\Library\Models\FooModel;
use Illuminate\Database\Eloquent\Model;

class Trainer extends FooModel
{

    /**
     * @table categories
     * @param array $attributes
     */
    public $user = NULL;
    public function __construct(array $attributes = array())
    {
        //set configurations
        $this->setConfigs();

        parent::__construct($attributes);
    }

    public function setConfigs()
    {

        //table name
        $this->table = 'trainer';

        //list of field in table
        $this->fillable = [
            'user_id',
            'company_id',
            'is_leader'
        ];

        //list of fields for inserting
        $this->fields = [
            'user_id' => [
                'name' => 'user_id',
                'type' => 'Int',
            ],
            'company_id' => [
                'name' => 'company_id',
                'type' => 'Int',
            ],
            'is_leader' => [
                'name' => 'is_leader',
                'type' => 'Int', //tinyint
            ],
        ];

        //check valid fields for inserting
        $this->valid_insert_fields = [
            'user_id',
            'company_id',
            'id_leader',
        ];

        //check valid fields for ordering
        $this->valid_ordering_fields = [
            'updated_at',
            $this->field_status,
        ];

        //primary key
        $this->primaryKey = 'id';

        //the number of items on page
        $this->perPage = 10;

        //item status
        $this->field_status = 'trainer_status';
    }
    /**
     * Gest list of items
     * @param type $params
     * @return object list of categories
     */
    public function selectItems($params = array())
    {

        //join to another tables
        $elo = $this->joinTable();

        //search filters
        $elo = $this->searchFilters($params, $elo);

        //select fields
        $elo = $this->createSelect($elo);

        //order filters
        $elo = $this->orderingFilters($params, $elo);

        //paginate items
        if ($this->is_pagination) {
            $items = $this->paginateItems($params, $elo);
        } else {
            $items = $elo->get();
        }

        return $items;
    }
    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    protected function joinTable(array $params = [])
    {
        return $this;
    }
    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    protected function searchFilters(array $params = [], $elo, $by_status = TRUE)
    {
        //filter
        if ($this->isValidFilters($params) && (!empty($params))) {

            foreach ($params as $column => $value) {

                if ($this->isValidValue($value)) {
                    switch ($column) {
                        case 'user_id':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.user_id', '=', $value);
                            }
                            break;
                        case 'limit':
                            if (!empty($value)) {
                                $this->perPage = $value;
                                $elo = $elo->limit($value);
                            }
                            break;
                        case '_id':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.id', '!=', $value);
                            }
                            break;
                        case 'status':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.' . $this->field_status, '=', $value);
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
        } elseif ($by_status) {

            $elo = $elo->where($this->table . '.' . $this->field_status, '=', $this->config_status['publish']);
        }

        return $elo;
    }
    /**
     * Select list of columns in table
     * @param ELOQUENT OBJECT
     * @return ELOQUENT OBJECT
     */
    public function createSelect($elo)
    {
        $elo = $elo->select(
            $this->table . '.*',
            $this->table . '.id as id'
        );

        return $elo;
    }
    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    public function paginateItems(array $params = [], $elo)
    {
        $items = $elo->paginate($this->perPage);

        return $items;
    }
    /**
     *
     * @param ARRAY $params list of parameters
     * @return OBJECT company
     */
    public function insertItem($params = [])
    {

        $dataFields = $this->getDataFields($params, $this->fields);

        $dataFields[$this->field_status] = $this->config_status['publish'];

        $item = self::create($dataFields);

        $key = $this->primaryKey;
        $item->id = $item->$key;

        return $item;
    }
}
