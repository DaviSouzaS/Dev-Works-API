# Dev-Works-API

<p>The objective of this project is to be an API for a platform that allows the dissemination of projects made by developers.</p>

<p>To run the application you need to have Docker and docker-compose installed</p>

<p>Run Aplication</p>

<ul>
    <li>1º command: ".vendor/bin/sail up"</li>
</ul>

<p>It is only necessary to use the 1st command once. To run the application afterwards, it is only necessary to write "docker-compose up" in the terminal.</p>

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

## /api/user/{id} (GET): Read user by Id

<p>If the ID provided in the route does not belong to any registered user in the database, a 404 error will occur.</p>

<p>Route: <strong>/api/user/1</strong></p>

<p>Return:</p>

<strong>Status: 200 OK</strong>

```json
{
	"id": 1,
	"name": "user_dev",
	"email": "user_dev@gmail.com",
	"description": "Full Stack Developer",
	"is_dev": true,
        "linkedin": "linkedin link",
	"portfolio": "portfolio link",
	"updated_at": "2023-08-17T19:10:12.000000Z",
	"created_at": "2023-08-17T19:10:12.000000Z"
}
```

## /api/user/{id} (PATCH): Update user by Id

<p>This route requires authentication.</p>

<p>If the ID provided in the route does not belong to any registered user in the database, a 404 error will occur.</p>

<p>Route: <strong>/api/user/1</strong></p>

<p>Rules about request fields:</p>

<ul>
    <li>name is optional, must be a string and maximum of 50 characters.</li> 
    <li>email is optional, must be a valid email, unique and maximum of 127 characters.</li> 
    <li>password is optional, must be a string with a minimum of 8 characters and a maximum of 255 characters.</li> 
    <li>description is optional and must be a string.</li> 
    <li>is_dev is optional and must be a boolean.</li> 
    <li>linkedin is optional and must be a string with a maximum of 255 characters.</li> 
    <li>portfolio is optional and must be a string with a maximum of 255 characters.</li> 
</ul>

<p>If the rules about request fields are not followed, error 422 will occur.</p>

<p>If the email provided in the request is already in use, a 409 error will occur.</p>

<p>Auth:</p>

<p>Bearer Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo</p>

<p>Body:</p>

```json
{
	"name": "user_dev22"
}
```

<p>Return:</p>

<strong>Status: 200 OK</strong>

```json
{
        "id": 1,
	"name": "user_dev22",
	"email": "user_dev@gmail.com",
	"description": "Full Stack Developer",
	"is_dev": true,
        "linkedin": "linkedin link",
	"portfolio": "portfolio link",
	"updated_at": "2023-08-17T19:10:12.000000Z",
	"created_at": "2023-08-17T20:13:42.000000Z",
	
}
```

## /api/user/{id} (DELETE): Delete user by Id

<p>This route requires authentication.</p>

<p>If the ID provided in the route does not belong to any registered user in the database, a 404 error will occur.</p>

<p>Route: <strong>/api/user/1</strong></p>

<p>Auth:</p>

<p>Bearer Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo</p>

<p>Return:</p>

<strong>Status: 204 No Content</strong>

### Project routes:

## /api/project (POST): Create project

<p>This route requires authentication.</p>

<p>Only Developers can use this route (users with "is_dev": true)</p>

<p>Rules about request fields:</p>

<ul>
    <li>name is required, must be a string and maximum of 100 characters.</li> 
    <li>description is required and must be a string.</li> 
    <li>technologies is required and must be a array of strings</li>
</ul>

<p>If the rules about request fields are not followed, error 422 will occur.</p>

<p>Auth:</p>

<p>Bearer Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo</p>

<p>Body:</p>

```json
{
        "name": "Dev-Works-API",
	"description": "Project for developers",
	"technologies": [
		"PHP",
		"Laravel",
		"MySQL"
        ]
}
```

<p>Return:</p>

<strong>Status: 201 Created</strong>

```json
{
    "id": 1,
    "name": "Dev-Works-API",
    "description": "Project for developers",
    "created_at": "2023-08-17T18:37:12.000000Z",
    "updated_at": "2023-08-17T18:37:12.000000Z",
    "user_id": 1,
    "technologies": [
        {
            "id": 1,
            "name": "PHP",
            "project_id": 1
        },
        {
            "id": 2,
            "name": "Laravel",
            "project_id": 1
        },
        {
            "id": 3,
            "name": "MySQL",
            "project_id": 1
        }
    ]
    }
```

## /api/project (GET): Read all project

<p>Return:</p>

<strong>Status: 200 OK</strong>

```json
[
    {
        "id": 1,
        "name": "Dev-Works-API",
        "description": "Project for developers",
        "created_at": "2023-08-17T18:37:12.000000Z",
        "updated_at": "2023-08-17T18:37:12.000000Z",
        "user_id": 1,
        "technologies": [
            {
                "id": 1,
                "name": "PHP",
                "project_id": 1
            },
            {
                "id": 2,
                "name": "Laravel",
                "project_id": 1
            },
            {
                "id": 3,
                "name": "MySQL",
                "project_id": 1
            }
        ]
        },
    {
        "id": 2,
        "name": "Motors-Shop-API",
        "description": "API for vehicles e-commerce",
        "created_at": "2023-08-17T18:37:12.000000Z",
        "updated_at": "2023-08-17T18:37:12.000000Z",
        "user_id": 1,
        "technologies": [
            {
                "id": 4,
                "name": "Java Script",
                "project_id": 2
            },
            {
                "id": 5,
                "name": "Express.js",
                "project_id": 2
            },
            {
                "id": 6,
                "name": "PostgreSQL",
                "project_id": 2
            }
        ]
        }
]
```

## /api/project/{id} (GET): Read project by id

<p>If the ID provided in the route does not belong to any registered project in the database, a 404 error will occur.</p>

<p>Route: <strong>/api/project/1</strong></p>

<p>Return:</p>

<stronger>Status: 200 OK</stronger>

```json
{
        "id": 1,
        "name": "Dev-Works-API",
        "description": "Project for developers",
        "created_at": "2023-08-17T18:37:12.000000Z",
        "updated_at": "2023-08-17T18:37:12.000000Z",
        "user_id": 1,
        "technologies": [
            {
                "id": 1,
                "name": "PHP",
                "project_id": 1
            },
            {
                "id": 2,
                "name": "Laravel",
                "project_id": 1
            },
            {
                "id": 3,
                "name": "MySQL",
                "project_id": 1
            }
        ]
}
```

## /api/project/{id} (PATCH): Update project by id

<p>This route requires authentication.</p>

<p>Only the project owner can make updates to the project.</p>

<p>If the ID provided in the route does not belong to any registered project in the database, a 404 error will occur.</p>

<p>Rules about request fields:</p>

<ul>
    <li>name is optional, must be a string and maximum of 100 characters.</li> 
    <li>description is optional and must be a string.</li> 
    <li>technologies is optional and must be a array of strings</li>
</ul>

<p>If new technologies are added to the project, the old ones will be deleted</p>

<p>If the rules about request fields are not followed, error 422 will occur.</p>

<p>Route: <strong>/api/project/1</strong></p>

<p>Auth:</p>

<p>Bearer Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo</p>

<p>Body:</p>

```json
{
        "name": "Dev-Works-API 2.0",
	"description": "Project for developers",
	"technologies": [
		"Python",
		"Django"
        ]
}
```

<p>Return:</p>

<strong>Status: 200 OK</strong>

```json
{
    "id": 1,
    "name": "Dev-Works-API 2.0",
    "description": "Project for developers",
    "created_at": "2023-08-17T18:37:12.000000Z",
    "updated_at": "2023-08-17T20:26:20.000000Z",
    "user_id": 1,
    "technologies": [
        {
            "id": 7,
            "name": "Python",
            "project_id": 1
        },
        {
            "id": 8,
            "name": "Django",
            "project_id": 1
        }
    ]
    }
```

## /api/project/{id} (DELETE): Delete project by id

<p>This route requires authentication.</p>

<p>Only the project owner can delete the project.</p>

<p>If the ID provided in the route does not belong to any registered project in the database, a 404 error will occur.</p>

<p>Route: <strong>/api/project/1</strong></p>

<p>Auth:</p>

<p>Bearer Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo</p>

<p>Return:</p>

<strong>Status: 204 No Content</strong>

## /api/comment/{id} (POST): Create comment by project id

<p>This route requires authentication.</p>

<p>The route param (id) must be a project id</p>

<p>If the ID provided in the route does not belong to any registered project in the database, a 404 error will occur.</p>

<p>Any type of user can comment in projects</p>

<p>Rules about request fields:</p>

<ul>
    <li>comment is required and must be a string.</li> 
</ul>

<p>If the rules about request fields are not followed, error 422 will occur.</p>

<p>Route: <strong>/api/comment/1</strong></p>

<p>Auth:</p>

<p>Bearer Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo</p>

<p>Body:</p>

```json
{
	"comment": "1º comment"
}
```

<p>Return:</p>

<strong>Status: 201 Created</strong>

```json
{
        "id": 1,
	"comment": "1º comment",
	"user_id": 1,
	"project_id": 1,
	"created_at": "2023-08-20T21:41:36.000000Z",
	"updated_at": "2023-08-20T21:41:36.000000Z"
}
```

## /api/comment/{id} (GET): Read comments by project id

<p>The route param (id) must be a project id</p>

<p>If the ID provided in the route does not belong to any registered project in the database, a 404 error will occur.</p>

<p>Route: <strong>/api/comment/1</strong></p>

<p>Return:</p>

<strong>Status: 200 Ok</strong>

```json
[
{
        "id": 1,
	"comment": "1º comment",
	"user_id": 1,
	"project_id": 1,
	"created_at": "2023-08-20T21:41:36.000000Z",
	"updated_at": "2023-08-20T21:41:36.000000Z"
},
{
        "id": 2,
	"comment": "2º comment",
	"user_id": 2,
	"project_id": 1,
	"created_at": "2023-08-20T21:41:36.000000Z",
	"updated_at": "2023-08-20T21:41:36.000000Z"
}
]
```

## /api/comment/{id} (PATCH): Update comment by id

<p>This route requires authentication.</p>

<p>Only the owner of comment can update the comment</p>

<p>The route param (id) must be a comment id</p>

<p>If the ID provided in the route does not belong to any registered comment in the database, a 404 error will occur.</p>

<p>Rules about request fields:</p>

<ul>
    <li>comment is required and must be a string.</li> 
</ul>

<p>If the rules about request fields are not followed, error 422 will occur.</p>

<p>Route: <strong>/api/comment/1</strong></p>

<p>Auth:</p>

<p>Bearer Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo</p>

<p>Body:</p>

```json
{
	"comment": "1º comment updated"
}
```

<p>Return:</p>

<strong>Status: 201 Created</strong>

```json
{
        "id": 1,
	"comment": "1º comment updated",
	"user_id": 1,
	"project_id": 1,
	"created_at": "2023-08-20T21:41:36.000000Z",
	"updated_at": "2023-08-20T23:33:22.000000Z"
}
```

## /api/comment/{id} (DELETE): Delete comment by id

<p>This route requires authentication.</p>

<p>Only the owner of comment can delete the comment</p>

<p>The route param (id) must be a comment id</p>

<p>If the ID provided in the route does not belong to any registered comment in the database, a 404 error will occur.</p>

<p>Route: <strong>/api/comment/1</strong></p>

<p>Auth:</p>

<p>Bearer Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjkyOTI5OTQ4LCJleHAiOjE2OTI5MzM1NDgsIm5iZiI6MTY5MjkyOTk0OCwianRpIjoibnpBd3RpWVk3MlM2bTZxTyIsInN1YiI6IjE3IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dkrYrZXpMmVhc3KHVi2YYvUq1CBXwrZUYK6iBltwPwo</p>

<p>Return:</p>

<strong>Status: 204 No Content</strong>
