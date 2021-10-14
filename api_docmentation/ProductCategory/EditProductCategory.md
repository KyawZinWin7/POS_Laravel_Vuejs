PUT "/api/categories/id"

This API is to change the data of ProductCategory

Params
{

    "id" : "<id>"
    "name" : "<name>",
    " description " : "<description>",
    "images" : "<images>" (json)

}

Response Errors

    400     -> validation error ( required name, description, images)
    500     -> Server Error

Response Success

    200     -> success
