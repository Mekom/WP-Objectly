<?php
namespace oowp\post;

use oowp\core\Singleton;

abstract class PostObjectType extends Singleton {
    const LABEL_NAME               = 'name'
    const LABEL_SINGULAR_NAME      = 'singular_name'
    const LABEL_MENU_NAME          = 'menu_name'
    const LABEL_NAME_ADMIN_BAR     = 'name_admin_bar'
    const LABEL_ALL_ITEMS          = 'all_items'
    const LABEL_ADD_NEW            = 'add_new'
    const LABEL_ADD_NEW_ITEM       = 'add_new_item'
    const LABEL_EDIT_ITEM          = 'edit_item'
    const LABEL_NEW_ITEM           = 'new_item'
    const LABEL_VIEW_ITEM          = 'view_item'
    const LABEL_SEARCH_ITEMS       = 'search_items'
    const LABEL_NOT_FOUND          = 'not_found'
    const LABEL_NOT_FOUND_IN_TRASH = 'not_found_in_trash'
    const LABEL_PARENT_ITEM_COLON  = 'parent_item_colon'

    private static $lableSet = array(
        LABEL_NAME,
        LABEL_SINGULAR_NAME,
        LABEL_MENU_NAME,
        LABEL_NAME_ADMIN_BAR,
        LABEL_ALL_ITEMS,
        LABEL_ADD_NEW,
        LABEL_ADD_NEW_ITEM,
        LABEL_EDIT_ITEM,
        LABEL_NEW_ITEM,
        LABEL_VIEW_ITEM,
        LABEL_SEARCH_ITEMS,
        LABEL_NOT_FOUND,
        LABEL_NOT_FOUND_IN_TRASH,
        LABEL_PARENT_ITEM_COLON,
    );

    /**
     * Required by singleton classes
     * Creates a new instance of this class
     * not to be called ever.
     * Use the static ::instance() method
     * to retrive an instance of this class
     *
     * @return PostType
     */
    public static function newInstance() {
        return new static();
    }

    /**
     * Get all the posts in this post type
     */
    public abstract function getPosts();
}
