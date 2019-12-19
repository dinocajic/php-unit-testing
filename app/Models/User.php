<?php

namespace App\Models;

class User {

    private $_first_name;
    private $_last_name;
    private $_email;

    public function setFirstName($firstName) {
        $this->_first_name = trim($firstName);
    }

    public function getFirstName() {
        return $this->_first_name;
    }

    public function setLastName($lastName) {
        $this->_last_name = trim($lastName);
    }

    public function getLastName() {
        return $this->_last_name;
    }

    public function getFullName() {
        return $this->_first_name . ' ' . $this->_last_name;
    }

    public function setEmail($email) {
        $this->_email = trim($email);
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getEmailVariables() {
        return [
            'full_name' => $this->getFullName(),
            'email'     => $this->getEmail()
        ];
    }
}