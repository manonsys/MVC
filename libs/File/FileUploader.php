<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace File\Management;
/**
 * Description of FileUploader
 *
 * @author mostafa
 */
class FileUploader {
    
    public static function __upload($uploaddir = NULL, $fileUiControlName = NULL){
        if (move_uploaded_file($_FILES["$fileUiControlName"]["tmp_name"], $uploaddir)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
}
