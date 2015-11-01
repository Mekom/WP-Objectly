<?php
namespace oowp\taxonomy;

use oowp\core\Singleton;

abstract class Taxonomy extends Singleton {
    /**
     * Required by singleton classes
     * Creates a new instance of this class
     * not to be called ever.
     * Use the static ::instance() method
     * to retrive an instance of this class
     *
     * @return PostType
     */
    public final static function newInstance() {
        return new static();
    }

    /**
     * Get the slug for this taxonomy
     *
     * @return string
     */
    public abstract function getTaxonomySlug();

    /**
     * Takes in a term ID, and returns a TaxonomyTerm
     * object of the type assosiated with this taxonomy.
     * For example, the Category class implementation
     * of this method would return a CategoryTerm
     *
     * @throws InvalidArgumentException
     * If the ID is invalid. Either not greater than 0
     * ,or the ID is not a valid ID for a term in
     * this taxonomy
     *
     * @return TaxonomyTerm[]
     */
    public abstract function toTerm($termID);

    /**
     * Get the terms for this taxonomy
     * This function uses the per-class implementation
     * of toTerm(int), and might throw, but only
     * whatever the toTerm method does.
     *
     * @return TaxonomyTerm[]
     */
    public function getTerms() {
        $terms = get_terms(
            $this->getTaxonomySlug(),
            array('hide_empty' => 0)
        );

        $termObjects = [];

        foreach($terms as $term) {
            $termObjects[] = $this->toTerm($term->term_id);
        }

        return $termObjects;
    }
}
