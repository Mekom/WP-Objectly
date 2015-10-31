<?php
namespace oowp\user;

use WP_User;

class User {
    private static $queryFields = [
        'id',
        'slug',
        'email',
        'login'
    ];

    private $ID;
    private $userLogin;
    private $userPass;
    private $userNicename;
    private $userEmail;
    private $userUrl;
    private $userRegistered;
    private $userActivationKey;
    private $userStatus;
    private $displayName;


    /* -------------------- */
    /* # STATIC INTERFACE # */
    /* -------------------- */

    private static function getUserBy($field, $value) {
        if (array_search($field, self::$queryFields) === false) {
            throw new InvalidArgumentException(
                "\$field must be one of these values: [\"" .
                implode("\", \"", self::$queryFields) .
                "\"]. Got \"$field\"."
            );
        }

        $wpUser = get_user_by(
            $field,
            $value
        );

        if (!($wpUser instanceof WP_User)) {
            return null;
        }

        $userObject = new static($wpUser);

        return $userObject;
    }

    public static function fromUserID($userID) {
        return self::getUserBy('id', $userID);
    }

    public static function fromUserLogin($login) {
        return self::getUserBy('login', $login);
    }

    public static function fromUserEmail($email) {
        return self::getUserBy('email', $email);
    }

    public static function fromUserSlug($slug) {
        return self::getUserBy('slug', $slug);
    }

    public static function getAllUsers() {
        $users = get_users();
        $userObjects = [];

        foreach($users as $user) {
            $userObjects[] = new self($user);
        }

        return $userObjects;
    }

    /* ---------------------- */
    /* # INSTANCE INTERFACE # */
    /* ---------------------- */

    private function __construct($wpUserObject) {
        $this->ID                = $wpUserObject->ID;
        $this->userLogin         = $wpUserObject->user_login;
        $this->userPass          = $wpUserObject->user_pass;
        $this->userNicename      = $wpUserObject->user_nicename;
        $this->userEmail         = $wpUserObject->user_email;
        $this->userUrl           = $wpUserObject->user_url;
        $this->userRegistered    = $wpUserObject->user_registered;
        $this->userActivationKey = $wpUserObject->user_activation_key;
        $this->userStatus        = $wpUserObject->user_status;
        $this->displayName       = $wpUserObject->display_name;
    }

    /**
     * Get the user ID
     *
     * @return string The user ID
     */
    public function getUserID() {
        return $this->ID;
    }

    /**
     * Get the user login
     *
     * @return string The user userLogin
     */
    public function getUserLogin() {
        return $this->userLogin;
    }

    /**
     * Get the user userPass
     *
     * @return string The user userPass
     */
    // public function getUserPass() {
    //     return $this->userPass;
    // }

    /**
     * Get the user user nicename
     *
     * @return string The user user nicename
     */
    public function getUserNicename() {
        return $this->userNicename;
    }

    /**
     * Get the user user email
     *
     * @return string The user user email
     */
    public function getUserEmail() {
        return $this->userEmail;
    }

    /**
     * Get the user userUrl
     *
     * @return string The user userUrl
     */
    public function getUserUrl() {
        return $this->userUrl;
    }

    /**
     * Get when this user was registered.
     *
     * @return string The user userRegistered
     */
    public function getUserRegistered() {
        return $this->userRegistered;
    }

    /**
     * Get the user user activation key
     *
     * @return string The user user activation key
     */
    public function getUserActivationKey() {
        return $this->userActivationKey;
    }

    /**
     * Get the user user status
     *
     * @return string The user user status
     */
    public function getUserStatus() {
        return $this->userStatus;
    }

    /**
     * Get the user display name
     *
     * @return string The user display name
     */
    public function getUserDisplayName() {
        return $this->displayName;
    }

}
