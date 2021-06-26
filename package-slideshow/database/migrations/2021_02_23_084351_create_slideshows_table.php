<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;

class CreateSlideshowsTable extends FoostartMigration
{
    public function __construct() {
        $this->table = 'slideshows';
        $this->prefix_column = 'slideshow_';
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
            $table->integer('category_id')->comment('Category ID');
            $table->integer('style_id')->comment('Style ID');
            
            // Other attributes
            $table->string($this->prefix_column . 'name', 255)->comment('Slideshow name');
            $table->string($this->prefix_column . 'overview', 1000)->comment('Slideshow overview');            
            $table->text($this->prefix_column . 'description')->comment('Slideshow description');
            $table->string($this->prefix_column . 'image', 255)->nullable()->comment('Image path');
            $table->text($this->prefix_column . 'images')->nullable()->comment('List of image paths');
            
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
