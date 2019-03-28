# :dove: Project Vireo

[English README](README.md)

Vireo是一个基于Lumen (Laravel) 5.8的开源博客系统。

Vireo旨在作为一个轻量级，具有高拓展性和自定义能力的动态博客系统来替代Hexo。

## 设置服务器

1. 购买一台服务器和域名（可选）。
2. 准备生产环境（如果你不是老司机，推荐使用[LAMP一键安装脚本](https://lamp.sh))：
   - Linux: CentOS 7 or Ubuntu 18.04 recommended
   - Apache httpd 2 (Nginx not recommended)
   - MariaDB 10 (MySQL also acceptable)
   - PHP 7.2.18+
3. 复制这个仓库并克隆到你的服务器上，然后执行`composer install`来安装PHP依赖库。
4. 拷贝一份`.env.example`并命名为`.env`，修改`.env`中的配置，并生成一个越长越好的部署密钥（32位足矣）。
5. 使用刚刚设置的用户、密码、表名设置MariaDB数据库。
6. 运行`php artisan migrate`来移植数据表。
7. 运行`php artisan key:generate`来生成存储密钥。
8. 运行`sudo chgrp -R www-data .`来改变工程目录的文件夹所有者。注意部分安装环境（如LAMP脚本）中Apache用户的名称是`apache`而不是`www-data`。
9. 运行`sudo chmod +x auto-deploy.sh`来给予脚本可执行权限。
10. 启动Apache服务端并使用刚才的部署密钥给你的远程仓库添加地址为`https://your_site.com/deploy`的Webhook。

## 写作与部署

1. 将代码克隆到本地（本地需要有PHP和数据库环境）。在`/recources`文件夹中存放了博客和文档文件夹。
2. 运行`php -S localhost:8000 -t public`来启动本地服务器。
3. 要写博客，运行`php artisan vireo:post`并输入详细信息。博客文件会生成在`/resources/posts/date-slug/content.md`。
4. 要写文档，运行`php artisan vireo:document`并输入详细信息。文档文件会生成在`/resources/docs/category-date-slug/content.md`。
5. 要添加图片或者附件，只要把它们放在和`contend.md`同一个文件夹下。
6. 运行`php artisan vireo:cache`来更新博客和文档的缓存。
7. 刷新页面，此时即可看到更新后的内容。

## 扩展与自定义

- 你可以添加更多的功能、页面等，详见[Laravel开发文档](https://laravel.com)。
- 在`/resources/views`文件夹下你可以修改页面的内容。页面渲染使用Laravel blade格式，详见文档。
- 在`/resources/views/layouts/html_base`文件夹下你可以修改页面使用的CSS样式表和JS脚本。

## License

Vireo can be distributed under the MIT License.

Used libraries are (through CDN):

- Bootstrap
- CookieBanner
- Fancybox
- FontAwesome5
- JQuery
- MathJax
- MDBootstrap