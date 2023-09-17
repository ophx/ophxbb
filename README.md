# OphxBB
#### A Cheat Panel Template  (With Mobile Styling).
[My Discord Server](https://discord.gg/3DRqNct4vM)

# Default Login:
```
Username: admin
Password: 11
```

# s.config.php Example:
```php
<?php
    return (object) array(
        "host" => "DB SERVER",
        "username" => "DB USERNAME",
        "password" => "DB PASSWORD",
        "database" => "DB NAME",
        "appName" => "WEBSITE NAME",
        "appVersion" => "WEBSITE VERSION",
        "recaptcha_sitekey" => "YOUR RECAPTCHA SITE KEY FROM GOOGLE",
    );
```

# Database Devices Structure:
```
(id, uid, os, browser, location)
```

# Database MOTD Structure:
```
(message)
```

# Database Shoutbox Structure:
```
(id, username, uid, message, created_at)
```

# Database Users Structure:
```
(id, uuid, username, password, created_at, avatar, role)
```

# Screenshots
#### Coming Soon!