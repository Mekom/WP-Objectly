<?php
namespace oowp\core;

class AdminMenuPosition extends Enum {
    const __default = self::BELOW_POSTS;

    BELOW_POSTS = 5;
    BELOW_MEDIA = 10;
    BELOW_LINKS = 15;
    BELOW_PAGES = 20;
    BELOW_COMMENTS = 25;
    BELOW_FIRST_SEPARATOR = 60;
    BELOW_PLUGINS = 65;
    BELOW_USERS = 70;
    BELOW_TOOLS = 75;
    BELOW_SETTINGS = 80;
    BELOW_SECOND_SEPARATOR = 100;
}