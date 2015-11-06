<?php
namespace oowp\tests\tests\post\support;

use oowp\post\Post;
use oowp\post\PostObject;
use oowp\user\User;

use oowp\tests\OOWPTestCase;

class AuthorTest extends OOWPTestCase {
    private $post;

    private $postData = array(
        "post_title"     => "this-is-my-title",
    );

    public function setUp() {
        $id = PostObject::insertPost($this->postData);
        $post = Post::fromPostID($id);
        $this->post = $post;
        $this->post->setPostAuthor(User::fromUserID(1));
    }

    public function testGetAuthor() {
        $this->assertEquals(1, $this->post->getPostAuthor()->getUserID());
    }
}
