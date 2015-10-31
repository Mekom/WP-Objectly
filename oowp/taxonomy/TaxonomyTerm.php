<?php
namespace oowp\taxonomy;

use WP_Error;
use RuntimeException;
use InvalidArgumentException;

abstract class TaxonomyTerm implements ITaxonomyTerm {
    private static $queryFields = [
        'id',
        'slug',
        'name',
        'term_taxonomy_id'
    ];

    private $termID;
    private $name;
    private $slug;
    private $termGroup;
    private $termTaxonomyID;
    private $taxonomy;
    private $description;
    private $parent;
    private $count;

    /* -------------------- */
    /* # STATIC INTERFACE # */
    /* -------------------- */

    /**
     * Create a term object
     * For example
     * <code>
     *     getTermBy('slug', 'termslug')
     * </code>
     *
     * @param string $field The field to query
     * @param string $value The value to query with
     *
     * @return TaxonomyTerm|null The taxonomy term object, or null if none was found
     */
    private static function getTermBy($field, $value) {
        if (array_search($field, self::$queryFields) === false) {
            throw new InvalidArgumentException(
                "\$field must be one of these values: [\"" .
                implode("\", \"", self::$queryFields) .
                "\"]. Got \"$field\"."
            );
        }

        $wpTermObject = get_term_by(
            $field,
            $value,
            static::getTaxonomy()->getTaxonomySlug()
        );

        if (
            $wpTermObject === false ||
            $wpTermObject === null ||
            $wpTermObject instanceof WP_Error
            ) {
            return null;
        }

        $termObject = new static($wpTermObject);

        return $termObject;
    }

    public static function fromTermSlug($slug) {
        return self::getTermBy('slug', $slug);
    }

    public static function fromTermName($id) {
        return self::getTermBy('name', $id);
    }

    public static function fromTermID($id) {
        return self::getTermBy('id', $id);
    }

    /* ---------------------- */
    /* # INSTANCE INTERFACE # */
    /* ---------------------- */

    /**
     * Creates a new TaxonomyTerm from a WP taxonomy term object
     *
     * @param object $object The WP taxonomy term object
     */
    protected function __construct($term) {
        $this->termID         = $term->term_id;
        $this->name           = $term->name;
        $this->slug           = $term->slug;
        $this->termGroup      = $term->term_group;
        $this->termTaxonomyID = $term->term_taxonomy_id;
        $this->taxonomy       = $term->taxonomy;
        $this->description    = $term->description;
        $this->parent         = $term->parent;
        $this->count          = $term->count;
    }

    public function getTermID() {
        return $this->termID;
    }

    public function getTermName() {
        return $this->name;
    }

    public function getTermSlug() {
        return $this->slug;
    }

    public function getTermDescription() {
        return $this->description;
    }

    public function getTermParent() {
        return $this->parent;
    }

    public function getTermPostCount() {
        return $this->count;
    }
}
