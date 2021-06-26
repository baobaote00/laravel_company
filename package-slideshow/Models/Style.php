<?php namespace Foostart\Slideshow\Models;

use Foostart\Category\Library\Models\FooModel;
use Illuminate\Database\Eloquent\Model;

class Style extends FooModel {

    /**
     * @table categories
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {
        //set configurations
        $this->setConfigs();

        parent::__construct($attributes);

    }

    public function setConfigs() {

        //table name
        $this->table = 'slideshow_styles';

        //list of field in table
        $this->fillable = array_merge($this->fillable, [
            'style_name',
            'style_image',
            'style_view_file',
            'style_js_file',
            'style_js_file',
            'style_view_content',
        ]);

        //list of fields for inserting
        $this->fields = array_merge($this->fields, [
            'style_name' => [
                'name' => 'style_name',
                'type' => 'Text',
            ],
            'style_image' => [
                'name' => 'style_image',
                'type' => 'Text',
            ],
            'style_view_file' => [
                'name' => 'style_view_file',
                'type' => 'Text',
            ],
            'style_js_file' => [
                'name' => 'js-file',
                'type' => 'Json',
            ],
            'style_css_file' => [
                'name' => 'css-file',
                'type' => 'Json',
            ],
            'style_view_content' => [
                'name' => 'style_view_content',
                'type' => 'Text',
            ],
        ]);

        //check valid fields for inserting
        $this->valid_insert_fields = array_merge($this->valid_insert_fields, [
            'style_name',
            'style_image',
            'style_view_file',
            'style_js_file',
            'style_css_file',
            'style_view_content',
        ]);

        //check valid fields for ordering
        $this->valid_ordering_fields = [
            'style_name',
            'updated_at',
            $this->field_status,
        ];
        //check valid fields for filter
        $this->valid_filter_fields = [
            'keyword',
            'status',
        ];

        //primary key
        $this->primaryKey = 'style_id';

    }

    /**
     * Gest list of items
     * @param type $params
     * @return object list of categories
     */
    public function selectItems($params = array()) {

        //join to another tables
        $elo = $this->joinTable();

        //search filters
        $elo = $this->searchFilters($params, $elo);

        //select fields
        $elo = $this->createSelect($elo);

        //order filters
        $elo = $this->orderingFilters($params, $elo);

        //paginate items
        $items = $this->paginateItems($params, $elo);

        return $items;
    }

    /**
     * Get a slideshow by {id}
     * @param ARRAY $params list of parameters
     * @return OBJECT slideshow
     */
    public function selectItem($params = array(), $key = NULL) {


        if (empty($key)) {
            $key = $this->primaryKey;
        }
       //join to another tables
        $elo = $this->joinTable();

        //search filters
        $elo = $this->searchFilters($params, $elo, FALSE);

        //select fields
        $elo = $this->createSelect($elo);

        //id
        $elo = $elo->where($this->primaryKey, $params['id']);

        //first item
        $item = $elo->first();

        return $item;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    protected function joinTable(array $params = []){
        return $this;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    protected function searchFilters(array $params = [], $elo, $by_status = TRUE){

        //filter
        if ($this->isValidFilters($params) && (!empty($params)))
        {
            foreach($params as $column => $value)
            {
                if($this->isValidValue($value))
                {
                    switch($column)
                    {
                        case 'style_name':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.style_name', '=', $value);
                            }
                            break;
                        case 'status':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.'.$this->field_status, '=', $value);
                            }
                            break;
                        case 'keyword':
                            if (!empty($value)) {
                                $elo = $elo->where(function($elo) use ($value) {
                                    $elo->where($this->table . '.style_name', 'LIKE', "%{$value}%")
                                    ->orWhere($this->table . '.style_view_file','LIKE', "%{$value}%")
                                    ->orWhere($this->table . '.style_js_file','LIKE', "%{$value}%")
                                    ->orWhere($this->table . '.style_css_file','LIKE', "%{$value}%")
                                    ->orWhere($this->table . '.style_view_content','LIKE', "%{$value}%");
                                });
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
        } elseif ($by_status) {

            $elo = $elo->where($this->table . '.'.$this->field_status, '=', $this->status['publish']);

        }

        return $elo;
    }

    /**
     * Select list of columns in table
     * @param ELOQUENT OBJECT
     * @return ELOQUENT OBJECT
     */
    public function createSelect($elo) {

        $elo = $elo->select($this->table . '.*',
                            $this->table . '.style_id as id'
                );

        return $elo;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    public function paginateItems(array $params = [], $elo) {
        $items = $elo->paginate($this->perPage);

        return $items;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @param INT $id is primary key
     * @return type
     */
    public function updateItem($params = [], $id = NULL) {

        if (empty($id)) {
            $id = $params['id'];
        }
        $field_status = $this->field_status;

        $slideshow = $this->selectItem($params);

        if (!empty($slideshow)) {
            $dataFields = $this->getDataFields($params, $this->fields);

            foreach ($dataFields as $key => $value) {
                $slideshow->$key = $value;
            }

            $slideshow->$field_status = $this->status['publish'];

            $slideshow->save();

            return $slideshow;
        } else {
            return NULL;
        }
    }


    /**
     *
     * @param ARRAY $params list of parameters
     * @return OBJECT slideshow
     */
    public function insertItem($params = []) {

        $dataFields = $this->getDataFields($params, $this->fields);

        $dataFields[$this->field_status] = $this->status['publish'];


        $item = self::create($dataFields);

        $key = $this->primaryKey;
        $item->id = $item->$key;

        return $item;
    }


    /**
     *
     * @param ARRAY $input list of parameters
     * @return boolean TRUE incase delete successfully otherwise return FALSE
     */
    public function deleteItem($input = [], $delete_type) {

        $item = $this->find($input['id']);

        if ($item) {
            switch ($delete_type) {
                case 'delete-trash':
                    return $item->fdelete($item);
                    break;
                case 'delete-forever':
                    return $item->delete();
                    break;
            }

        }

        return FALSE;
    }

    public function encodeImages($input) {
        $json_images = array();

        if (!empty($input['images'])) {
            foreach ($input['images'] as $index => $file_path) {
                if (!empty($file_path)) {
                    $json_images[] = array(
                        'file_path' => $file_path,
                        'text' => @$input['texts'][$index]
                    );
                }
            }
        }

        return json_encode($json_images);
    }

    /**
     * Get list of styles into select
     * @return OBJECT PLUCK SELECT
     */
     public function pluckSelect($params = []) {

         $elo = self::orderBy('style_name', 'ASC');

         $items = $elo->pluck('style_name', $this->primaryKey);

        return $items;
    }
}