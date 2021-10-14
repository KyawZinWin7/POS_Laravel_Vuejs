PUT "/api/accounts/id"

This API is to change the data of accounts

Params

{

    "id" : "<id>",
    "name" : "<name>",
    "initial_amount" : "<initial_amount>",
    "current_amount" : "<current_amount>"

}

Response Errors

    400 -> validation error (required name, initial_amount, current_amount)
    500 -> Server Error

Response Success

    200         -> success
