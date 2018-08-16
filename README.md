# Magento 2 Import Product with Category IDs

This extension enhances the built-in Magento 2 product import feature. This extension adds the ability to import product into categories with the category ID number.  Instead of having to use category string path in the import file.  However extension does not remove the default method of using the category string path in your import file. You can use both methods in the same import file to indicate what category you want to import your products into.



## Compatibility

This extension has been tested with Magento version 2.2.3.

## Installation

1. Copy the `app/code/Enoch` folder and its' contents into your `app/code` folder
2. Run the command `php bin/magento setup:upgrade` to install the extension
3.  Run the command `php bin/magento setup:static-content:deploy` to deploy static files
4. Now flush the cache using the command `php bin/magento cache:flush`

## How to use

1. Find the ID number of your category, by going to `Admin -> Catalog -> Categories`. Then select the desired category.  The ID number should be displayed in the upper left hand corner next to the category name.
2. In your import file under the `categories` column, list the ID number of the category that you wish to import the product into.
3. You can list multiple categories for an item, by separating the ID numbers with a comma `,`
4. Import your product file as you normally would in Magento 2.


## How can you help?

- Send us ideas and proposals for added features to improve the Magento 2 import.
- Create an issue if you find a bug.

## Standards & Code Quality

Built on top of Magento 2, our extension follows the Magento Way of best practices for extension development.

