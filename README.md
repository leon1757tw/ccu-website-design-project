# Booking-Ticket Website

* [Reminds](#reminds)
* [Schedule](#schedule)
  + [Date](#date)
  + [Meeting](#meeting)
* [Info](#info)
* [Front-End](#front-end)
* [Back-End](#back-end)
  + [Function](#function)
  + [SQL](#sql)
* [Git Command](#git-command)
* [Enviromental](#enviromental)

<small><i><a href='http://ecotrust-canada.github.io/markdown-toc/'></a></i></small>

## Reminds
* **大家有什麼想要大家注意的都可以加在這**

* 寫清楚git commit做了啥 別當心情留言板用
* 變數命名 摁...
* 不要改裡面的東西 (要改可以去改別組的XD)
    ```
    /www/team08
    ```
* ...
* ...

* **有問題都直接講**
* **大家加油!**


## Schedule
### Date
| Issue | Date |
| ----- | ---- |
| Project Proposal | 12/11 |
| Project Present  | 01/08 |
| Project Report   | 01/15 |

### Meeting
#### 12/07
* 專案介紹 
```
售票網頁 以展覽,演唱會為主(可參考 accupass, kktix)
```

* 分工
```
前端 
  - 廖張安
  - 謝宜紘
  - 王郁雅 
後端 
  - 陳志嘉
  - 林鎰鋒
```

* git教學

* 資料表設計

* 固定開會時間
```
時間：每周一 21:30
地點：劍橋 裕農路20號 
```

* 回家作業(Due 12/11)
```
前端：基礎介面(paint)
後端：資料庫資料表, project proposal(Due 12/11)
```


## Info
* ##### URL
    ```
    140.123.175.101:8080/team08
    ```

* ##### Mysql - phpMyAdmin
    ```
    140.123.175.101:8080/team08/phpMyAdmin
    ```

* ##### SSH
    ```
    ssh team08@140.123.175.101
    ```


## Front-End


## Back-End
### Function
* #### Account Manage
    ```
    1. Login
    2. Registered
    ```

* #### Message Board
    ```
    1. Admin 
    2. Client
    ```

* #### Admin
    ```
    1. Ticket
      1) Add (insert)
      2) Modified (update)
      3) Delete (delete)
      4) View (select)  
    ```

* #### Client 
    ```
    1. Shopping Cart
      1) Add (insert)
      2) Modified (update)
      3) Delete (delete)
      4) View (select)

    2. User Info
      1) Order
      2) Modified password
    ``` 

### SQL
* #### Data Table
    | Column 1 | Column 2 | Column 3 |
    | -------- | -------- | -------- |
    | Text     | Text     | Text     |


## Git Command
* ##### 複製遠端版本庫到本地端
    ```
    git clone https://github.com/leon1757tw/2017_website_design_project.git
    ```

* ##### 提交修改或新增檔案到本地端版本庫
    ```
    git add <filename>
    git commit -m "<add common here>"
    ```

* ##### 到本地端版本庫同步到遠端版本庫


## Enviromental
* Ubuntu 16.04
* Nginx 1.10
* PHP v5.6
* Mysql v5.7
