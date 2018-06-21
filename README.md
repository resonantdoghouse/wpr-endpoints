
# WP Rest API Endpoints

## Setup & Usage

To post you will need to auth with Basic Auth, JWT Auth, or add a localized script.

Fastest setup for testing
 
 - Download and add to your plugins forlder [Basic Auth](https://github.com/WP-API/Basic-Auth)
 - Install app for testing [Postman](https://www.getpostman.com/)
 - Basic Auth Setup [Tutorial](https://code.tutsplus.com/tutorials/wp-rest-api-setting-up-and-using-basic-authentication--cms-24762)

example data for posting 

```
{
	"title": "The Post Title",
	"content": "The Post Content",
	"meta": "Meow"
}
```

If you are testing with [Custom Field Suite](http://customfieldsuite.com/) here is a sample field

```
[{"post_title":"Post Meta","post_name":"post-meta","cfs_fields":[{"id":"1","name":"post_meta_text","label":"Post Meta Text","type":"text","notes":"","parent_id":0,"weight":0,"options":{"default_value":"Some Post Meta Text","required":"0"}}],"cfs_rules":{"post_types":{"operator":"==","values":["post"]}},"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]
```