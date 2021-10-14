PUT "/api/suppliers/:supplierId"

This API is to change the supplier data

Params

{

    "supplier" : "<id>"
    "name" : "<name>"(min:2 , max:50),
    "email" : "<email>",
    "tax_id" : "<tax_id>",
    "phone" : "<phone>"(min:10 , numeric),
    "address" : "<address>"(max: 200),
    "status" : "<status>"(acive, inactive),
    "images" : "<images>"(json)

}

Response Errors

    400 -> validation error (required name, email, tax_id, phone, address, status and images )

    500 -> Server Error

Response Success

    200 -> success
