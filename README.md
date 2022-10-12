<h1>Restapi qilingan proekt</h1>
<h2>1 - Api</h2>
<h3>Regstratsiyadan o'tish</h3>

<code>

    http://yii2/restapi/reg
    Post - Body - json


    {
        "username": "admin2",
        "email":"axlidinov@has.sa",
        "password":"123123123"
    }
</code>

<h2>2 - Api</h2>
<h3>Kirish o'tish</h3>

<code>

    http://yii2/restapi/auth
    Post - Body - x-www-form-urlencoded

    username admin
    password 12345678

    Jo'natiladi
    
</code>
<h4>Qaytadigon json</h4>
<code>

    {
        "success": true,
        "token": YdeBl7oeqASDvFpyOK8PLd4OlN0H_It_"
    }
</code>



<h2>3 - Api</h2>
<h3>Kirish o'tish</h3>

<code>

    http://yii2/restapi/posts
    Params GET
    
    Jo'natiladi
    
</code>
<h4>Qaytadigon json</h4>
<code>

    {
    "items": [
        {
            "id": 118,
            "title": "yangi posts 1111",
            "content": "yangi post update111"
        },
        {
            "id": 117,
            "title": "yangi posts 1111",
            "content": "yangi post update111"
        },
        {
            "id": 116,
            "title": "Update api",
            "content": "Update api content"
        },
        {
            "id": 115,
            "title": "Update api",
            "content": "Update api content"
        },
        {
            "id": 114,
            "title": "yangi posts 1111",
            "content": "yangi post update111"
        },
        {
            "id": 113,
            "title": "yangi posts 1111",
            "content": "yangi post update111"
        },
        {
            "id": 112,
            "title": "yangi posts 1111",
            "content": "yangi post update111"
        },
        {
            "id": 111,
            "title": "yangi posts",
            "content": "yangi post update"
        },
        {
            "id": 110,
            "title": "yangi posts",
            "content": "yangi post update"
        },
        {
            "id": 109,
            "title": "yangi posts",
            "content": "yangi post update"
        }
    ],
    "_links": {
            "self": {
                "href": "http://yii2/restapi/posts?page=1&per-page=10"
            },
            "first": {
                "href": "http://yii2/restapi/posts?page=1&per-page=10"
            },
            "last": {
                "href": "http://yii2/restapi/posts?page=12&per-page=10"
            },
            "next": {
                "href": "http://yii2/restapi/posts?page=2&per-page=10"
            }
        },
        "_meta": {
            "totalCount": 117,
            "pageCount": 12,
            "currentPage": 1,
            "perPage": 10
        }
    }
</code>


