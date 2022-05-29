<?php 
namespace smsm_mvc\core\controllers;

use smsm_mvc\core\app\Application;
use smsm_mvc\core\app\uploadImage;
use smsm_mvc\core\models\profileModel;

class profileController extends abstractController 
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new profileModel;
        $this->data["title"] = "profile";
        $this->data['model'] = $this->model;
        $this->data['links'] = [
            "css" => ["profile"] ,
            "js" => ["profile"] ,
        ];

    }

    public function profile()
    {
        $this->response->renderView("profile" ,$this->data );
    }

    public function saveProfile()
    {
        $id = (int)$this->session->userId;
        $data = $this->request->getBody();
        $model =  $this->model;
        $rules = $this->model->rules($id);
        if( $this->validate->isValid( $model ,$rules, $data))
        {
            if($this->model->updateProfileInfo($id , $data))
            {
                $this->jData['succ'] =  "done";
                $this->session->flashMsg("success" , " you have updated ypur profile succuflly");
                $this->json();
            }
        }else
        {
            $this->jData['errors'] =  $this->validate->getErrors();
            $this->json();
        }


    }
    public function updateProfileImage()
    {
        $id = (int)$this->session->userId;
        $upload = new uploadImage("image");
        if(!$upload->move(PROFILE_PATH))
        {
            $errors =  $upload->showErrors();
        
            foreach($errors as $key=>$value)
            {
                $this->validate->addCustomError("image" , $value);
            }
            $this->jData['errors'] =  $this->validate->getErrors();
            $this->json();
        }else
        {
            $imagName = $upload->getFileSavedNameInDb();
            if($this->model->updateProfileImage($id , $imagName))
            {
                $this->jData['succ'] =  "done";
                $this->session->flashMsg("success_img" , " you have updated your profile image succuflly");
                $this->json();
            }
        }

    }


}