define({ "api": [
  {
    "type": "POST",
    "url": "https://url",
    "title": "分類1-1標題名稱",
    "name": "分類1-1項目名稱(不可重複)",
    "group": "One",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "AAA",
            "description": "<p>參數解說</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "BBB",
            "description": "<p>參數解說</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "CCC",
            "description": "<p>回傳參數之解說 <br /> 換行 <br /></p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "DDD",
            "description": "<p>回傳參數之解說</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request Example",
          "content": "// PHP 語法",
          "type": "json"
        },
        {
          "title": "Request json",
          "content": "// Post json",
          "type": "json"
        },
        {
          "title": "成功回傳",
          "content": "HTTP/1.1 200 OK\n{\n\n}",
          "type": "json"
        },
        {
          "title": "失敗回傳",
          "content": "HTTP/1.1 200 OK\n{\n\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apidoc/_apidoc.js",
    "groupTitle": "One"
  },
  {
    "type": "GET",
    "url": "https://url",
    "title": "分類2-1標題名稱",
    "name": "分類2-1項目名稱(不可重複)",
    "group": "Two",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "AAA",
            "description": "<p>參數解說</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "BBB",
            "description": "<p>參數解說</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "AAA",
            "description": "<p>回傳參數之解說 <br /> 換行 <br /></p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "BBB",
            "description": "<p>回傳參數之解說</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request Example",
          "content": "// PHP 語法",
          "type": "json"
        },
        {
          "title": "Request json",
          "content": "// Post json",
          "type": "json"
        },
        {
          "title": "成功回傳",
          "content": "HTTP/1.1 200 OK\n{\n\n}",
          "type": "json"
        },
        {
          "title": "失敗回傳",
          "content": "HTTP/1.1 200 OK\n{\n\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apidoc/_apidoc.js",
    "groupTitle": "Two"
  }
] });
