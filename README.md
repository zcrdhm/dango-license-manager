# Dango

#### 介绍
Dango License Manager
针对flexlm软件的license管理工具。
具备上传、启动、重读、停止、查看日志、查看使用等功能。
可管理flexlm版本，管理daemon版本

#### 软件架构
软件采用PHP+Bash开发，无数据库
- 使用Apache作为Web服务。
- apache版本：
httpd -v
Server version: Apache/2.4.6 (CentOS)
Server built:   Nov 16 2020 16:18:20
- php版本：
php -v
PHP 5.4.16 (cli) (built: Apr  1 2020 04:07:17) 
Copyright (c) 1997-2013 The PHP Group
Zend Engine v2.4.0, Copyright (c) 1998-2013 Zend Technologies
- OS版本:
cat /etc/redhat-release 
CentOS Linux release 7.7.1908 (Core)
- Bash版本：
bash --version
GNU bash, version 4.2.46(2)-release (x86_64-redhat-linux-gnu)
Copyright (C) 2011 Free Software Foundation, Inc.
License GPLv3+: GNU GPL version 3 or later <http://gnu.org/licenses/gpl.html>


#### 安装教程

1.  安装基础组件。
 - yum install redhat-lsb glibc glibc.i686
 确认Flexlm lmgrd工具可正常使用。
 确认各厂商daemon工具可正常使用。
2.  安装基础环境。
 - yum install httpd* php* --skip-broken
 安装apache与php
 安装后可直接启动apache 
 systemctl start apache
3.  配置权限。
- 3.1. 配置apache用户root权限。添加sudo
     vim /etc/sudoer
     添加一行 apache  ALL=(ALL)       NOPASSWD: ALL
- 3.2 . 配置 scl 目录777权限 chmod -R 777 scl/
- 3.3. 配置 daemon 目录 777权限 chmod -R 777 daemon
- 3.4. 配置所有文件好目录所属人为“apache”  chown -R Apache:apache *


#### 使用说明

1.  Manage 管理厂商
2.  FlexLM 管理flex版本
3.  Daemon 管理daemon版本

#### 参与贡献

尚无


作者博客：https://my.oschina.net/u/30594621

#### 截图
![首页截图](https://images.gitee.com/uploads/images/2021/0910/114107_e405e02f_369762.png "index.png")