<?php

use yii\db\Migration;
use yii\db\Schema;

class m170210_063432_place extends Migration
{
    public function up()
    {
        
    $tableOptions = null;
      if ($this->db->driverName === 'mysql') {
          $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
      }
  
          $this->createTable('{{%place}}', [
              'id' => Schema::TYPE_PK,
              'name' => Schema::TYPE_STRING.' NOT NULL',          
              'place_type' => Schema::TYPE_SMALLINT.' NOT NULL DEFAULT 0',
              'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
              'google_place_id' => Schema::TYPE_STRING.' NOT NULL', // e.g. google places id
              'created_by' => Schema::TYPE_INTEGER.' NOT NULL',
              'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
              'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
          ], $tableOptions);
          $this->addForeignKey('fk_place_created_by', '{{%place}}', 'created_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        

        if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM';
          }

          $this->createTable('{{%place_gps}}', [
              'id' => Schema::TYPE_PK,
              'place_id' => Schema::TYPE_INTEGER.' NOT NULL',
              'gps'=>'POINT NOT NULL',
          ], $tableOptions);
          $this->execute('create spatial index place_gps_gps on '.'{{%place_gps}}(gps);');
          $this->addForeignKey('fk_place_gps','{{%place_gps}}' , 'place_id', '{{%place}}', 'id', 'CASCADE', 'CASCADE');




    }

    public function down()
    {
        echo "m170210_063432_place cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
