<?php 

SELECT
    mcode_features.`name`, 
    mcode_feature_mcode_product_model.mcode_feature_id, 
    mcode_features.id, 
    mcode_category_mcode_feature.mcode_feature_id, 
    mcode_category_mcode_feature.mcode_category_id
FROM
    mcode_features
    LEFT JOIN
    mcode_feature_mcode_product_model
    ON 
        mcode_features.id = mcode_feature_mcode_product_model.mcode_feature_id
    LEFT JOIN
    mcode_category_mcode_feature
    ON 
        mcode_features.id = mcode_category_mcode_feature.mcode_feature_id
    LEFT JOIN
    mcode_features
    ON 
        mcode_category_mcode_feature.mcode_feature_id = mcode_features.id AND
        mcode_feature_mcode_product_model.mcode_feature_id = mcode_features.id
    LEFT JOIN
    mcode_categories
    ON 
        mcode_category_mcode_feature.mcode_category_id = mcode_categories.id
WHERE
    mcode_features.id = mcode_feature_mcode_product_model.mcode_feature_id AND
    mcode_features.id = mcode_category_mcode_feature.mcode_feature_id AND
    mcode_category_mcode_feature.mcode_category_id = mcode_category_mcode_feature.mcode_category_id

------------------------------

SELECT
    mcode_categories.name
FROM
    mcode_features
    LEFT JOIN
    mcode_feature_mcode_product_model
    ON 
        mcode_features.id = mcode_feature_mcode_product_model.mcode_feature_id
    LEFT JOIN
    mcode_category_mcode_feature
    ON 
        mcode_features.id = mcode_category_mcode_feature.mcode_feature_id
    LEFT JOIN
    mcode_features
    ON 
        mcode_category_mcode_feature.mcode_feature_id = mcode_features.id AND
        mcode_feature_mcode_product_model.mcode_feature_id = mcode_features.id
    LEFT JOIN
    mcode_categories
    ON 
        mcode_category_mcode_feature.mcode_category_id = mcode_categories.id,
    mcodes
WHERE
    mcode_feature_mcode_product_model.mcode_product_model_id AND
    mcodes.id = mcode_feature_mcode_product_model.mcode_product_model_id AND
    mcode_categories.`name` NOT LIKE '%Obsolete%'

 


        $categories=\DB::table('mcode_features')
        ->leftJoin('mcode_feature_mcode_product_model', 'mcode_features.id', '=', 'mcode_feature_mcode_product_model.mcode_feature_id')
        ->leftJoin('mcode_category_mcode_feature', 'mcode_features.id', '=', 'mcode_category_mcode_feature.mcode_feature_id')
        ->leftJoin('mcode_categories', 'mcode_category_mcode_feature.mcode_category_id', '=', 'mcode_categories.id')
        ->select('mcode_categories.*')
        ->where('mcode_categories.name', '!=','Obsolete')
        ->whereIn('mcode_feature_mcode_product_model.mcode_product_model_id', $productModels)
        ->groupBy('mcode_category_mcode_feature.mcode_category_id')
        ->get();


    public function getIsM1McodeAttribute($query)
    {
        return $this->mcode()->where(Str::startsWith($query, 'M1'))->exists();
    }



$users = App\Models\User::popular()->orWhere->active()->get();

   $features = McodeFeature::published()->orWhere->m1Mcode()->get();;

Str::contains('This is my name', 'my');




 SELECT
    mcode_categories.`name`, 
    mcode_category_mcode_feature.mcode_category_id AS pivot_mcode_category_id, 
    mcode_category_mcode_feature.mcode_feature_id AS pivot_mcode_feature_id, 
    mcode_feature_mcode_product_model.mcode_feature_id AS pivot_mcode_feature_product_id, 
    mcode_features.id AS mcode_feature_id, 
    mcode_categories.id AS mcode_category_id, 
    mcodes.id AS mcode_id
FROM
    mcode_features
    INNER JOIN
    mcode_feature_mcode_product_model
    ON 
        mcode_features.id = mcode_feature_mcode_product_model.mcode_feature_id
    INNER JOIN
    mcode_category_mcode_feature
    ON 
        mcode_features.id = mcode_category_mcode_feature.mcode_feature_id
    INNER JOIN
    mcode_categories
    ON 
        mcode_category_mcode_feature.mcode_category_id = mcode_category_mcode_feature.mcode_feature_id,
    mcodes
WHERE
    mcode_category_mcode_feature.mcode_category_id <> '%17%' 








SELECT
    categories.`name`, 
    category_feature.category_id AS pivot_category_id, 
    category_feature.feature_id AS pivot_feature_id, 
    feature_product_model.feature_id AS pivot_feature_product_id, 
    features.id AS feature_id, 
    categories.id AS category_id, 
    products.id AS product_id
FROM
    features
    INNER JOIN
    feature_product_model
    ON 
        features.id = feature_product_model.feature_id
    INNER JOIN
    category_feature
    ON 
        features.id = category_feature.feature_id
    INNER JOIN
    categories
    ON 
        category_feature.category_id = category_feature.feature_id,
    products
WHERE
    category_feature.category_id <> '%17%' 


product id 13

FILTER OUT:
category_id = 13
category.name = 'Obsolete'

    $categories=\DB::table('mcode_features')
        ->leftJoin('feature_product_model', 'features.id', '=', 'feature_product_model.feature_id')
        ->leftJoin('category_feature', 'features.id', '=', 'category_feature.feature_id')
        ->leftJoin('categories', 'category_feature.category_id', '=', 'category_feature.category_id')
        ->select('categories.*')
        ->whereIn('feature_product_model.product_model_id', $productModels)
        // can use this 
        ->where('categories.name', '!=','Obsolete')
        // or this 
        ->where('categories.id', '!=','17')
        ->groupBy('categories.id')
        ->get();



        $categories=\DB::table('mcode_features')
        ->leftJoin('mcode_feature_mcode_product_model', 'mcode_features.id', '=', 'mcode_feature_mcode_product_model.mcode_feature_id')
        ->leftJoin('mcode_category_mcode_feature', 'mcode_features.id', '=', 'mcode_category_mcode_feature.mcode_feature_id')
        ->leftJoin('mcode_categories', 'mcode_category_mcode_feature.mcode_category_id', '=', 'mcode_categories.id')
        ->select('mcode_categories.*')
        ->where('mcode_categories.name', '!=','Obsolete')
        ->whereIn('mcode_feature_mcode_product_model.mcode_product_model_id', $productModels)
        ->groupBy('mcode_category_mcode_feature.mcode_category_id')
        ->get();




Any way of doing this would be great. I have spent many hours now trying to get this and have been unable to do so. 

> 4 Models

 - Product
 - Category
 - Feature
 - ProductModel


These cannot be changed they are coming from something outside my application.

> **Product** HasMany **ProductModel** | **ProductModel** BelongstoMany **Product** 

> **Feature** HasMany **ProductModel** | **ProductModel** BelongstoMany **Feature**

On **Product** you can select the assiciated models. 

On **Feature** you can select the assocaited models

On **Feature** you can select the **Category**

Here is what i am trying to do. 

Trying to get the categories that are associated with all **Code** and **Feature** where they both have **Model**s in common. 

So if a **Product** has the same **ProductModel** As **Feature** then return that **Category**.





@bugsysha

Sorry I needed a break from this so worked on other parts until now. 
Now I actually need this so here is everything I have tried so far. 


```
    $productModels = ProductModel::all();
    $products = Product::all();
    $features = Feature::all();

    $categories=\DB::table('mcode_features')
        ->leftJoin('feature_product_model', 'features.id', '=', 'feature_product_model.feature_id')
        ->leftJoin('category_feature', 'features.id', '=', 'category_feature.feature_id')
        ->leftJoin('categories', 'category_feature.category_id', '=', 'category_feature.category_id')
        ->select('categories.*')
        ->whereIn('feature_product_model.product_model_id', $productModels)
        // can use this 
        ->where('categories.name', '!=','Obsolete')
        // or this 
        ->where('categories.id', '!=','17')
        ->groupBy('categories.id')
        ->get();

```
Current pivot table are as follows:

```

category_feature > feature_id category_id
feature_product_model > feature_id product_id


```