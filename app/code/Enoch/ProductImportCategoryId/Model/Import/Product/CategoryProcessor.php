<?php
/**
 *
 * @description Import Category Processor Customizations
 *
 * @author     Enoch Data Systems <https://data.enoch.systems>
 * @author     C. M. de Picciotto <cmdepi@enochsystems.com>
 * @copyright  Copyright 2018 Enoch Systems LLC
 * @license    Apache License 2.0
 * @package    ProductImportCategoryId
 * @version    1.0.0
 * @link       https://github.com/enochsystems/ProductImportCategoryId
 *
 */
namespace Enoch\ProductImportCategoryId\Model\Import\Product;

use Magento\Framework\Exception\AlreadyExistsException;

class CategoryProcessor extends \Magento\ProductImportCategoryId\Model\Import\Product\CategoryProcessor
{
    /**
     *
     * Returns IDs of categories by string path creating nonexistent ones.
     *
     * @param string $categoriesString
     * @param string $categoriesSeparator
     *
     * @return array
     *
     */
    public function upsertCategories($categoriesString, $categoriesSeparator)
    {
        $categoriesIds = [];
        $categories    = explode($categoriesSeparator, $categoriesString);

        foreach ($categories as $category) {
            try {
                /**
                 *
                 * @note Validate if category is a number and exists as a category ID
                 * @note To use this feature, the category name does not have to match with categories' IDs
                 *
                 */
                if (is_numeric($category) && $this->getCategoryById($category)) {
                    $categoriesIds[] = $category;
                }
                else {
                    $categoriesIds[] = $this->upsertCategory($category);
                }
            }
            catch (AlreadyExistsException $e) {
                $this->addFailedCategory($category, $e);
            }
        }

        return $categoriesIds;
    }

    /**
     *
     * Add failed category
     *
     * @param string $category
     * @param AlreadyExistsException $exception
     *
     * @return $this
     *
     */
    private function addFailedCategory($category, $exception)
    {
        $this->failedCategories[] =
            [
                'category'  => $category,
                'exception' => $exception,
            ];

        return $this;
    }
}
