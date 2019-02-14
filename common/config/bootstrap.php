<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@admin', dirname(dirname(__DIR__)) . '/admin');
Yii::setAlias('@organizer', dirname(dirname(__DIR__)) . '/organizer');
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/api');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@apiUrl',"api.event-hub.test/v1/");
Yii::setAlias('@organizerImage', 'http://organizer.event-hub.test/images');
Yii::setAlias('@organizerUpload', 'http://organizer.event-hub.test/upload');
Yii::setAlias('@eventPoster', 'http://organizer.event-hub.test/images/events');
Yii::setAlias('@frontendImage', 'http://event-hub.test/images');
Yii::setAlias('@adminImage', 'http://admin.event-hub.test/images');
