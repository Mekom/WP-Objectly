<?php
namespace oowp\tests\tests\post\support;

use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class HierarchicalTest extends OOWPTestCase {
    private $parentPost;
    private $childPost;
    private $post;

    private $postData = array(
        "post_title"     => "post",
        "post_type"      => "post",
        "post_name"      => "post"
    );

    private $childPostData = array(
        "post_title"     => "child post",
        "post_type"      => "post",
        "post_name"      => "child-post"
    );

    private $parentPostData = array(
        "post_title"     => "parent post",
        "post_type"      => "post",
        "post_name"      => "parent-post"
    );

    public function setUp() {
        $id = PostObject::insertPost($this->postData);
        $this->post = Post::fromPostID($id);

        $id = PostObject::insertPost($this->parentPostData);
        $this->parentPost = Post::fromPostID($id);

        $this->childPostData["post_parent"] = $id;
        $id = PostObject::insertPost($this->childPostData);
        $this->childPost = Post::fromPostID($id);
    }

    public function testGetPostParent() {
        $this->assertEquals(
            $this->parentPost->getPostID(),
            $this->childPost->getPostParent()->getPostID()
        );
    }

    public function testGetPostChildren() {
        $postChildren = $this->parentPost->getPostChildren();

        $this->assertEquals(1, count($postChildren));

        $postChild = $postChildren[0];

        $this->assertEquals(
            $postChild->getPostID(),
            $this->childPost->getPostID()
        );
    }

    public function testSetPostParent() {
        $this->assertEquals(0, count($this->post->getPostChildren()));
        $this->assertNull($this->post->getPostParent());

        $this->post->setPostParent($this->parentPost);

        $this->assertEquals(
            $this->parentPost->getPostID(),
            $this->post->getPostParent()->getPostID()
        );

        // Get the children
        $parentChildren = $this->parentPost->getPostChildren();
        // There should be two children
        $this->assertEquals(2, count($parentChildren));
        // Test the ID's
        $this->assertEquals(
            array(
                $parentChildren[0]->getPostID(),
                $parentChildren[0]->getPostID()
            ),
            array(
                $this->post->getPostID(),
                $this->childPost->getPostID()
            )
        );

        $this->childPost->setPostParent($this->post);
        $this->assertEquals(1, count($this->post->getPostChildren()));
        $this->assertEquals(1, count($this->parentPost->getPostChildren()));
        $this->assertEquals(
            $this->post->getPostChildren()[0]->getPostID(),
            $this->childPost->getPostID()
        );
        $this->assertEquals(
            $this->parentPost->getPostChildren()[0]->getPostID(),
            $this->post->getPostID()
        );
    }
}
