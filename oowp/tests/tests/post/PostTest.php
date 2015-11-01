<?php
namespace oowp\tests\tests\post;

use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class PostTest extends OOWPTestCase {
    private $post;

    private $postData = array(
        "post_type"      => "post",
        "post_title"     => "title",
        "post_content"   => "content",
        "post_permalink" => "https://example.org/perma"
    );

    private $postMeta = array(
        "meta" => "value"
    );

    public function setUp() {
        $id = PostObject::insertPost($this->postData);
        $post = Post::fromPostID($id);
        $this->post = $post;

        foreach($this->postMeta as $key => $value) {
            $post->setPostMeta($key, $value);
        }
    }

    public function testGetPostType() {
        $this->assertEquals(
            "post",
            $this->post->getPostType(),
            "Failed to get post type"
        );
    }

    /**
     * Get the post title
     *
     * @return string The title
     */
    public function testGetPostTitle() {
        $this->assertEquals(
            $this->postData["post_title"],
            $this->post->getPostTitle(),
            "Failed to GetPostTitle"
        );
    }

    /**
     * Set the post title
     *
     *
     * @param string $title The new title
     * @return void
     */
    public function testSetPostTitle() {
        $content = "this is the title";
        $this->post->setPostTitle($content);
        $this->assertEquals(
            $content,
            $this->post->getPostTitle(),
            "Failed to get post title"
        );
    }

    /**
     * Get the post content
     *
     * @return string the content
     */
    public function testGetPostContent() {
        $this->assertEquals(
            $this->postData["post_content"],
            $this->post->getPostContent(),
            "Failed to GetPostContent"
        );
    }

    /**
     * Set the post content
     *
     *
     * @param string $content The new content
     * @return void
     */
    public function testSetPostContent() {
        $content = "this is some content";
        $this->post->setPostContent($content);
        $this->assertEquals(
            $content,
            $this->post->getPostContent(),
            "Failed to get post content"
        );
    }

    /**
     * Get the post permalink
     *
     * @return string The permalink
     */
    public function testGetPostPermalink() {
        $this->assertEquals(
            "http://example.org/?p=" . $this->post->getPostID(),
            $this->post->getPostPermalink(),
            "Failed to GetPostPermalink"
        );
    }

    /**
     * Get a post meta.
     * Returns null if there is no value
     *
     * @param string $key
     * @return string|null The value for the meta.
     */
    public function testGetPostMeta() {
        $this->assertEquals(
            $this->postMeta["meta"],
            $this->post->getPostMeta("meta"),
            "Failed to GetPostMeta"
        );
    }

    /**
     * Set the value of a meta
     * Creates the meta key if it does not already exist
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function testSetPostMeta() {
        $this->post->setPostMeta("meta", "abc");
        $this->assertEquals(
            "abc",
            $this->post->getPostMeta("meta"),
            "Failed to set post meta"
        );
    }
}
