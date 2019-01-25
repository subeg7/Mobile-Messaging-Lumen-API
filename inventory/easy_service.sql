{
	"info": {
		"_postman_id": "d3d62660-8fe9-4a12-b994-ee23092bd8fc",
		"name": "easy_pull_service",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "Logins",
			"item": [
				{
					"name": "user login",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"name": "Content-Type",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"email\": \"testman@gmail.com\",\n   \"password\": \"testman\"\n}\n"
						},
						"url": {
							"raw": "{{url}}/login",
							"host": [
								"{{url}}"
							],
							"path": [
								"login"
							]
						}
					},
					"response": []
				},
				{
					"name": "reseller login",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"name": "Content-Type",
								"type": "text",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"email\": \"reseller@gmail.com\",\n   \"password\": \"reseller\"\n}\n"
						},
						"url": {
							"raw": "{{url}}/api/v1/login",
							"host": [
								"{{url}}"
							],
							"path": [
								"api",
								"v1",
								"login"
							]
						}
					},
					"response": []
				},
				{
					"name": "admin login",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"name": "Content-Type",
								"type": "text",
								"value": "application/json"
							},
							{
								"key": "Authorization",
								"value": "Bear eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1NDc0NTU2MjQsImV4cCI6MTU0ODk2NzYyNCwibmJmIjoxNTQ3NDU1NjI0LCJqdGkiOiI4WTNvTUFYVTBpM09JN1JHIiwic3ViIjozLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.IiNyxs_ynLv4uHynFnFf2aQsCVR6UKpDBA2Mqsi2WPA",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"email\": \"admin@gmail.com\",\n   \"password\": \"admin\"\n}\n"
						},
						"url": {
							"raw": "{{url}}/login",
							"host": [
								"{{url}}"
							],
							"path": [
								"login"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "Excel File Handling",
			"item": [
				{
					"name": "upload db",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"name": "Content-Type",
								"value": "application/x-www-form-urlencoded",
								"type": "text"
							}
						],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "file",
									"type": "file",
									"src": ""
								},
								{
									"key": "name",
									"value": "SalesFirstTerm",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "{{url}}/uploaddb/1",
							"host": [
								"{{url}}"
							],
							"path": [
								"uploaddb",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "view all files of a user",
					"request": {
						"method": "GET",
						"header": [],
						"body": {
							"mode": "raw",
							"raw": ""
						},
						"url": {
							"raw": "{{url}}/viewdbofuser/1",
							"host": [
								"{{url}}"
							],
							"path": [
								"viewdbofuser",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "view file by id",
					"request": {
						"method": "GET",
						"header": [],
						"body": {
							"mode": "raw",
							"raw": ""
						},
						"url": {
							"raw": "{{url}}/viewdbbyid/1",
							"host": [
								"{{url}}"
							],
							"path": [
								"viewdbbyid",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "import ",
					"request": {
						"method": "GET",
						"header": [],
						"body": {
							"mode": "raw",
							"raw": ""
						},
						"url": {
							"raw": ""
						}
					},
					"response": []
				},
				{
					"name": "delete the db",
					"request": {
						"method": "DELETE",
						"header": [],
						"body": {
							"mode": "raw",
							"raw": ""
						},
						"url": {
							"raw": ""
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "assign shortcode to a user",
			"request": {
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"name": "Content-Type",
						"value": "application/json",
						"type": "text"
					},
					{
						"key": "Authorization",
						"value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1NDc2MjE0MDMsImV4cCI6MTU0OTEzMzQwMywibmJmIjoxNTQ3NjIxNDAzLCJqdGkiOiJ3WVdJSXVpTk82MHp3UmlVIiwic3ViIjozLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.DFkInc2koA5m21GKfmHRiEbZsXCDOZIrx5ihS_ANg7A",
						"type": "text"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n\t\"fld_user_id\":1,\n\t\"assign_type\":\"dedicated\",\n\t\"fld_shortcode_id\":2\n\t\n}"
				},
				"url": {
					"raw": "{{url}}/assignshortcode",
					"host": [
						"{{url}}"
					],
					"path": [
						"assignshortcode"
					]
				}
			},
			"response": []
		},
		{
			"name": "add key for pull",
			"request": {
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"name": "Content-Type",
						"value": "application/json",
						"type": "text"
					},
					{
						"key": "Authorization",
						"value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1NDc2MjE0MDMsImV4cCI6MTU0OTEzMzQwMywibmJmIjoxNTQ3NjIxNDAzLCJqdGkiOiJ3WVdJSXVpTk82MHp3UmlVIiwic3ViIjozLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.DFkInc2koA5m21GKfmHRiEbZsXCDOZIrx5ihS_ANg7A",
						"type": "text"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n\t\"main_key\":{\n\t\t\"user_id\":6,\n\t\t\"category_id\":1,\n\t\t\"shortcode_id\":2,\n\t\t\"name\":\"hohaLahur\",\n\t\t\"disable_message\":\"hallu allu deisled message\",\n\t\t\"failure_message\":\"failed in syntax! Please type correct la\"\n\t},\n\t\n\t\"sub_keys\":[\n\t\t{\n\t\t\t\"name\":\"hello1\",\n\t\t\t\"sucess_message\":\"votsakjsa kjs fkajf akfdj l\",\n\t\t\t\"template_id\":\"\",\n\t\t\t\"address_book_id\":\"\"\n\t\t\t\n\t\t},{\n\t\t\t\"name\":\"hello2\",\n\t\t\t\"sucess_message\":\"votsakjsa kjs fkajf akfdj l\",\n\t\t\t\"template_id\":\"\",\n\t\t\t\"address_book_id\":\"\"\n\t\t\t\n\t\t},{\n\t\t\t\"name\":\"hello3\",\n\t\t\t\"sucess_message\":\"sdfs sdfs vsdfsoting subksdfsdffey1\",\n\t\t\t\"template_id\":\"\",\n\t\t\t\"address_book_id\":\"\"\n\t\t\t\n\t\t},{\n\t\t\t\"name\":\"hello4\",\n\t\t\t\"sucess_message\":\"thank your voting ddfs\",\n\t\t\t\"template_id\":\"\",\n\t\t\t\"address_book_id\":\"\"\n\t\t\t\n\t\t},{\n\t\t\t\"name\":\"hello5\",\n\t\t\t\"sucess_message\":\"thafsdssdfsnk your vodfssting sudfsdbkeysf1\",\n\t\t\t\"template_id\":\"\",\n\t\t\t\"address_book_id\":\"\"\n\t\t\t\n\t\t},{\n\t\t\t\"name\":\"hello6\",\n\t\t\t\"sucess_message\":\"thansdfk fsdfyourdqeqw votirweng subkednmfgby1\",\n\t\t\t\"template_id\":\"\",\n\t\t\t\"address_book_id\":\"\"\n\t\t\t\n\t\t}\n\t\n\t]\n}"
				},
				"url": {
					"raw": "{{url}}/addkey",
					"host": [
						"{{url}}"
					],
					"path": [
						"addkey"
					]
				}
			},
			"response": []
		},
		{
			"name": "enable/disable main keys",
			"request": {
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"name": "Content-Type",
						"type": "text",
						"value": "application/json"
					},
					{
						"key": "Authorization",
						"value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1NDc2MzA3MjAsImV4cCI6MTU0OTE0MjcyMCwibmJmIjoxNTQ3NjMwNzIwLCJqdGkiOiJrWkU3aGw3MUx6UkV1MUZKIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.-mDAshxjr6Qa-eeJi6_tK9XgmkwnMHNke8MbvgnRNDA",
						"type": "text"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n\t\"main_key_id\":\"1\",\n\t\"enable_status\":\"1\"\n}"
				},
				"url": {
					"raw": "{{url}}/modifykeystatus/1",
					"host": [
						"{{url}}"
					],
					"path": [
						"modifykeystatus",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "get all ShortCodes",
			"request": {
				"method": "GET",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": ""
				},
				"url": {
					"raw": "{{url}}/viewshortcodes/1",
					"host": [
						"{{url}}"
					],
					"path": [
						"viewshortcodes",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "view keylists",
			"request": {
				"method": "GET",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": ""
				},
				"url": {
					"raw": "{{url}}/",
					"host": [
						"{{url}}"
					],
					"path": [
						""
					]
				}
			},
			"response": []
		},
		{
			"name": "Test Request",
			"request": {
				"method": "GET",
				"header": [],
				"body": {
					"mode": "raw",
					"raw": ""
				},
				"url": {
					"raw": ""
				}
			},
			"response": []
		},
		{
			"name": "register",
			"request": {
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/json"
					},
					{
						"key": "Authorization",
						"value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1NDc2MjE0MDMsImV4cCI6MTU0OTEzMzQwMywibmJmIjoxNTQ3NjIxNDAzLCJqdGkiOiJ3WVdJSXVpTk82MHp3UmlVIiwic3ViIjozLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.DFkInc2koA5m21GKfmHRiEbZsXCDOZIrx5ihS_ANg7A",
						"type": "text"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n   \"name\":\"khnalwa\",\n   \"email\": \"khanalwa2@admin.com\",\n   \"password\": \"123456\",\n   \"password_confirmation\": \"123456\",\n   \"ip_address\":\"1923.454.345\",\n   \"login_validate\":\"\",\n   \"reseller_id\":\"1\",\n   \"contact_number\":\"1\",\n   \"transaction_id\":\"1\",\n   \"balance_type\":\"normal\"\n \n}\n"
				},
				"url": {
					"raw": "{{url}}/register?Content-Type=application/json&Authorization=Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU0MzM4NzI2MSwiZXhwIjoxNTQzMzkwODYxLCJuYmYiOjE1NDMzODcyNjEsImp0aSI6Ik85TjBYVlZwbzJpamNna3EiLCJzdWIiOjEyLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.Qva7iXbnJHJWiokChSXoSzcmINXXO8ymkZDF89IBkrg",
					"host": [
						"{{url}}"
					],
					"path": [
						"register"
					],
					"query": [
						{
							"key": "Content-Type",
							"value": "application/json"
						},
						{
							"key": "Authorization",
							"value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU0MzM4NzI2MSwiZXhwIjoxNTQzMzkwODYxLCJuYmYiOjE1NDMzODcyNjEsImp0aSI6Ik85TjBYVlZwbzJpamNna3EiLCJzdWIiOjEyLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.Qva7iXbnJHJWiokChSXoSzcmINXXO8ymkZDF89IBkrg"
						}
					]
				}
			},
			"response": []
		},
		{
			"name": "delete key",
			"request": {
				"method": "DELETE",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/json"
					},
					{
						"key": "Authorization",
						"type": "text",
						"value": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1NDc2MjE0MDMsImV4cCI6MTU0OTEzMzQwMywibmJmIjoxNTQ3NjIxNDAzLCJqdGkiOiJ3WVdJSXVpTk82MHp3UmlVIiwic3ViIjozLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.DFkInc2koA5m21GKfmHRiEbZsXCDOZIrx5ihS_ANg7A"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n   \"name\":\"khnalwa\",\n   \"email\": \"khanalwa2@admin.com\",\n   \"password\": \"123456\",\n   \"password_confirmation\": \"123456\",\n   \"ip_address\":\"1923.454.345\",\n   \"login_validate\":\"\",\n   \"reseller_id\":\"1\",\n   \"contact_number\":\"1\",\n   \"transaction_id\":\"1\",\n   \"balance_type\":\"normal\"\n \n}\n"
				},
				"url": {
					"raw": "{{url}}/deletekey",
					"host": [
						"{{url}}"
					],
					"path": [
						"deletekey"
					]
				}
			},
			"response": []
		}
	]
}