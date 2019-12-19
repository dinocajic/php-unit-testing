<?php

class UserTest extends \PHPUnit\Framework\TestCase {

    protected $_user;

    public function setUp() : void {
        $this->_user = new \App\Models\User;
    }

    /** @test */
    public function that_we_can_get_the_first_name() {
        $this->_user->setFirstName('Dino');

        $this->assertEquals(
            $this->_user->getFirstName(), 
            'Dino'
        );
    }

    /** @test */
    public function that_we_can_get_the_last_name() {

        $this->_user->setLastName('Cajic');
        
        $this->assertEquals(
            $this->_user->getLastName(),
            'Cajic'
        );
    }

    /** @test */
    public function that_full_name_is_returned() {
        $this->_user->setFirstName('Dino');
        $this->_user->setLastName('Cajic');

        $this->assertEquals(
            $this->_user->getFullName(),
            'Dino Cajic'
        );
    }

    /** @test */
    public function that_first_and_last_name_are_trimmed() {
        $this->_user->setFirstName(' Dino   ');
        $this->_user->setLastName('Cajic  ');
        
        $this->assertEquals(
            $this->_user->getFirstName(),
            'Dino'
        );

        $this->assertEquals(
            $this->_user->getLastName(),
            'Cajic'
        );
    }

    /** @test */
    public function that_email_address_can_be_set() {
        $email = 'dinocajic@gmail.com';

        $this->_user->setEmail($email);
        
        $this->assertEquals(
            $this->_user->getEmail(),
            $email
        );
    }

    /** @test */
    public function that_email_variables_contain_correct_values() {
        $this->_user->setFirstName('Dino  ');
        $this->_user->setLastName(' Cajic ');
        $this->_user->setEmail(' dinocajic@gmail.com ');

        $emailVariables = $this->_user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals(
            $emailVariables['full_name'], 
            'Dino Cajic'
        );

        $this->assertEquals(
            $emailVariables['email'], 
            'dinocajic@gmail.com'
        );
    }
}
