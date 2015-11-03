<?php
namespace oowp\tests\tests\post\support;

use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class SlugTest extends OOWPTestCase {
    private $post;

    private $postData = array(
        "post_title"     => "this-is-my-title",
        "post_name"      => "my-name"
    );

    public function setUp() {
        $id = PostObject::insertPost($this->postData);
        $post = Post::fromPostID($id);
        $this->post = $post;
    }

    public function testGetSlug() {
        $this->assertEquals(
            $this->postData["post_name"],
            $this->post->getPostSlug()
        );
    }

    public function testSetSlug() {
        $this->post->setPostSlug("new-slug");
        $this->assertEquals(
            "new-slug",
            $this->post->getPostSlug("my-slug")
        );
    }
}
