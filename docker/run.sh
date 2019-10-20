cp /usr/local/etc/php/conf.d/php.ini /etc/php/7.1/fpm/conf.d/php-add.ini
cp /usr/local/etc/php/conf.d/php.ini /etc/php/7.1/cli/conf.d/php-add.ini
service supervisor restart
supervisorctl restart all
crontab /etc/cron.d/cronfile -u root
service cron start
service nginx start
php-fpm -D
/usr/sbin/sshd -D