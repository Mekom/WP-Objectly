<?php
namespace oowp\tests\tests\post\support;

use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class CustomFieldsTest extends OOWPTestCase {
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

    public function testGetEmptyPostMeta() {
        $this->assertEmpty($this->post->getPostMeta("empty"));
    }

    public function testSetGetPostMeta() {
        $this->post->setPostMeta("key", "value");
        $this->assertEquals("value", $this->post->getPostMeta("key"));
    }

    public function testOverridePostMeta() {
        $this->post->setPostMeta("key", "value");
        $this->assertEquals("value", $this->post->getPostMeta("key"));
        $this->post->setPostMeta("key", "new value");
        $this->assertEquals("new value", $this->post->getPostMeta("key"));
    }

    public function testHasPostMeta() {
        $this->assertFalse($this->post->hasPostMeta("key"));
        $this->post->setPostMeta("key", "value");
        $this->assertTrue($this->post->hasPostMeta("key"));
    }

    public function testSettingWithAnArray() {
        $this->post->setPostMeta("array", array("hello" => "world"));
        $this->assertEquals(
            array("hello" => "world"),
            $this->post->getPostMeta("array")
        );
    }

    public function testRemovePostMeta() {
        $this->post->setPostMeta("key", "value");
        $this->assertTrue($this->post->hasPostMeta("key"));
        $this->post->deletePostMeta("key");
        $this->assertFalse($this->post->hasPostMeta("key"));
    }
}
