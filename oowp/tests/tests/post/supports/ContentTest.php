<?php
namespace oowp\tests\tests\post\support;

use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class ContentTest extends OOWPTestCase {
    private $post;

    private $postData = array(
        "post_title"     => "this-is-my-title",
        "post_content"   => "my content",
        "post_name"      => "my-name"
    );

    public function setUp() {
        $id = PostObject::insertPost($this->postData);
        $post = Post::fromPostID($id);
        $this->post = $post;
    }

    public function testGetContent() {
        $this->assertEquals(
            $this->postData["post_content"],
            $this->post->getPostContent()
        );
    }

    public function testSetContent() {
        $this->post->setPostContent("the new content");
        $this->assertEquals(
            "the new content",
            $this->post->getPostContent()
        );
    }
}
