<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class ProductsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $userDataType = DataType::where('slug', 'users')->firstOrFail();
        $menuDataType = DataType::where('slug', 'menus')->firstOrFail();
        $roleDataType = DataType::where('slug', 'roles')->firstOrFail();
        $productsDataType = DataType::where('slug', 'products')->firstOrFail();
        $categoriesDataType = DataType::where('slug', 'categories')->firstOrFail();
        $currenciesDataType = DataType::where('slug', 'currencies')->firstOrFail();
        $productStatusesDataType = DataType::where('slug', 'product-statuses')->firstOrFail();
        $productLabelsDataType = DataType::where('slug', 'product-label')->firstOrFail();
        $attributeDataType = DataType::where('slug','attribute')->firstOrFail();
        $colorDataType = DataType::where('slug','colors')->firstOrFail();
        $interestDataType = DataType::where('slug','interests')->firstOrFail();
        $productServiceStatusesDataType = DataType::where('slug','product-service-statuses')->firstOrFail();
        $providersDataType = DataType::where('slug','providers')->firstOrFail();
        $articlesDataType = DataType::where('slug','articles')->firstOrFail();
        $articlesCategoriesDataType = DataType::where('slug','articles_categories')->firstOrFail();

        $attrvalDataType = DataType::where('slug', 'attribute_values')->firstOrFail();




        /* Products */
        $dataRow = $this->dataRow($productsDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($productsDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Название'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 3,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('voyager::seeders.data_rows.slug'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"slugify":{"origin":"name","forceUpdate":true}}',
                'order' => 3,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'vendor_code');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Артикул'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 4,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'category');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('Category'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 5,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'EUR');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('EUR'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 6,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'USD');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('USD'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 7,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'UAH');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('UAH'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 8,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'profitability');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('Рентабельность'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 9,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'color');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'color',
                'display_name' => __('Цвет'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 10,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'manufacturer');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Производитель'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 11,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 12,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 13,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'URL');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('URL'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 14,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'rich_text_box',
                'display_name' => __('Description'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 15,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'publication');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'checkbox',
                'display_name' => __('Публикация'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '{"on":"Yes","off":"No"}',
                'order' => 16,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'characteristics');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'rich_text_box',
                'display_name' => __('Characteristics'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 17,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'price_final');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('Final Price'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => '',
                'order' => 18,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_hasone_currency_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Currencies'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\Currency","table":"currencies","type":"belongsTo","column":"currency_final","key":"id","label":"name","pivot_table":"Categories","pivot":"0","taggable":"0"}',
                'order' => 19,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'currency_final');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Учётная валюта'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 19,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_belongstomany_category_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Подкатегория'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '{"model":"App\\\Category","table":"categories","type":"belongsToMany","column":"category","key":"id","label":"name","pivot_table":"product_categories_pivot","pivot":"1","taggable":"on"}',
                'order'        => 14,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'status');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Категория'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 20,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_belongsto_product_status_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Статус'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\ProductStatus","table":"product_statuses","type":"belongsTo","column":"status","key":"id","label":"name","pivot_table":"Categories","pivot":"0","taggable":"0"}',
                'order' => 21,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_belongsto_product_label_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Метка'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\ProductLabel","table":"product_labels","type":"belongsTo","column":"label","key":"id","label":"name","pivot_table":"Categories","pivot":"0","taggable":"0"}',
                'order' => 22,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'label');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Метка'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 21,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'code');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Код товара'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 22,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'sale_discount');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('Скидка (%)'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 34,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'sale_price');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('Стоимость со скидкой'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 35,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'mainimage');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'image',
                'display_name' => __('Основное фото'),
                'required' => 0,
                'browse' => 1,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '{"resize":{"width":"1000","height":"null"},"quality":"75%","upsize":true,"thumbnails":[{"name":"medium","scale":"50%"},{"name":"small","scale":"25%"},{"name":"cropped","crop":{"width":"300","height":"250"}}]}',
                'order' => 2,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_belongstomany_attribute_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Атрибуты'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\\Models\\\\Attribute","table":"attribute","type":"belongsToMany","column":"id","key":"id","label":"name","pivot_table":"product_attributes_pivot","pivot":"1","taggable":"0"}',
                'order' => 28,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'addimage');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'multiple_images',
                'display_name' => __('Изображения'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 24,
            ])->save();
        }

        $dataRow = $this->dataRow($productsDataType, 'concomitant');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Сопутствующий'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App/Product"}',
                'order' => 30,
            ])->save();
        }

        $dataRow = $this->dataRow($productsDataType, 'similar');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Похожий'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App/Product"}',
                'order' => 31,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'maincategory');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Maincategory'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 32,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_belongsto_color_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Цвет'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\Color","table":"colors","type":"belongsTo","column":"color","key":"id","label":"name","pivot_table":"attribute","pivot":"0","taggable":"0"}',
                'order' => 36,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'service_status');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Service Status'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 37,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'storage');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Склад'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 38,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'box');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('Ящик'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 39,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_belongsto_product_service_status_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Служебный статус'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\ProductServiceStatus","table":"product_service_statuses","type":"belongsTo","column":"service_status","key":"id","label":"name","pivot_table":"attribute","pivot":"0","taggable":null}',
                'order' => 40,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'provider');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('provider'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 42,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_belongstomany_provider_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Поставщики'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\Provider","table":"providers","type":"belongsToMany","column":"id","key":"id","label":"name","pivot_table":"product_provider_pivot","pivot":"1","taggable":"0"}',
                'order' => 41,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'concomitant_category');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('Concomitant Category'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 43,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'product_belongstomany_category_relationship_1');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'relationship',
                'display_name' => __('Сопутствующая подкатегория'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\Category","table":"categories","type":"belongsToMany","column":"id","key":"id","label":"name","pivot_table":"product_concomitant_category_pivot","pivot":"1","taggable":"0"}',
                'order' => 44,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'url_option');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'radio_btn',
                'display_name' => __('Формирование URL'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"default":"1","options":{"2":"Упрощённый URL","1":"Полный URL"}}',
                'order' => 45,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'meta_title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('Мета-тег title'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 46,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'meta_description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('Мета-тег description'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 47,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'meta_heading');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('Мета-тег H1'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 48,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'meta_keywords');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('Мета-тег keywords'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => NULL,
                'order' => 49,
            ])->save();
        }
        $dataRow = $this->dataRow($productsDataType, 'in_stock');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('В наличии'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 49,
            ])->save();
        }

 
}

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field' => $field,
        ]);
    }
}
