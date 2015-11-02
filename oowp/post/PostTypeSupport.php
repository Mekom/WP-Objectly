<?php
namespace oowp\post;

use oowp\core\Enum;

class PostTypeSupport extends Enum {
    const __default       = self::TITLE;

    const TITLE           = 'title';
    const EDITOR          = 'editor';
    const CONTENT         = 'editor';
    const AUTHOR          = 'author';
    const THUMBNAIL       = 'thumbnail';
    const EXCERPT         = 'excerpt';
    const TRACKBACKS      = 'trackbacks';
    const CUSTOM_FIELDS   = 'custom-fields';
    const COMMENTS        = 'comments';
    const REVISIONS       = 'revisions';
    const PAGE_ATTRIBUTES = 'page-attributes';
    const POST_FORMATS    = 'post-formats';
}
