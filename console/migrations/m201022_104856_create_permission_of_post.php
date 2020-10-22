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

//        $create =   $auth->CreatePermission('post-create');
//        $create->description = 'Create a post';
//        $auth->add($create);
//
//        $index =   $auth->CreatePermission('post-index');
//        $index->description = 'List a post';
//        $auth->add($index);
//
//        $update =   $auth->CreatePermission('post-update');
//        $update->description = 'Update a post';
//        $auth->add($update);
//
//        $delete =   $auth->CreatePermission('post-delete');
//        $delete->description = 'Delete a post';
//        $auth->add($delete);
//
//        $view =   $auth->CreatePermission('post-view');
//        $view->description = 'View a post';
//        $auth->add($view);

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
        $create = $auth->getRole('post-create');
        if($create){
            $auth->remove($create);
        }
        $index = $auth->getRole('post-index');
        if($index){
            $auth->remove($index);
        }
        $update = $auth->getRole('post-update');
        if($update){
            $auth->remove($update);
        }
        $delete = $auth->getRole('post-delete');
        if($delete){
            $auth->remove($delete);
        }
        $view = $auth->getRole('post-view');
        if($view){
            $auth->remove($view);
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
