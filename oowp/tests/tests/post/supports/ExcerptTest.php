<?php
namespace oowp\tests\tests\post\support;

use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class ExcerptTest extends OOWPTestCase {
    private $post;

    private $postData = array(
        "post_title"     => "this-is-my-title",
        "post_excerpt"   => "my excerpt"
    );

    public function setUp() {
        $id = PostObject::insertPost($this->postData);
        $post = Post::fromPostID($id);
        $this->post = $post;
    }

    public function testGetExcerpt() {
        $this->assertEquals(
            $this->postData["post_excerpt"],
            $this->post->getPostExcerpt()
        );
    }

    public function testSetExcerpt() {
        $this->post->setPostExcerpt("my new excerpt");
        $this->assertEquals(
            "my new excerpt",
            $this->post->getPostExcerpt()
        );
    }
}
