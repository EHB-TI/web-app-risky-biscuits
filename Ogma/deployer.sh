set -e

echo "Deploying application ..."

(php artisan down --message "the app is being updated. Please try again in a minute")
    git pull origin master
php artisan up

echo "Application deployed!"
