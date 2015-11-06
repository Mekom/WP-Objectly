<?php
namespace oowp\tests\tests\post;

use std\lang\ExtensionClass;

use oowp\post\support\ICustomFields;
use oowp\post\Post;
use oowp\post\PostObject;

use oowp\tests\OOWPTestCase;

class PostObjectExtension extends ExtensionClass {
    public static function extension() {
        return array(
            "namespace" => "myMeta"
        );
    }

    public function getPrefixedMetaField(ICustomFields $object, $key) {
        return $object->getPostMeta("prefix-" . $key);
    }

    public function setPrefixedMetaField(ICustomFields $object, $key, $value) {
        $object->setPostMeta("prefix-" . $key, $value);
    }
}

class PostExtensionTest extends OOWPTestCase {
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
        PostObject::extend(PostObjectExtension::className());
        $id = PostObject::insertPost($this->postData);
        $post = Post::fromPostID($id);
        $this->post = $post;

        foreach($this->postMeta as $key => $value) {
            $post->setPostMeta($key, $value);
        }
    }

    public function testSetGetPrefixedPostMeta() {
        $this->post->myMeta()->setPrefixedMetaField("hello", "world");
        $this->assertEquals(
            "world",
            $this->post->myMeta()->getPrefixedMetaField("hello")
        );
    }
}