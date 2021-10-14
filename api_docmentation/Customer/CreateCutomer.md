POST "/api/customers"

This API is to create customers

Params

{
"name" : "<name>"(min:2, max: 50),
"email" : "<email>"(unique:customers),
"tax_id: "<tax_id>",
"phone" : "<phone>"(min:10, numeric),
"address" : "<string>"(max: 200),
"status" : "<status>"(in:active, inactive),
"images" : "<images>"(json)
}

Response Errors

    400 -> validation error (required name, email, tax_id, phone, address, status, images)
    500 -> Server Error

Response Success

    200 -> success
