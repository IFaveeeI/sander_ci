<?php

namespace App\Controllers;

use Ap\Models\UserModel;
use App\Models\GenderModel;


class USerController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function addUser()
    {
        $data = array();
        helper(['form']);

        //when submit button is clicked
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['first_name', 'middle_name', 'last_name', 'age','gender_id', 'email', 'password']);
            
            $rules = [
            'first_name' => ['label' => 'first name', 'rules' => 'required'],
            'middle_name' => ['label' => 'first name', 'rules' => 'permit_empty'],
            'last_name' => ['label' => 'last name', 'rules' => 'required'],
            'age' => ['label' => 'Age', 'rules' => 'required|numeric'],
            'gender_id' => ['label' => 'gender', 'rules' => 'required'],
            'email' => ['label' => 'email', 'rules' => 'required|is_unique[users.email]'],
            'password' => ['label' => 'password', 'rules' => 'required'],
            'confirm_password' => ['label' => 'confirm password', 'rules' => 'required_with[password]|matches[password]']
            ];
            
            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            }else {

            $post['password'] = sha1($post['password']);

            $usermodel = new \App\Models\UserModel();
            $usermodel->save($post);

            $session = session();
            $session->setFlashdata('success-add-user', 'User Sucessfully Saved!');

            return redirect()->to('/user/add');
            }
        }
        //fetchnall values from gender table
        $gendermodel = new GenderModel();
        $data['genders'] = $gendermodel->findAll();

        return view('user/add', $data);
    }
}