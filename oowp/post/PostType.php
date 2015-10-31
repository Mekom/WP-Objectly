<?php
namespace oowp\post;

class PostType extends PostObjectType {
    public static function newInstance() {
        return new self();
    }

    public function getPosts() {
         $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'post',
        );
        $posts = get_posts($args);
        $postsObject = [];

        foreach($posts as $post) {
            $postsObject[] = Post::fromPostID($post->ID);
        }
    }
}
