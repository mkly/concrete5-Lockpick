concrete5 Lockpick
===========

Description
-----------
Use this file to reset the admin password when locked out of a concrete5 installation

Installation & Use
-------------------
Copy the concrete5lockpick.php file to the root of your concrete5 installation. The same location as index.php. Browse to http://www.example.com/c5lockpick.php and enter in the username you wish to change and the new password for that user.

Supported Versions
------------------
Should work from concrete5 version 5.5 up until version 5.7
Version 8 currently does not work. See issue [#3](https://github.com/mkly/concrete5-Lockpick/issues/4)

WARNING
-------
Delete this file immediately after you have reset your password. This file will allow anyone who visits it to change the password for any username on the site. It is _very_ _important_ that you delete this file _immediately_ after use. You have been warned.
#### Todo
See [issue tracker](https://github.com/mkly/concrete5-Lockpick/issues)
