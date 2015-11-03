<?php
namespace oowp\tests\tests\post\support;

use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class RevisionsTest extends OOWPTestCase {
    private $post;

    private $postData = array(
        "post_type"      => "post",
        "post_title"     => "title",
        "post_content"   => "content",
    );

    private $revision = array(
        "post_title"     => "old title",
        "post_content"   => "old content",
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

        $this->revision["ID"] = $id;

        $revisionId = wp_update_post($this->revision);
    }

    public function testGetRevisions(){
        $revisions = $this->post->getRevisions();

        $this->assertEquals(1, count($revisions), "There were no revisions");

        $revision = $revisions[0];

        $this->assertEquals(
            $this->post->getPostID() . "-revision-v1",
            $revision->getPostSlug()
        );
    }
}
