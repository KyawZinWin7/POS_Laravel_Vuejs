POST "/api/categories"

This API is to create ProductCategory

Params

{

    "name"          : "< name >",
    " description " : "< description >",
    "images"        : "< images>" (json)

}

Response Errors

    400     -> validation error ( required name, description, images)
    500     -> Server Error

Response Success

    200     -> success
