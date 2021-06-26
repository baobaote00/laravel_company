<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;

class CreateSlideshowStylesTable extends FoostartMigration
{
    public function __construct() {
        $this->table = 'slideshow_styles';
        $this->prefix_column = 'style_';
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists($this->table);
        Schema::create($this->table, function (Blueprint $table) {
            
            $table->increments($this->prefix_column . 'id')->comment('Primary key');
            
            // Relation
            // Other attributes
            $table->string($this->prefix_column . 'name', 255)->comment('Style name');
            $table->string($this->prefix_column . 'image', 255)->comment('Style image');
            $table->string($this->prefix_column . 'view_file', 255)->comment('View file');            
            $table->string($this->prefix_column . 'js_file', 1000)->comment('Js file');            
            $table->string($this->prefix_column . 'css_file', 1000)->comment('Css file');            
            $table->text($this->prefix_column . 'view_content')->comment('View content');
            
            //Set common columns
            $this->setCommonColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
