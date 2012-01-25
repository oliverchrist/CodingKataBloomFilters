<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dictionary
 *
 * @author christ
 */
class Dictionary {
    private $words;
    private $wordsHash;
    public $hashLength;

    public function __construct($filepath, $hashLength) {
		$this->words = file($filepath);
        $this->hashLength = $hashLength;
        foreach($this->words as $word){
            $this->wordsHash[$this->createHash($word)] = true;
        }
        echo count($this->words);
    }
    
    public function createHash($str){
        $hash = substr(md5(trim($str)), 0, $this->hashLength);
        return $hash;
    }
    
    public function checkDictionary($str){
        $hash = $this->createHash(trim($str));
        if(array_key_exists ($hash , $this->wordsHash)){
            return true;
        }
        return false;
    }
    
    public function checkDictionaryComplete(){
        $countErrors = 0;
        foreach($this->words as $word){
            if($this->checkDictionary($word) == false){
                $countErrors++;
            }
        }
        return $countErrors;
    }
}

?>
