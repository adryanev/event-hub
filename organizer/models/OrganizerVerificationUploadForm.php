<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/22/2019
 * Time: 3:52 PM
 */

namespace organizer\models;


use Carbon\Carbon;
use common\models\OrganizerVerification;
use yii\base\Model;
use yii\db\Exception;
use Yii\web\UploadedFile;

class OrganizerVerificationUploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $verificationFiles;
    private $_organizerVerification;
    private $_filenames;

    public function rules()
    {

        return[
          [['verificationFiles'],'file','skipOnEmpty'=> false, 'extensions'=> 'png, jpg, jpeg', 'maxFiles'=>4]
        ];
    }

    public function upload(){
        if($this->validate()){
            foreach ($this->verificationFiles as $file){
                $path = \Yii::getAlias('@organizer/web/upload/verification');
                $file->saveAs($path . '/'.\Yii::$app->user->identity->getId().'-'.$file->getBaseName().'-'.Carbon::now()->timestamp.'.'.$file->getExtension());
            }
        }
    }
    public function getOrganizerVerification($id){
        if($this->_organizerVerification === null){
            $this->_organizerVerification = OrganizerVerification::findAll(['id_organizer'=>$id]);
        }
        return $this->_organizerVerification;
    }

    public function saveToDb(){
        if($this->validate()){
            \Yii::$app->db->beginTransaction();
            foreach ($this->verificationFiles as $file){
                $model = new OrganizerVerification();
                    $model->id_organizer = \Yii::$app->user->identity->getId();
                    $model->verification_file = \Yii::$app->user->identity->getId().'-'.$file->getBaseName().'-'.Carbon::now()->timestamp.'.'.$file->getExtension();
                    $model->save();
            }
            try {
                \Yii::$app->db->transaction->commit();
            } catch (Exception $e) {
                \Yii::error($e->getMessage(),__METHOD__);
            }
            return true;
        }
        return false;
    }
}