<?php
namespace oowp\tests\tests\post\support;

use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class TitleTest extends OOWPTestCase {
    private $post;

    private $postData = array(
        "post_title"     => "title",
        "post_name"      => "my-name"
    );

    public function setUp() {
        $id = PostObject::insertPost($this->postData);
        $post = Post::fromPostID($id);
        $this->post = $post;
    }

    public function testGetTitle() {
        $this->assertEquals(
            $this->postData["post_title"],
            $this->post->getPostTitle()
        );
    }

    public function testSetTitle() {
        $this->post->setPostTitle("new title");
        $this->assertEquals(
            "new title",
            $this->post->getPostTitle()
        );
    }
}
