<?php

use smsm_mvc\core\app\user;


?>
<?php $this->view->startPostForm($model , $this->request->baseUrl()."profile/saveProfile"); ?>
<div class="card" style="width: 18rem;margin-top: 50px">
  <img src="../../../smsm_mvc/public/uploades/images/profile.jpg" class="card-img-top profile_iamge" alt="...">
  <input type="file" class='profile_image_input' name='image'>
  
  <span class="text-center display_name"><?= user::displayName()  ?></span>
  <div class="card-body">
        <?php 
            $this->view->flashMsg('success');
        ?>
    <ul class="list-group">
        <li class="main-list list-group-item d-flex justify-content-between align-items-start">
            <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                Profile Info
                <button type="button" class="btn btn-outline-light btn-sm edit_profile">Edit</button>
            </button>
        </li>
        <li class="list-group-item">
                <div class="ms-2 me-auto">
                <div class="fw-bold">Email</div>
                       <span class="info"> <?= user::displayEmail()?></span>
                </div>
                <div class="input_profile hide error_email">
                    <input type="email" class="form-control" value="<?= user::displayEmail() ?>" name="email"
                    placeholder="type your Email">
                </div>
                         
               
        </li>
        <li class="list-group-item">
                <div class="ms-2 me-auto">
                <div class="fw-bold">Gender</div>
               <span class="info"> <?= (user::displayGender()) ?? 'not set' ?></span>
                </div>
                <div class="input_profile hide error_gender">
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                        <?= (user::displayGender() == null || user::displayGender() == 'male') ? 'checked' : ''?> 
                        >
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                        <?=  user::displayGender() == 'female' ? 'checked' : ''?> 
                         >
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                </div>
               
        </li>
        <li class="list-group-item">
                <div class="ms-2 me-auto">
                <div class="fw-bold">Mobile</div>
                <span class="info"><?= user::displayMobile()?></span>
                </div>
                <div class="input_profile hide error_mobile">
                    <input type="mobile" class="form-control" value="<?= user::displayMobile() ?>" name="mobile" placeholder="type your Mobile Number">
                </div>
               
        </li>
        <li class="list-group-item">
                <div class="ms-2 me-auto">
                <div class="fw-bold">Bio</div>
                <span class="info"> <?= user::displayBio()?></span>
                </div>
                <div class="input_profile hide error_bio">
                    <!-- <input type="text" class="form-control" value="<?= user::displayBio() ?>" name="bio"
                    placeholder="write about your self"> -->
                    <textarea name="bio" placeholder="write about your self" class="form-control" maxlength="200" style="max-height: 80px;"><?= user::displayBio() ?></textarea>
                </div>
               
        </li>
        <li class="main-list list-group-item d-flex justify-content-between align-items-start list_edit hide" style="margin-top: 10px;">
            <button type="button" class="btn btn-success btn-sm save_profile">save</button>
            <button type="button" class="btn btn-secondary btn-sm cancel_profile">cancel</button>
        </li>
    </ul>
  </div>
</div>
<?php $this->view->endForm(); ?>