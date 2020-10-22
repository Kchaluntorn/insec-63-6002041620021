<?php

use yii\db\Migration;

/**
 * Class m201022_104856_create_permission_of_post
 */
class m201022_104856_create_permission_of_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $name = array ('post-create','post-index','post-update','post-delete','post-view');
        $desc = array ('Create a post','List a post','Update a post','Delete a post','View a post');
        for($i=0;$i<sizeof($name);$i++){
          $a =  $auth->CreatePermission($name[$i]);
            $a ->description = $desc[$i];
            $auth->add($a);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $name = array ('post-create','post-index','post-view','post-delete','post-update');
        for($i=0;$i<sizeof($name);$i++){
            $a = $auth->getPermission($name[$i]);
            if($a){
                $auth->remove($a);
            }
        }

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_104856_create_permission_of_post cannot be reverted.\n";

        return false;
    }
    */
}
