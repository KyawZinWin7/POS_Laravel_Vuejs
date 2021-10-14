PUT "/api/products/id"

This API is to change the data of products

Params
{

        "id"             : "<id>"
        "company_id"     : "<company_id>"(esists:companies(id)),
        "sale_price"     : "<numeric>",
        "purchase_price" : "<numeric>",
        "unit            : "<numeric>",
        "name"           :   "<name>"(max:200),
        "description"    : "<description>"(max:400),
        "images"         : "<images>"(json),
        "category_id"    : "<category_id>"(exists:product_categories(id)),
        "status"         :   "<status>"(in:active, inactive)

}

Response Errors

    400 -> validation error (required company_id, sale_price, purchase_price, unit, name, description, images, category_id, status)
    500 -> Server Error

Response Success

    200     -> success
