1) First login using 
Post: http://127.0.0.1:8000/api/login
Body:
{
  "email": "wolf@gmail.com",
  "password": "wolf12345"
}


2) Add the token for Headers
+ In the responce from (1) a token will be present under "token": "2|m01c5k6FA..."
+ Go to headers in Postman and Add
Key: Authorization
Value: Bearer 1|PIrG...


3) Get all the active products
Get: http://127.0.0.1:8000/api/products

4) Get Limited active Products
Get: http://127.0.0.1:8000/api/products/{value} 

4) Get Products According to Category
Get: http://127.0.0.1:8000/api/products/category/{category} 

5) Get all the sales
Get: http://127.0.0.1:8000/api/sales

6) Get Limited sales
Get: http://127.0.0.1:8000/api/sales/{value}

7) Get the logedin user data
Get: http://127.0.0.1:8000/api/user

8) Logging out
Post: http://127.0.0.1:8000/api/logout

9) Get user cart
Get: http://127.0.0.1:8000/api/cart

10) Add product to user cart
Post: http://127.0.0.1:8000/api/cart/add
{
  "product_id": "prod123",
  "quantity": 2
}

11) Remove product to user cart
Post: http://127.0.0.1:8000/api/cart/remove/{productId}
{
  "success": true,
  "message": "Product removed from cart",
  "data": { ...updated cart object... }
}

12) Clear Cart
Delete: http://127.0.0.1:8000/api/cart/clear
{
  "success": true,
  "message": "Cart cleared",
  "data": { ...empty cart object... }
}
