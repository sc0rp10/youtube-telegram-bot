#Simple Telegram bot for searching first matching Youtube video
Call it with `/y search query here` ang wait for link to Youtube video.

#Installation
Clone repository, composer install, add config/prod.php with following parameters:

```
$app['telegram.token'] = 'your-bot-key';
$app['youtube.key'] = 'your-youtube-developer-key';
```

Setup webserver (with https), register bot with calling [setWebhook](https://core.telegram.org/bots/api#setwebhook) method
