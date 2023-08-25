# Dev-Works-API

<p>The objective of this project is to be an API for a platform that allows the dissemination of projects made by developers.</p>

### User routes:

## /api/user (POST): Create user
<p>A user can be a developer or a regular user. To be a developer, you need to put {"is_dev": true} inside the request body, "is_dev" is false by default.</p>

<p>Rules about request fields:</p>
<ul>
    <li>name is required, must be a string and maximum of 50 characters.</li> 
    <li>email is required, must be a valid email, unique and maximum of 127 characters.</li> 
    <li>password is required, must be a string with a minimum of 8 characters and a maximum of 255 characters.</li> 
    <li>description is required and must be a string.</li> 
    <li>is_dev is optional and must be a boolean.</li> 
    <li>linkedin is optional and must be a string with a maximum of 255 characters.</li> 
    <li>portfolio is optional and must be a string with a maximum of 255 characters.</li> 
</ul>

<p>If the rules about request fields are not followed, error 422 will occur.</p>
<p>If the email provided in the request is already in use, a 409 error will occur.</p>

<p>Body:</p>

```json
{
	"name": "user_dev",
	"email": "user_dev@gmail.com",
	"password": "teste1234",
	"description": "Full Stack Developer", 
	"is_dev": true,
	"linkedin": "linkedin link",
	"portfolio": "portfolio link"
}
```

<p>Return:</p>

<strong>Status: 201 Created</strong>

```json
{
	"name": "user_dev",
	"email": "user_dev@gmail.com",
	"description": "Full Stack Developer",
	"is_dev": true,
        "linkedin": "linkedin link",
	"portfolio": "portfolio link",
	"updated_at": "2023-08-17T19:10:12.000000Z",
	"created_at": "2023-08-17T19:10:12.000000Z",
	"id": 1
}
```

## /api/auth/login (POST): User login

<p>Rules of request fields:</p>

<ul>
    <li>email is required</li> 
	<li>password is required</li> 
</ul>

<p>If email or password is not provided, a 422 error will occur.</p>
<p>If the information provided in request body not exist in data base, a 401 error will occur.</p>

<p>Body:</p>

```json
{
    "email": "user_dev@gmail.com",
    "password": "teste1234"
}
```

<p>Return:</p>

<strong>Status: 200 OK</strong>

```json
{
    "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo",
	"user": {
	"name": "user_dev",
	"email": "user_dev@gmail.com",
	"description": "Full Stack Developer",
	"is_dev": true,
        "linkedin": "linkedin link"
	"portfolio": "portfolio link"
	"updated_at": "2023-08-17T19:10:12.000000Z",
	"created_at": "2023-08-17T19:10:12.000000Z",
	"id": 1
        }
}
```
