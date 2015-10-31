<?php
namespace oowp\tests\tests\user;

use oowp\user\User;

use oowp\tests\OOWPTestCase;

class UserTest extends OOWPTestCase {

    public function testGetAllUsers() {
        $users = User::getAllUsers();
        $this->assertEquals(
            1,
            count($users),
            "Unexpected number of users"
        );
        $this->assertInstanceOf(
            'oowp\user\User',
            $users[0]
        );
    }

    public function testFromUserID() {
        $user = User::fromUserID(1);
        $this->assertEquals(
            1,
            $user->getUserID()
        );
    }

    public function testFromUserLogin() {
        $user = User::fromUserLogin('admin');
        $this->assertEquals(
            1,
            $user->getUserID()
        );
    }

    public function testFromUserEmail() {
        $user = User::fromUserEmail(WP_TESTS_EMAIL);
        $this->assertEquals(
            1,
            $user->getUserID()
        );
    }

    public function testFromUserSlug() {
        $user = User::fromUserSlug('admin');
        $this->assertEquals(
            1,
            $user->getUserID()
        );
    }

}
