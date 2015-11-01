<?php
namespace oowp\post;

class PageType extends PostObjectType {
    /**
     * Get all posts of posttype "post"
     *
     * @return Post[]
     */
    public function getPosts() {
         $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'page',
        );
        $posts = get_posts($args);
        $postsObject = [];

        foreach($posts as $post) {
            $postsObject[] = Page::fromPostID($post->ID);
        }
    }
}
